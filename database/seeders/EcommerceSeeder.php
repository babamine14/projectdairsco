<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EcommerceSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Categories
        $categoriesData = [
            [
                'name' => 'New Arrivals',
                'slug' => 'new-arrivals',
                'image' => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=800&auto=format&fit=crop',
                'description' => 'The latest curated seasonal silhouettes and modern elegance.',
                'display_order' => 1,
            ],
            [
                'name' => 'Tops',
                'slug' => 'tops',
                'image' => 'https://images.unsplash.com/photo-1551803091-e20673f15770?q=80&w=800&auto=format&fit=crop',
                'description' => 'Versatile minimal knitwear, tees, and elevated daily staples.',
                'display_order' => 2,
            ],
            [
                'name' => 'Blouses',
                'slug' => 'blouses',
                'image' => 'https://images.unsplash.com/photo-1598554747436-c9293d6a588f?q=80&w=800&auto=format&fit=crop',
                'description' => 'French linen and silk blouses crafted with delicate tailoring.',
                'display_order' => 3,
            ],
            [
                'name' => 'Dresses',
                'slug' => 'dresses',
                'image' => 'https://images.unsplash.com/photo-1595777457583-95e059d581b8?q=80&w=800&auto=format&fit=crop',
                'description' => 'Timeless midi and maxi dresses for daytime grace and evening charm.',
                'display_order' => 4,
            ],
            [
                'name' => 'Outerwear',
                'slug' => 'outerwear',
                'image' => 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?q=80&w=800&auto=format&fit=crop',
                'description' => 'Handcrafted wool trench coats, linen blazers, and soft capes.',
                'display_order' => 5,
            ],
            [
                'name' => 'Best Sellers',
                'slug' => 'best-sellers',
                'image' => 'https://images.unsplash.com/photo-1485230895905-ec40ba36b9bc?q=80&w=800&auto=format&fit=crop',
                'description' => 'Our most beloved pieces worn and praised by our clientele.',
                'display_order' => 6,
            ],
            [
                'name' => 'Sale',
                'slug' => 'sale',
                'image' => 'https://images.unsplash.com/photo-1445205170230-053b83016050?q=80&w=800&auto=format&fit=crop',
                'description' => 'Special seasonal archive selections at exclusive prices.',
                'display_order' => 7,
            ],
        ];

        $categories = [];
        foreach ($categoriesData as $c) {
            $categories[$c['slug']] = Category::create($c);
        }

        // 2. Products
        $productsData = [
            [
                'name' => 'Aurelia Linen Puff-Sleeve Blouse',
                'slug' => 'aurelia-linen-puff-sleeve-blouse',
                'category_id' => $categories['blouses']->id,
                'price' => 589000,
                'discount_price' => 489000,
                'badge' => 'NEW',
                'short_description' => 'Ethereal organic French flax linen blouse with gathered puff sleeves and mother-of-pearl buttons.',
                'description' => 'The Aurelia Blouse embodies effortless romanticism. Crafted from 100% Normandy flax linen that softens with every wash, it features sculpted puff sleeves, delicate pleating at the neckline, and authentic shell buttons. Pair it tucked into high-waisted trousers or worn fluidly over silk slip skirts.',
                'material' => '100% French Flax Linen (OEKO-TEX® Certified)',
                'size_and_fit' => 'Relaxed silhouette. True to size. Model is 175cm / 5\'9" wearing size S.',
                'care_instructions' => 'Gentle hand wash or dry clean. Hang dry in shade. Warm iron or steam.',
                'rating' => 4.95,
                'reviews_count' => 34,
                'stock' => 18,
                'colors' => [
                    ['name' => 'Natural Cream', 'hex' => '#F7F2EA'],
                    ['name' => 'Warm Camel', 'hex' => '#B89B7A'],
                    ['name' => 'Deep Espresso', 'hex' => '#4A3428'],
                ],
                'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
                'images' => [
                    'https://images.unsplash.com/photo-1598554747436-c9293d6a588f?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1539109136881-3be0616acf4b?q=80&w=900&auto=format&fit=crop',
                ],
                'is_featured' => true,
                'is_best_seller' => true,
                'is_new_arrival' => true,
            ],
            [
                'name' => 'Seraphina Silk Bias-Cut Midi Dress',
                'slug' => 'seraphina-silk-bias-cut-midi-dress',
                'category_id' => $categories['dresses']->id,
                'price' => 1150000,
                'discount_price' => 980000,
                'badge' => 'BEST SELLER',
                'short_description' => 'Heavyweight 22-momme mulberry silk dress cut on the bias for a liquid silhouette.',
                'description' => 'Flattering on every form, the Seraphina Slip Dress flows effortlessly over curves. Cut on the bias from luxurious sand-washed mulberry silk, featuring adjustable spaghetti straps and a subtle cowl neckline. Equally breathtaking with minimal sandals or layered under our wool trench.',
                'material' => '100% Grade 6A Mulberry Silk (22 Momme)',
                'size_and_fit' => 'Bias cut drapes naturally. Regular fit. Model is 174cm wearing size S.',
                'care_instructions' => 'Dry clean recommended or gentle silk hand wash with pH-neutral detergent.',
                'rating' => 4.98,
                'reviews_count' => 62,
                'stock' => 9,
                'colors' => [
                    ['name' => 'Champagne Cream', 'hex' => '#E9DED0'],
                    ['name' => 'Almond Tan', 'hex' => '#D6C0A3'],
                    ['name' => 'Dark Walnut', 'hex' => '#4A3428'],
                ],
                'sizes' => ['XS', 'S', 'M', 'L'],
                'images' => [
                    'https://images.unsplash.com/photo-1595777457583-95e059d581b8?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1566174053879-31528523f8ae?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1496747611176-843222e1e57c?q=80&w=900&auto=format&fit=crop',
                ],
                'is_featured' => true,
                'is_best_seller' => true,
                'is_new_arrival' => false,
            ],
            [
                'name' => 'Céleste Double-Breasted Wool Trench',
                'slug' => 'celeste-double-breasted-wool-trench',
                'category_id' => $categories['outerwear']->id,
                'price' => 1480000,
                'discount_price' => null,
                'badge' => 'NEW',
                'short_description' => 'Tailored fine wool blend trench coat with raglan sleeves and sash waist tie.',
                'description' => 'A cornerstone piece for the modern wardrobe. The Céleste Trench blends classic British tailoring with contemporary relaxed volume. Features storm flaps, tortoiseshell buttons, deep welt pockets, and a detachable tie belt that accentuates the waist with timeless restraint.',
                'material' => '70% Virgin Wool, 30% Cashmere Blend. Cupro lining.',
                'size_and_fit' => 'Relaxed tailored fit with dropped shoulders. Model is 178cm wearing size M.',
                'care_instructions' => 'Specialist dry clean only. Store on shaped wooden hanger.',
                'rating' => 4.92,
                'reviews_count' => 28,
                'stock' => 14,
                'colors' => [
                    ['name' => 'Light Camel', 'hex' => '#D6C0A3'],
                    ['name' => 'Desert Sand', 'hex' => '#B89B7A'],
                    ['name' => 'Espresso Brown', 'hex' => '#4A3428'],
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'images' => [
                    'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1485230895905-ec40ba36b9bc?q=80&w=900&auto=format&fit=crop',
                ],
                'is_featured' => true,
                'is_best_seller' => false,
                'is_new_arrival' => true,
            ],
            [
                'name' => 'Elysian Ribbed Cashmere Knit Top',
                'slug' => 'elysian-ribbed-cashmere-knit-top',
                'category_id' => $categories['tops']->id,
                'price' => 460000,
                'discount_price' => 395000,
                'badge' => 'SALE',
                'short_description' => 'Ultra-soft fine gauge rib-knit top with high crew collar and long cuffs.',
                'description' => 'Spun from Mongolian cashmere and high-twist pima cotton, the Elysian Knit provides cloud-soft warmth while remaining breathable and featherlight. Finished with subtle architectural ribbed texture along the cuffs and hem.',
                'material' => '85% Pima Cotton, 15% Inner Mongolian Cashmere',
                'size_and_fit' => 'Form-skimming fit with comfortable stretch. Model is 173cm wearing size S.',
                'care_instructions' => 'Hand wash cold inside out with wool detergent. Dry flat.',
                'rating' => 4.88,
                'reviews_count' => 41,
                'stock' => 22,
                'colors' => [
                    ['name' => 'Soft Cream', 'hex' => '#F7F2EA'],
                    ['name' => 'Beige Heather', 'hex' => '#E9DED0'],
                    ['name' => 'Toasted Almond', 'hex' => '#B89B7A'],
                ],
                'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
                'images' => [
                    'https://images.unsplash.com/photo-1551803091-e20673f15770?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1576566588028-4147f3842f27?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1509631179647-0177331693ae?q=80&w=900&auto=format&fit=crop',
                ],
                'is_featured' => false,
                'is_best_seller' => true,
                'is_new_arrival' => false,
            ],
            [
                'name' => 'Solstice Structured Linen Blazer',
                'slug' => 'solstice-structured-linen-blazer',
                'category_id' => $categories['outerwear']->id,
                'price' => 920000,
                'discount_price' => 790000,
                'badge' => 'BEST SELLER',
                'short_description' => 'Crisp tailored single-breasted blazer with structured shoulders in pure linen.',
                'description' => 'The essential layer of sartorial sophistication. Woven in Portugal from heavyweight pure flax, this jacket balances sharp lapels with breathable, relaxed lightness. Unlined back for breezy comfort in warm weather.',
                'material' => '100% Portuguese Flax Linen',
                'size_and_fit' => 'Slightly oversized tailored cut. If in between sizes, size down.',
                'care_instructions' => 'Dry clean or steam refresh.',
                'rating' => 4.96,
                'reviews_count' => 39,
                'stock' => 12,
                'colors' => [
                    ['name' => 'Warm Sand', 'hex' => '#B89B7A'],
                    ['name' => 'Bone White', 'hex' => '#FFFFFF'],
                    ['name' => 'Espresso', 'hex' => '#4A3428'],
                ],
                'sizes' => ['S', 'M', 'L'],
                'images' => [
                    'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=900&auto=format&fit=crop',
                ],
                'is_featured' => true,
                'is_best_seller' => true,
                'is_new_arrival' => false,
            ],
            [
                'name' => 'Margaux Silk Tie-Neck Blouse',
                'slug' => 'margaux-silk-tie-neck-blouse',
                'category_id' => $categories['blouses']->id,
                'price' => 640000,
                'discount_price' => null,
                'badge' => 'NEW',
                'short_description' => 'Fluid silk crepe de chine blouse with versatile lavallière bow tie collar.',
                'description' => 'Pure Parisian chic. Wear the collar tied into a soft ascot bow for boardroom confidence, or left draped open for effortless evening drinks. Finished with subtle shirring along the shoulders and delicate French seams.',
                'material' => '100% Silk Crepe de Chine',
                'size_and_fit' => 'True to size fluid drape. Model is 176cm wearing size S.',
                'care_instructions' => 'Gentle hand wash cold or dry clean. Iron on reverse low heat.',
                'rating' => 4.91,
                'reviews_count' => 19,
                'stock' => 16,
                'colors' => [
                    ['name' => 'Ivory Cream', 'hex' => '#F7F2EA'],
                    ['name' => 'Mocha Bronze', 'hex' => '#B89B7A'],
                ],
                'sizes' => ['XS', 'S', 'M', 'L'],
                'images' => [
                    'https://images.unsplash.com/photo-1551803091-e20673f15770?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1598554747436-c9293d6a588f?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=900&auto=format&fit=crop',
                ],
                'is_featured' => false,
                'is_best_seller' => false,
                'is_new_arrival' => true,
            ],
            [
                'name' => 'Camilla Tiered Linen Halter Dress',
                'slug' => 'camilla-tiered-linen-halter-dress',
                'category_id' => $categories['dresses']->id,
                'price' => 840000,
                'discount_price' => 720000,
                'badge' => 'SALE',
                'short_description' => 'Romantic sweeping halter dress with graceful tiers and open back detail.',
                'description' => 'Designed for golden hour strolls and seaside celebrations. The Camilla Dress cascades in voluminous linen tiers that capture every breeze. Features delicate neck ties and hidden in-seam pockets.',
                'material' => '100% Pure Organic Linen, cotton lined',
                'size_and_fit' => 'Flowing relaxed fit through body with fitted neckline.',
                'care_instructions' => 'Machine wash cold on gentle cycle. Line dry.',
                'rating' => 4.94,
                'reviews_count' => 48,
                'stock' => 8,
                'colors' => [
                    ['name' => 'Oatmeal Beige', 'hex' => '#E9DED0'],
                    ['name' => 'Warm Tan', 'hex' => '#D6C0A3'],
                ],
                'sizes' => ['XS', 'S', 'M', 'L'],
                'images' => [
                    'https://images.unsplash.com/photo-1496747611176-843222e1e57c?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1595777457583-95e059d581b8?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1566174053879-31528523f8ae?q=80&w=900&auto=format&fit=crop',
                ],
                'is_featured' => true,
                'is_best_seller' => true,
                'is_new_arrival' => false,
            ],
            [
                'name' => 'Vivienne High-Waist Linen Palazzos',
                'slug' => 'vivienne-high-waist-linen-palazzos',
                'category_id' => $categories['tops']->id,
                'price' => 620000,
                'discount_price' => null,
                'badge' => 'NEW',
                'short_description' => 'Wide-leg flowing tailored trousers with front pleats and side slash pockets.',
                'description' => 'Elongating wide-leg palazzo silhouette in weighty washed linen. Features thoughtful double front pleats, clean waistband with interior button closure, and generous hem allowance.',
                'material' => '100% Heavy European Linen',
                'size_and_fit' => 'High rise. Wide leg. Inseam 31 inches.',
                'care_instructions' => 'Dry clean or machine wash cold delicate.',
                'rating' => 4.90,
                'reviews_count' => 24,
                'stock' => 15,
                'colors' => [
                    ['name' => 'Ecru Cream', 'hex' => '#F7F2EA'],
                    ['name' => 'Rich Espresso', 'hex' => '#4A3428'],
                    ['name' => 'Sandstone', 'hex' => '#B89B7A'],
                ],
                'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
                'images' => [
                    'https://images.unsplash.com/photo-1509631179647-0177331693ae?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1539109136881-3be0616acf4b?q=80&w=900&auto=format&fit=crop',
                ],
                'is_featured' => false,
                'is_best_seller' => false,
                'is_new_arrival' => true,
            ],
            [
                'name' => 'Helena Silk Organza Wrap Blouse',
                'slug' => 'helena-silk-organza-wrap-blouse',
                'category_id' => $categories['blouses']->id,
                'price' => 710000,
                'discount_price' => 590000,
                'badge' => 'SALE',
                'short_description' => 'Semi-sheer silk organza wrap top with flared peplum and kimono sleeves.',
                'description' => 'Sculptural elegance meets delicate translucency. The Helena wrap top defines the waist with an elongated silk sash and billows subtly at the sleeves for ethereal evening allure.',
                'material' => '100% Pure Mulberry Silk Organza',
                'size_and_fit' => 'Adjustable wrap fit tailored to waist.',
                'care_instructions' => 'Dry clean only.',
                'rating' => 4.87,
                'reviews_count' => 16,
                'stock' => 7,
                'colors' => [
                    ['name' => 'Alabaster', 'hex' => '#FFFFFF'],
                    ['name' => 'Golden Camel', 'hex' => '#B89B7A'],
                ],
                'sizes' => ['S', 'M', 'L'],
                'images' => [
                    'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1598554747436-c9293d6a588f?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1551803091-e20673f15770?q=80&w=900&auto=format&fit=crop',
                ],
                'is_featured' => false,
                'is_best_seller' => false,
                'is_new_arrival' => false,
            ],
            [
                'name' => 'Isla Knitted Cardigan in Alpaca Blend',
                'slug' => 'isla-knitted-cardigan-alpaca',
                'category_id' => $categories['outerwear']->id,
                'price' => 780000,
                'discount_price' => null,
                'badge' => 'NEW',
                'short_description' => 'Chunky yet light baby alpaca knit cardigan with tortoiseshell buttons.',
                'description' => 'Cocoon yourself in pure luxury. Spun from sustainably sheared Peruvian baby alpaca, the Isla Cardigan features a deep V-neckline, drop shoulders, and wide ribbed trims.',
                'material' => '60% Baby Alpaca, 30% Polyamide, 10% Merino Wool',
                'size_and_fit' => 'Oversized boxy cut. Size down for closer fit.',
                'care_instructions' => 'Hand wash cold. Dry flat on clean towel.',
                'rating' => 4.93,
                'reviews_count' => 29,
                'stock' => 11,
                'colors' => [
                    ['name' => 'Warm Cream', 'hex' => '#F7F2EA'],
                    ['name' => 'Heather Sand', 'hex' => '#D6C0A3'],
                    ['name' => 'Chestnut', 'hex' => '#4A3428'],
                ],
                'sizes' => ['XS', 'S', 'M', 'L'],
                'images' => [
                    'https://images.unsplash.com/photo-1485230895905-ec40ba36b9bc?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1576566588028-4147f3842f27?q=80&w=900&auto=format&fit=crop',
                ],
                'is_featured' => false,
                'is_best_seller' => true,
                'is_new_arrival' => true,
            ],
            [
                'name' => 'Odette Pleated Georgette Maxi Skirt',
                'slug' => 'odette-pleated-georgette-maxi-skirt',
                'category_id' => $categories['dresses']->id,
                'price' => 690000,
                'discount_price' => 550000,
                'badge' => 'SALE',
                'short_description' => 'Sunburst accordion pleated skirt with comfortable encased elastic waistband.',
                'description' => 'Effortlessly kinetic movement with every stride. The Odette Maxi pairs micro accordion pleats with a soft silk-touch georgette fabric, falling gracefully to the ankles.',
                'material' => '100% Recycled Poly-Georgette (Silk Touch)',
                'size_and_fit' => 'High waist elastic fit. Floor length.',
                'care_instructions' => 'Machine wash cold delicate in laundry bag.',
                'rating' => 4.89,
                'reviews_count' => 22,
                'stock' => 19,
                'colors' => [
                    ['name' => 'Caramel Beige', 'hex' => '#B89B7A'],
                    ['name' => 'Chalk Cream', 'hex' => '#F7F2EA'],
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'images' => [
                    'https://images.unsplash.com/photo-1566174053879-31528523f8ae?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1496747611176-843222e1e57c?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1595777457583-95e059d581b8?q=80&w=900&auto=format&fit=crop',
                ],
                'is_featured' => false,
                'is_best_seller' => false,
                'is_new_arrival' => false,
            ],
            [
                'name' => 'Daphne Boatneck Structured Top',
                'slug' => 'daphne-boatneck-structured-top',
                'category_id' => $categories['tops']->id,
                'price' => 395000,
                'discount_price' => null,
                'badge' => 'BEST SELLER',
                'short_description' => 'Architectural bateau neckline top crafted in heavyweight double-faced cotton.',
                'description' => 'Inspired by classic 1960s Riviera tailoring. Clean boat neckline, bracelet-length three-quarter sleeves, and side vents that ensure the top hangs cleanly over skirts and denim.',
                'material' => '95% Organic Cotton, 5% Elastane (Double Knit)',
                'size_and_fit' => 'Structured boxy fit.',
                'care_instructions' => 'Machine wash cold. Warm iron.',
                'rating' => 4.97,
                'reviews_count' => 53,
                'stock' => 27,
                'colors' => [
                    ['name' => 'Cream White', 'hex' => '#FFFFFF'],
                    ['name' => 'Deep Espresso', 'hex' => '#4A3428'],
                    ['name' => 'Camel Tan', 'hex' => '#D6C0A3'],
                ],
                'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
                'images' => [
                    'https://images.unsplash.com/photo-1509631179647-0177331693ae?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1551803091-e20673f15770?q=80&w=900&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1576566588028-4147f3842f27?q=80&w=900&auto=format&fit=crop',
                ],
                'is_featured' => true,
                'is_best_seller' => true,
                'is_new_arrival' => false,
            ],
        ];

        $createdProducts = [];
        foreach ($productsData as $prod) {
            $createdProducts[] = Product::create($prod);
        }

        // 3. Coupons
        Coupon::create([
            'code' => 'WELCOME10',
            'description' => 'Welcome privilege: 10% off on your entire purchase',
            'discount_percent' => 10,
            'min_order_amount' => 0,
            'is_active' => true,
        ]);

        Coupon::create([
            'code' => 'ELEGANCE20',
            'description' => 'Special Privilege: 20% off for purchases above Rp 500.000',
            'discount_percent' => 20,
            'min_order_amount' => 500000,
            'is_active' => true,
        ]);

        Coupon::create([
            'code' => 'DAIRSCO15',
            'description' => 'Seasonal boutique privilege: 15% off',
            'discount_percent' => 15,
            'min_order_amount' => 300000,
            'is_active' => true,
        ]);

        // 4. Customer Reviews
        $reviewsData = [
            [
                'author_name' => 'Clarissa Stephanie',
                'author_photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=200&auto=format&fit=crop',
                'rating' => 5,
                'comment' => 'Kualitas jahitan dan bahannya benar-benar selevel butik Paris. Aurelia Blouse-nya jatuh dengan sangat cantik di badan dan terasa sangat sejuk meski seharian dipakai di Jakarta.',
                'purchased_product_name' => 'Aurelia Linen Puff-Sleeve Blouse',
            ],
            [
                'author_name' => 'Nadya Wiranata',
                'author_photo' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?q=80&w=200&auto=format&fit=crop',
                'rating' => 5,
                'comment' => 'Seraphina Silk Dress-nya juara banget! Bahannya tebal 22-momme dan tidak menerawang sama sekali. Pengirimannya cepat, packaging kotak DAÏRSCO sangat wangi dan mewah.',
                'purchased_product_name' => 'Seraphina Silk Bias-Cut Midi Dress',
            ],
            [
                'author_name' => 'Valerie Kusuma',
                'author_photo' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=200&auto=format&fit=crop',
                'rating' => 5,
                'comment' => 'Palet warna warm beige dan camel-nya benar-benar timeless. Tidak heran langsung sold out di batch pertama. Solstice Blazer jadi andalan saya untuk meeting kantor dan brunch santai.',
                'purchased_product_name' => 'Solstice Structured Linen Blazer',
            ],
            [
                'author_name' => 'Amanda Pratama',
                'author_photo' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=200&auto=format&fit=crop',
                'rating' => 5,
                'comment' => 'Sistem checkout-nya sangat cepat dan mudah lewat QRIS, CS via WhatsApp juga sangat ramah saat konsultasi size chart. Definitely my new favorite brand!',
                'purchased_product_name' => 'Céleste Double-Breasted Wool Trench',
            ],
        ];

        foreach ($reviewsData as $rev) {
            Review::create($rev);
        }

        // 5. Initial Sample Orders (for immediate Order Tracking, Account & Admin Dashboard)
        $order1 = Order::create([
            'order_number' => 'DS-89241',
            'customer_name' => 'Clarissa Stephanie',
            'customer_email' => 'clarissa.s@example.com',
            'customer_phone' => '081289123456',
            'shipping_address' => 'Jl. Senopati No. 42, Kebayoran Baru',
            'province' => 'DKI Jakarta',
            'city' => 'Jakarta Selatan',
            'district' => 'Kebayoran Baru',
            'postal_code' => '12190',
            'shipping_method' => 'express',
            'shipping_cost' => 30000,
            'payment_method' => 'qris',
            'payment_status' => 'paid',
            'order_status' => 'delivered',
            'coupon_code' => 'WELCOME10',
            'discount_amount' => 48900,
            'subtotal' => 489000,
            'total' => 470100,
            'notes' => 'Please leave with reception if not home.',
        ]);

        OrderItem::create([
            'order_id' => $order1->id,
            'product_id' => $createdProducts[0]->id,
            'product_name' => $createdProducts[0]->name,
            'selected_size' => 'S',
            'selected_color' => 'Natural Cream',
            'quantity' => 1,
            'price' => 489000,
            'total' => 489000,
        ]);

        $order2 = Order::create([
            'order_number' => 'DS-93108',
            'customer_name' => 'Nadya Wiranata',
            'customer_email' => 'nadya.w@example.com',
            'customer_phone' => '081398765432',
            'shipping_address' => 'Graha Famili Blok B-12',
            'province' => 'Jawa Timur',
            'city' => 'Surabaya',
            'district' => 'Prigen',
            'postal_code' => '60226',
            'shipping_method' => 'standard',
            'shipping_cost' => 20000,
            'payment_method' => 'bca_va',
            'payment_status' => 'paid',
            'order_status' => 'shipped',
            'coupon_code' => 'ELEGANCE20',
            'discount_amount' => 196000,
            'subtotal' => 980000,
            'total' => 804000,
            'notes' => null,
        ]);

        OrderItem::create([
            'order_id' => $order2->id,
            'product_id' => $createdProducts[1]->id,
            'product_name' => $createdProducts[1]->name,
            'selected_size' => 'M',
            'selected_color' => 'Champagne Cream',
            'quantity' => 1,
            'price' => 980000,
            'total' => 980000,
        ]);
    }
}
