<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function stats(): JsonResponse
    {
        $totalRevenue = Order::where('payment_status', 'paid')->sum('total');
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $lowStockProducts = Product::where('stock', '<=', 10)->count();

        $recentOrders = Order::with('items')->latest()->take(6)->get();

        return response()->json([
            'success' => true,
            'stats' => [
                'total_revenue' => $totalRevenue,
                'total_orders' => $totalOrders,
                'total_products' => $totalProducts,
                'low_stock_count' => $lowStockProducts,
            ],
            'recent_orders' => $recentOrders,
        ]);
    }

    public function getOrders(): JsonResponse
    {
        $orders = Order::with('items')->latest()->get();
        return response()->json([
            'success' => true,
            'orders' => $orders,
        ]);
    }

    public function updateOrderStatus(Request $request, $id): JsonResponse
    {
        $order = Order::findOrFail($id);
        $status = $request->input('order_status');
        $paymentStatus = $request->input('payment_status');

        if ($status) {
            $order->order_status = $status;
        }
        if ($paymentStatus) {
            $order->payment_status = $paymentStatus;
        }

        $order->save();

        return response()->json([
            'success' => true,
            'message' => 'Status pesanan berhasil diperbarui.',
            'order' => $order,
        ]);
    }

    public function storeProduct(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'badge' => 'nullable|string',
            'short_description' => 'required|string',
            'description' => 'nullable|string',
            'material' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'images' => 'required|array|min:1',
            'colors' => 'nullable|array',
            'sizes' => 'nullable|array',
        ]);

        $slug = Str::slug($validated['name']) . '-' . rand(100, 999);

        $product = Product::create(array_merge($validated, [
            'slug' => $slug,
            'rating' => 5.0,
            'reviews_count' => 0,
            'is_new_arrival' => true,
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Produk baru berhasil ditambahkan ke katalog DAÏRSCO.',
            'product' => $product->load('category'),
        ]);
    }

    public function updateProduct(Request $request, $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'badge' => 'nullable|string',
            'short_description' => 'required|string',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diperbarui.',
            'product' => $product->load('category'),
        ]);
    }

    public function deleteProduct($id): JsonResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus.',
        ]);
    }
}
