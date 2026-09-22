<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(): View
    {
        $categories = Category::orderBy('display_order')->get();
        $products = Product::with('category')->latest()->get();
        $coupons = Coupon::where('is_active', true)->get();
        $reviews = Review::latest()->get();

        return view('boutique', [
            'initialCategories' => $categories,
            'initialProducts' => $products,
            'initialCoupons' => $coupons,
            'initialReviews' => $reviews,
        ]);
    }

    public function getProducts(Request $request): JsonResponse
    {
        $query = Product::with('category');

        // Search
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('material', 'like', "%{$search}%");
            });
        }

        // Category
        if ($categorySlug = $request->input('category')) {
            if ($categorySlug === 'new-arrivals') {
                $query->where('is_new_arrival', true);
            } elseif ($categorySlug === 'best-sellers') {
                $query->where('is_best_seller', true);
            } elseif ($categorySlug === 'sale') {
                $query->whereNotNull('discount_price');
            } else {
                $query->whereHas('category', function ($q) use ($categorySlug) {
                    $q->where('slug', $categorySlug);
                });
            }
        }

        // Price range
        if ($minPrice = $request->input('min_price')) {
            $query->where(function ($q) use ($minPrice) {
                $q->where('discount_price', '>=', $minPrice)
                  ->orWhere(function ($sub) use ($minPrice) {
                      $sub->whereNull('discount_price')->where('price', '>=', $minPrice);
                  });
            });
        }

        if ($maxPrice = $request->input('max_price')) {
            $query->where(function ($q) use ($maxPrice) {
                $q->where('discount_price', '<=', $maxPrice)
                  ->orWhere(function ($sub) use ($maxPrice) {
                      $sub->whereNull('discount_price')->where('price', '<=', $maxPrice);
                  });
            });
        }

        // Sorting
        $sort = $request->input('sort', 'newest');
        switch ($sort) {
            case 'price_asc':
                $query->orderByRaw('COALESCE(discount_price, price) ASC');
                break;
            case 'price_desc':
                $query->orderByRaw('COALESCE(discount_price, price) DESC');
                break;
            case 'best_selling':
                $query->orderByDesc('is_best_seller')->orderByDesc('rating');
                break;
            case 'newest':
            default:
                $query->orderByDesc('is_new_arrival')->latest();
                break;
        }

        $products = $query->get();

        // Optional post-filter in collection for json encoded fields like size and color
        if ($size = $request->input('size')) {
            $products = $products->filter(function ($item) use ($size) {
                return is_array($item->sizes) && in_array($size, $item->sizes);
            })->values();
        }

        return response()->json([
            'success' => true,
            'count' => $products->count(),
            'products' => $products,
        ]);
    }

    public function applyCoupon(Request $request): JsonResponse
    {
        $request->validate([
            'code' => 'required|string',
            'subtotal' => 'required|numeric',
        ]);

        $code = strtoupper(trim($request->input('code')));
        $subtotal = floatval($request->input('subtotal'));

        $coupon = Coupon::where('code', $code)->where('is_active', true)->first();

        if (!$coupon) {
            return response()->json([
                'success' => false,
                'message' => 'Kode voucher tidak valid atau telah kedaluwarsa.',
            ], 422);
        }

        if ($subtotal < $coupon->min_order_amount) {
            return response()->json([
                'success' => false,
                'message' => 'Minimum pembelanjaan untuk voucher ini adalah Rp ' . number_format($coupon->min_order_amount, 0, ',', '.'),
            ], 422);
        }

        $discountAmount = ($subtotal * $coupon->discount_percent) / 100;

        return response()->json([
            'success' => true,
            'coupon' => $coupon,
            'discount_amount' => $discountAmount,
            'message' => "Voucher {$coupon->code} berhasil diterapkan ({$coupon->discount_percent}% Diskon)!",
        ]);
    }

    public function checkout(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:50',
            'shipping_address' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'district' => 'nullable|string',
            'postal_code' => 'required|string|max:20',
            'shipping_method' => 'required|string',
            'shipping_cost' => 'required|numeric',
            'payment_method' => 'required|string',
            'coupon_code' => 'nullable|string',
            'discount_amount' => 'nullable|numeric',
            'subtotal' => 'required|numeric',
            'total' => 'required|numeric',
            'items' => 'required|array|min:1',
            'notes' => 'nullable|string',
        ]);

        $orderNumber = 'DS-' . strtoupper(Str::random(2)) . rand(1000, 9999);

        $order = Order::create([
            'order_number' => $orderNumber,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'shipping_address' => $validated['shipping_address'],
            'province' => $validated['province'],
            'city' => $validated['city'],
            'district' => $validated['district'] ?? null,
            'postal_code' => $validated['postal_code'],
            'shipping_method' => $validated['shipping_method'],
            'shipping_cost' => $validated['shipping_cost'],
            'payment_method' => $validated['payment_method'],
            'payment_status' => in_array($validated['payment_method'], ['qris', 'credit_card', 'bca_va']) ? 'paid' : 'pending',
            'order_status' => 'processing',
            'coupon_code' => $validated['coupon_code'] ?? null,
            'discount_amount' => $validated['discount_amount'] ?? 0,
            'subtotal' => $validated['subtotal'],
            'total' => $validated['total'],
            'notes' => $validated['notes'] ?? null,
        ]);

        foreach ($validated['items'] as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'product_name' => $item['name'],
                'selected_size' => $item['selected_size'] ?? null,
                'selected_color' => $item['selected_color'] ?? null,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total' => $item['price'] * $item['quantity'],
            ]);

            // Decrement stock
            Product::where('id', $item['id'])->decrement('stock', $item['quantity']);
        }

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dibuat! Terima kasih telah berbelanja di DAÏRSCO.',
            'order' => $order->load('items'),
        ]);
    }

    public function trackOrder(string $orderNumber): JsonResponse
    {
        $order = Order::with('items')->where('order_number', strtoupper($orderNumber))->first();

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor pesanan tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'order' => $order,
        ]);
    }
}
