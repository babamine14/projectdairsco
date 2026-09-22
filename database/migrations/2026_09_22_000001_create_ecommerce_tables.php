<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->decimal('price', 12, 2);
            $table->decimal('discount_price', 12, 2)->nullable();
            $table->string('badge')->nullable(); // NEW, BEST SELLER, SALE
            $table->text('short_description');
            $table->longText('description')->nullable();
            $table->string('material')->nullable();
            $table->string('size_and_fit')->nullable();
            $table->text('care_instructions')->nullable();
            $table->decimal('rating', 3, 2)->default(4.9);
            $table->integer('reviews_count')->default(18);
            $table->integer('stock')->default(25);
            $table->json('colors')->nullable(); // [{"name":"Cream","hex":"#F7F2EA"}, ...]
            $table->json('sizes')->nullable(); // ["XS","S","M","L","XL"]
            $table->json('images')->nullable(); // Array of image URLs
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_best_seller')->default(false);
            $table->boolean('is_new_arrival')->default(true);
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->text('shipping_address');
            $table->string('province');
            $table->string('city');
            $table->string('district')->nullable();
            $table->string('postal_code');
            $table->string('shipping_method')->default('standard');
            $table->decimal('shipping_cost', 12, 2)->default(0);
            $table->string('payment_method')->default('qris');
            $table->string('payment_status')->default('pending'); // pending, paid, cancelled
            $table->string('order_status')->default('processing'); // processing, shipped, delivered, cancelled
            $table->string('coupon_code')->nullable();
            $table->decimal('discount_amount', 12, 2)->default(0);
            $table->decimal('subtotal', 12, 2);
            $table->decimal('total', 12, 2);
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('product_name');
            $table->string('selected_size')->nullable();
            $table->string('selected_color')->nullable();
            $table->integer('quantity')->default(1);
            $table->decimal('price', 12, 2);
            $table->decimal('total', 12, 2);
            $table->timestamps();
        });

        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('description');
            $table->integer('discount_percent');
            $table->decimal('min_order_amount', 12, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
            $table->string('author_name');
            $table->string('author_photo')->nullable();
            $table->integer('rating')->default(5);
            $table->text('comment');
            $table->string('purchased_product_name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('coupons');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
};
