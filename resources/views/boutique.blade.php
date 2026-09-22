<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAÏRSCO — Modern Women's Fashion Boutique | Minimalist Luxury</title>
    <meta name="description" content="Discover timeless women's fashion designed to make every moment feel effortlessly beautiful. French linen blouses, silk dresses, tailored outerwear.">
    
    <!-- Open Graph SEO -->
    <meta property="og:title" content="DAÏRSCO — Modern Women's Fashion Boutique">
    <meta property="og:description" content="Elevate Your Everyday Style. Timeless minimalist luxury women's fashion.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=1200&auto=format&fit=crop">

    <!-- Google Fonts: Cormorant Garamond / Playfair Display + Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Tailwind CSS CDN with custom config matching the exact prompt palette -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#B89B7A',        // Light brown / Camel
                        'light-brown': '#D6C0A3',  // Soft sand
                        cream: '#F7F2EA',          // Background canvas
                        'dark-brown': '#4A3428',   // Deep espresso typography & primary elements
                        'soft-beige': '#E9DED0',   // Subtle border & cards
                        'off-white': '#FFFFFF',
                    },
                    fontFamily: {
                        serif: ['"Playfair Display"', '"Cormorant Garamond"', 'Georgia', 'serif'],
                        editorial: ['"Cormorant Garamond"', 'Georgia', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'system-ui', '-apple-system', 'sans-serif'],
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(74, 52, 40, 0.05)',
                        'soft-lg': '0 10px 30px -4px rgba(74, 52, 40, 0.08)',
                        'soft-xl': '0 20px 40px -6px rgba(74, 52, 40, 0.12)',
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js for lightweight, bulletproof reactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        
        /* Custom smooth scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #F7F2EA;
        }
        ::-webkit-scrollbar-thumb {
            background: #D6C0A3;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #B89B7A;
        }

        /* Subtle luxury transitions */
        .img-zoom-container {
            overflow: hidden;
        }
        .img-zoom-container img {
            transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .img-zoom-container:hover img {
            transform: scale(1.06);
        }
    </style>
</head>

<body 
    x-data="boutiqueApp()" 
    x-init="initApp()" 
    class="bg-cream text-dark-brown font-sans antialiased selection:bg-light-brown selection:text-dark-brown min-h-screen flex flex-col pb-16 md:pb-0"
>
    <!-- TOP ANNOUNCEMENT BAR -->
    <div class="bg-dark-brown text-cream text-[11px] md:text-xs tracking-wider uppercase py-2 px-4 text-center font-medium flex items-center justify-center gap-3">
        <span class="inline-flex items-center gap-1.5">
            <i data-lucide="sparkles" class="w-3.5 h-3.5 text-primary"></i>
            <span>COMPLIMENTARY EXPRESS SHIPPING FOR ORDERS OVER RP 750.000</span>
        </span>
        <span class="hidden md:inline text-primary">•</span>
        <span class="hidden md:inline">USE CODE <strong>WELCOME10</strong> FOR 10% OFF YOUR FIRST ORDER</span>
    </div>

    <!-- STICKY HEADER -->
    <header class="sticky top-0 z-40 bg-cream/95 backdrop-blur-md border-b border-soft-beige/70 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-18 md:h-20">
                
                <!-- Left: Mobile Menu Trigger & Desktop Nav -->
                <div class="flex items-center gap-6">
                    <button 
                        @click="mobileMenuOpen = true" 
                        class="md:hidden p-2 text-dark-brown hover:text-primary transition-colors focus:outline-none"
                        aria-label="Open navigation menu"
                    >
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>

                    <!-- Desktop Navigation Links -->
                    <nav class="hidden md:flex items-center space-x-7 text-xs font-medium tracking-widest uppercase">
                        <a href="#home" @click.prevent="navigate('home')" :class="currentView === 'home' ? 'text-primary border-b-2 border-primary pb-1' : 'hover:text-primary text-dark-brown/90 transition-colors pb-1'">Home</a>
                        <a href="#new-arrivals" @click.prevent="filterCategory('new-arrivals')" class="hover:text-primary text-dark-brown/90 transition-colors pb-1">New Arrivals</a>
                        <a href="#catalog" @click.prevent="filterCategory('all')" :class="currentView === 'catalog' ? 'text-primary border-b-2 border-primary pb-1' : 'hover:text-primary text-dark-brown/90 transition-colors pb-1'">All Products</a>
                        <a href="#tops" @click.prevent="filterCategory('tops')" class="hover:text-primary text-dark-brown/90 transition-colors pb-1">Tops</a>
                        <a href="#blouses" @click.prevent="filterCategory('blouses')" class="hover:text-primary text-dark-brown/90 transition-colors pb-1">Blouse</a>
                        <a href="#dresses" @click.prevent="filterCategory('dresses')" class="hover:text-primary text-dark-brown/90 transition-colors pb-1">Dress</a>
                        <a href="#outerwear" @click.prevent="filterCategory('outerwear')" class="hover:text-primary text-dark-brown/90 transition-colors pb-1">Outer</a>
                        <a href="#sale" @click.prevent="filterCategory('sale')" class="text-amber-800 hover:text-primary font-semibold transition-colors pb-1">Sale</a>
                    </nav>
                </div>

                <!-- Center: Brand Logo -->
                <div class="flex-shrink-0 text-center cursor-pointer" @click="navigate('home')">
                    <span class="block font-serif text-2xl md:text-3xl tracking-[0.25em] font-semibold text-dark-brown">DAÏRSCO</span>
                    <span class="block text-[8px] md:text-[9px] tracking-[0.35em] text-primary uppercase font-medium -mt-1">Paris • Jakarta</span>
                </div>

                <!-- Right: Action Icons (Search, Wishlist, Cart, Account, Admin toggle) -->
                <div class="flex items-center space-x-3 sm:space-x-5">
                    
                    <!-- Search Icon Trigger -->
                    <button 
                        @click="openSearchModal()" 
                        class="p-2 text-dark-brown hover:text-primary transition-colors relative"
                        title="Cari Produk (Search)"
                    >
                        <i data-lucide="search" class="w-5 h-5"></i>
                    </button>

                    <!-- Wishlist Icon Trigger -->
                    <button 
                        @click="openAccountTab('wishlist')" 
                        class="p-2 text-dark-brown hover:text-primary transition-colors relative"
                        title="Wishlist"
                    >
                        <i data-lucide="heart" class="w-5 h-5"></i>
                        <span 
                            x-show="wishlist.length > 0" 
                            x-text="wishlist.length" 
                            class="absolute top-1 right-1 w-4 h-4 bg-primary text-white text-[9px] font-bold rounded-full flex items-center justify-center"
                        ></span>
                    </button>

                    <!-- Cart Bag Trigger -->
                    <button 
                        @click="cartDrawerOpen = true" 
                        class="p-2 text-dark-brown hover:text-primary transition-colors relative"
                        title="Keranjang Belanja"
                    >
                        <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                        <span 
                            x-show="cartTotalItems > 0" 
                            x-text="cartTotalItems" 
                            class="absolute top-1 right-1 w-4 h-4 bg-dark-brown text-cream text-[9px] font-bold rounded-full flex items-center justify-center"
                        ></span>
                    </button>

                    <!-- Account Profile Trigger -->
                    <button 
                        @click="accountModalOpen = true" 
                        class="hidden sm:inline-block p-2 text-dark-brown hover:text-primary transition-colors relative"
                        title="Akun Saya"
                    >
                        <i data-lucide="user" class="w-5 h-5"></i>
                    </button>

                    <!-- Admin Portal Button -->
                    <button 
                        @click="toggleAdminView()" 
                        class="hidden lg:inline-flex items-center gap-1.5 px-3 py-1.5 text-[10px] font-medium tracking-wider uppercase border border-dark-brown/30 rounded-sm hover:bg-dark-brown hover:text-cream transition-all duration-200"
                    >
                        <i data-lucide="shield-check" class="w-3.5 h-3.5"></i>
                        <span x-text="currentView === 'admin' ? 'Toko' : 'Admin'"></span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN APP CONTENT CONTAINER -->
    <main class="flex-grow">

        <!-- ========================================== -->
        <!-- VIEW: HOMEPAGE                             -->
        <!-- ========================================== -->
        <div x-show="currentView === 'home'" x-cloak>
            
            <!-- 1. HERO SECTION -->
            <section class="relative bg-cream overflow-hidden border-b border-soft-beige">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 lg:py-24">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
                        
                        <!-- Left Editorial Copy -->
                        <div class="lg:col-span-6 space-y-6 text-center lg:text-left">
                            <div class="inline-flex items-center gap-2 px-3 py-1 bg-soft-beige/70 text-dark-brown text-xs uppercase tracking-widest font-medium rounded-full">
                                <span class="w-2 h-2 rounded-full bg-primary"></span>
                                Spring / Summer 2026 Collection
                            </div>
                            
                            <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl text-dark-brown leading-[1.15] font-normal">
                                Elevate Your <br>
                                <span class="italic font-light text-primary">Everyday Style</span>
                            </h1>
                            
                            <p class="text-sm sm:text-base text-dark-brown/80 max-w-xl mx-auto lg:mx-0 font-light leading-relaxed">
                                Discover timeless women's fashion designed to make every moment feel effortlessly beautiful. Meticulously tailored in Paris, created with French flax linen, mulberry silk, and pure virgin wool.
                            </p>
                            
                            <div class="pt-4 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                                <button 
                                    @click="filterCategory('all')" 
                                    class="w-full sm:w-auto px-8 py-3.5 bg-dark-brown text-cream hover:bg-primary text-xs uppercase tracking-widest font-semibold transition-all duration-300 shadow-soft"
                                >
                                    Shop Now
                                </button>
                                <button 
                                    @click="filterCategory('new-arrivals')" 
                                    class="w-full sm:w-auto px-8 py-3.5 bg-transparent border border-dark-brown text-dark-brown hover:bg-dark-brown hover:text-cream text-xs uppercase tracking-widest font-semibold transition-all duration-300"
                                >
                                    Explore New Arrivals
                                </button>
                            </div>

                            <!-- Trust highlight -->
                            <div class="pt-6 border-t border-soft-beige/80 flex items-center justify-center lg:justify-start gap-8 text-xs text-dark-brown/70">
                                <div>
                                    <span class="block font-serif text-xl text-dark-brown font-semibold">100%</span>
                                    <span>Sustainable Fabrics</span>
                                </div>
                                <div class="w-px h-8 bg-soft-beige"></div>
                                <div>
                                    <span class="block font-serif text-xl text-dark-brown font-semibold">4.9 / 5</span>
                                    <span>Client Satisfaction</span>
                                </div>
                                <div class="w-px h-8 bg-soft-beige"></div>
                                <div>
                                    <span class="block font-serif text-xl text-dark-brown font-semibold">30 Days</span>
                                    <span>Boutique Guarantee</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Editorial Hero Visual -->
                        <div class="lg:col-span-6 relative">
                            <div class="relative z-10 grid grid-cols-2 gap-4 max-w-lg mx-auto lg:max-w-none">
                                <div class="space-y-4">
                                    <div class="img-zoom-container rounded-sm overflow-hidden shadow-soft-lg aspect-[3/4]">
                                        <img 
                                            src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=900&auto=format&fit=crop" 
                                            alt="DAÏRSCO Editorial Elegance" 
                                            class="w-full h-full object-cover object-center"
                                        >
                                    </div>
                                    <div class="p-4 bg-white/80 backdrop-blur-sm border border-soft-beige rounded-sm">
                                        <span class="text-[10px] uppercase tracking-widest text-primary font-bold">Featured Fabric</span>
                                        <h4 class="font-serif text-sm font-semibold text-dark-brown">Pure Normandy Flax Linen</h4>
                                        <p class="text-[11px] text-dark-brown/70 mt-1">Lightweight breathability for tropical elegance.</p>
                                    </div>
                                </div>
                                <div class="space-y-4 pt-8">
                                    <div class="p-4 bg-white/80 backdrop-blur-sm border border-soft-beige rounded-sm text-right">
                                        <span class="text-[10px] uppercase tracking-widest text-primary font-bold">Parisian Silhouette</span>
                                        <h4 class="font-serif text-sm font-semibold text-dark-brown">Handcrafted Tailoring</h4>
                                    </div>
                                    <div class="img-zoom-container rounded-sm overflow-hidden shadow-soft-lg aspect-[3/4]">
                                        <img 
                                            src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=900&auto=format&fit=crop" 
                                            alt="Tailored women silhouette" 
                                            class="w-full h-full object-cover object-center"
                                        >
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Soft Decorative Glow -->
                            <div class="absolute -top-12 -right-12 w-64 h-64 bg-light-brown/30 rounded-full blur-3xl -z-10"></div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- 2. FEATURED CATEGORIES SECTION -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <span class="text-xs uppercase tracking-[0.25em] text-primary font-semibold">Curated Silhouettes</span>
                    <h2 class="font-serif text-3xl sm:text-4xl text-dark-brown mt-2">Featured Categories</h2>
                    <p class="text-xs sm:text-sm text-dark-brown/70 mt-2 font-light">Explore our timeless staples designed with immaculate attention to detail.</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 sm:gap-6">
                    <template x-for="cat in categories" :key="cat.id">
                        <div 
                            @click="filterCategory(cat.slug)" 
                            class="group cursor-pointer text-center"
                        >
                            <div class="img-zoom-container relative aspect-[4/5] rounded-sm overflow-hidden bg-soft-beige shadow-soft mb-3">
                                <img 
                                    :src="cat.image" 
                                    :alt="cat.name" 
                                    class="w-full h-full object-cover object-center"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-dark-brown/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute bottom-3 inset-x-3 text-cream text-[11px] font-medium uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    Lihat Koleksi →
                                </div>
                            </div>
                            <h3 class="font-serif text-base text-dark-brown group-hover:text-primary transition-colors font-medium" x-text="cat.name"></h3>
                            <span class="text-[11px] text-dark-brown/60 tracking-wider uppercase font-medium">Boutique</span>
                        </div>
                    </template>
                </div>
            </section>

            <!-- 3. NEW ARRIVALS GRID SECTION -->
            <section class="bg-soft-beige/30 border-y border-soft-beige py-16 lg:py-24">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
                        <div>
                            <span class="text-xs uppercase tracking-[0.25em] text-primary font-semibold">Seasonal Palette</span>
                            <h2 class="font-serif text-3xl sm:text-4xl text-dark-brown mt-2">New Arrivals</h2>
                            <p class="text-xs sm:text-sm text-dark-brown/70 mt-1 font-light">Freshly unveiled designs, freshly crafted for your signature look.</p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <button 
                                @click="filterCategory('new-arrivals')" 
                                class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-dark-brown hover:text-primary transition-colors group"
                            >
                                <span>View All New Arrivals</span>
                                <i data-lucide="arrow-right" class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"></i>
                            </button>
                        </div>
                    </div>

                    <!-- 4 Column Product Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8">
                        <template x-for="product in newArrivalProducts" :key="product.id">
                            <div class="group relative bg-white border border-soft-beige rounded-sm p-3 sm:p-4 flex flex-col justify-between hover:shadow-soft-lg transition-all duration-300">
                                
                                <!-- Top image wrapper with badges & wishlist -->
                                <div class="relative aspect-[3/4] overflow-hidden rounded-sm bg-cream/50 mb-3 img-zoom-container">
                                    <img 
                                        :src="product.images[0]" 
                                        :alt="product.name" 
                                        class="w-full h-full object-cover object-center"
                                    >
                                    
                                    <!-- Badges -->
                                    <div class="absolute top-2.5 left-2.5 flex flex-col gap-1.5 z-10">
                                        <span 
                                            x-show="product.badge" 
                                            x-text="product.badge" 
                                            :class="{
                                                'bg-dark-brown text-cream': product.badge === 'NEW',
                                                'bg-primary text-white': product.badge === 'BEST SELLER',
                                                'bg-rose-900 text-white': product.badge === 'SALE'
                                            }"
                                            class="text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-xs shadow-xs"
                                        ></span>
                                    </div>

                                    <!-- Wishlist Heart Button -->
                                    <button 
                                        @click.stop="toggleWishlist(product)" 
                                        class="absolute top-2.5 right-2.5 w-8 h-8 rounded-full bg-white/90 backdrop-blur-sm flex items-center justify-center text-dark-brown hover:text-rose-700 transition-colors shadow-xs z-10"
                                        :title="isInWishlist(product.id) ? 'Hapus dari Wishlist' : 'Tambah ke Wishlist'"
                                    >
                                        <i data-lucide="heart" class="w-4 h-4" :class="isInWishlist(product.id) ? 'fill-rose-700 text-rose-700' : ''"></i>
                                    </button>

                                    <!-- Quick View Floating Button on Hover -->
                                    <div class="absolute inset-x-2 bottom-2 hidden sm:flex opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                                        <button 
                                            @click.stop="openProductModal(product)" 
                                            class="w-full py-2.5 bg-dark-brown/95 text-cream text-[10px] uppercase tracking-widest font-semibold hover:bg-primary transition-colors backdrop-blur-sm rounded-xs flex items-center justify-center gap-1.5"
                                        >
                                            <i data-lucide="eye" class="w-3.5 h-3.5"></i>
                                            <span>Quick View</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Product Details -->
                                <div class="space-y-1.5 flex-grow">
                                    <div class="flex items-center justify-between text-[11px] text-dark-brown/60">
                                        <span x-text="product.category ? product.category.name : 'Boutique'"></span>
                                        <div class="flex items-center gap-1 text-primary">
                                            <i data-lucide="star" class="w-3 h-3 fill-primary"></i>
                                            <span class="font-medium" x-text="product.rating"></span>
                                        </div>
                                    </div>

                                    <h4 
                                        @click="openProductModal(product)" 
                                        class="font-serif text-sm sm:text-base font-medium text-dark-brown group-hover:text-primary transition-colors cursor-pointer line-clamp-1" 
                                        x-text="product.name"
                                    ></h4>

                                    <!-- Price & Discount -->
                                    <div class="flex items-baseline gap-2 pt-0.5">
                                        <span 
                                            class="font-semibold text-dark-brown text-sm sm:text-base" 
                                            x-text="formatRupiah(product.discount_price || product.price)"
                                        ></span>
                                        <span 
                                            x-show="product.discount_price" 
                                            class="text-xs text-dark-brown/40 line-through" 
                                            x-text="formatRupiah(product.price)"
                                        ></span>
                                    </div>
                                </div>

                                <!-- Mobile tap action -->
                                <div class="mt-3 sm:hidden">
                                    <button 
                                        @click="openProductModal(product)" 
                                        class="w-full py-2 bg-soft-beige/70 text-dark-brown text-[11px] uppercase tracking-wider font-semibold rounded-xs"
                                    >
                                        Detail Produk
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </section>

            <!-- 4. EDITORIAL PROMOTIONAL BANNER -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
                <div class="relative rounded-sm overflow-hidden bg-dark-brown text-cream shadow-soft-xl">
                    <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
                        <div class="p-8 sm:p-12 lg:p-16 lg:col-span-7 space-y-6">
                            <span class="text-xs uppercase tracking-[0.3em] text-light-brown font-semibold">Boutique Capsule</span>
                            <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-light leading-tight">
                                Your Style, <br>
                                <span class="italic font-normal text-light-brown">Your Story</span>
                            </h2>
                            <p class="text-sm sm:text-base text-cream/80 max-w-md font-light leading-relaxed">
                                Discover pieces designed for every occasion. From early morning espresso meetings to candlelit soirees, find the harmony of ease and opulence.
                            </p>
                            <div class="pt-2">
                                <button 
                                    @click="filterCategory('all')" 
                                    class="px-8 py-3.5 bg-primary text-white hover:bg-cream hover:text-dark-brown text-xs uppercase tracking-widest font-semibold transition-all duration-300 shadow-md"
                                >
                                    Shop Collection
                                </button>
                            </div>
                        </div>
                        <div class="lg:col-span-5 h-72 sm:h-96 lg:h-full relative overflow-hidden">
                            <img 
                                src="https://images.unsplash.com/photo-1485230895905-ec40ba36b9bc?q=80&w=1000&auto=format&fit=crop" 
                                alt="DAÏRSCO Collection" 
                                class="w-full h-full object-cover object-center"
                            >
                            <div class="absolute inset-0 bg-gradient-to-r from-dark-brown via-transparent to-transparent hidden lg:block"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 5. BEST SELLERS GRID SECTION -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 lg:pb-24">
                <div class="flex items-center justify-between mb-12">
                    <div>
                        <span class="text-xs uppercase tracking-[0.25em] text-primary font-semibold">Iconic Pieces</span>
                        <h2 class="font-serif text-3xl sm:text-4xl text-dark-brown mt-2">Best Sellers</h2>
                    </div>
                    <button 
                        @click="filterCategory('best-sellers')" 
                        class="text-xs font-semibold uppercase tracking-widest text-dark-brown hover:text-primary transition-colors"
                    >
                        Explore All →
                    </button>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                    <template x-for="product in bestSellerProducts" :key="product.id">
                        <div class="group relative bg-white border border-soft-beige rounded-sm p-3 sm:p-4 flex flex-col justify-between hover:shadow-soft-lg transition-all duration-300">
                            
                            <!-- Image wrapper -->
                            <div class="relative aspect-[3/4] overflow-hidden rounded-sm bg-cream/50 mb-3 img-zoom-container">
                                <img 
                                    :src="product.images[0]" 
                                    :alt="product.name" 
                                    class="w-full h-full object-cover object-center"
                                >
                                
                                <span class="absolute top-2.5 left-2.5 bg-primary text-white text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-xs shadow-xs z-10">
                                    BEST SELLER
                                </span>

                                <button 
                                    @click.stop="toggleWishlist(product)" 
                                    class="absolute top-2.5 right-2.5 w-8 h-8 rounded-full bg-white/90 backdrop-blur-sm flex items-center justify-center text-dark-brown hover:text-rose-700 transition-colors shadow-xs z-10"
                                >
                                    <i data-lucide="heart" class="w-4 h-4" :class="isInWishlist(product.id) ? 'fill-rose-700 text-rose-700' : ''"></i>
                                </button>

                                <div class="absolute inset-x-2 bottom-2 hidden sm:flex opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                                    <button 
                                        @click.stop="openProductModal(product)" 
                                        class="w-full py-2.5 bg-dark-brown/95 text-cream text-[10px] uppercase tracking-widest font-semibold hover:bg-primary transition-colors backdrop-blur-sm rounded-xs flex items-center justify-center gap-1.5"
                                    >
                                        <i data-lucide="eye" class="w-3.5 h-3.5"></i>
                                        <span>Quick View</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Details -->
                            <div class="space-y-1.5">
                                <div class="flex items-center justify-between text-[11px] text-dark-brown/60">
                                    <span x-text="product.category ? product.category.name : 'Boutique'"></span>
                                    <div class="flex items-center gap-1 text-primary">
                                        <i data-lucide="star" class="w-3 h-3 fill-primary"></i>
                                        <span class="font-medium" x-text="product.rating"></span>
                                        <span class="text-dark-brown/40">(<span x-text="product.reviews_count"></span>)</span>
                                    </div>
                                </div>
                                <h4 
                                    @click="openProductModal(product)" 
                                    class="font-serif text-sm sm:text-base font-medium text-dark-brown group-hover:text-primary transition-colors cursor-pointer line-clamp-1" 
                                    x-text="product.name"
                                ></h4>
                                <div class="flex items-baseline gap-2 pt-0.5">
                                    <span 
                                        class="font-semibold text-dark-brown text-sm sm:text-base" 
                                        x-text="formatRupiah(product.discount_price || product.price)"
                                    ></span>
                                    <span 
                                        x-show="product.discount_price" 
                                        class="text-xs text-dark-brown/40 line-through" 
                                        x-text="formatRupiah(product.price)"
                                    ></span>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </section>

            <!-- 6. WHY SHOP WITH US (4 PILLARS) -->
            <section class="bg-soft-beige/50 border-y border-soft-beige py-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        
                        <div class="flex items-start gap-4 p-4 rounded-sm">
                            <div class="w-12 h-12 rounded-sm bg-white flex items-center justify-center text-dark-brown shadow-soft flex-shrink-0">
                                <i data-lucide="feather" class="w-6 h-6 text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-base font-semibold text-dark-brown">Quality Materials</h4>
                                <p class="text-xs text-dark-brown/70 mt-1 leading-relaxed">Certified French flax linen, 22-momme pure mulberry silk, and Inner Mongolian cashmere.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-sm">
                            <div class="w-12 h-12 rounded-sm bg-white flex items-center justify-center text-dark-brown shadow-soft flex-shrink-0">
                                <i data-lucide="sparkle" class="w-6 h-6 text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-base font-semibold text-dark-brown">Easy Shopping</h4>
                                <p class="text-xs text-dark-brown/70 mt-1 leading-relaxed">Streamlined, lightning-fast ordering experience designed for mobile and desktop.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-sm">
                            <div class="w-12 h-12 rounded-sm bg-white flex items-center justify-center text-dark-brown shadow-soft flex-shrink-0">
                                <i data-lucide="shield-check" class="w-6 h-6 text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-base font-semibold text-dark-brown">Secure Payment</h4>
                                <p class="text-xs text-dark-brown/70 mt-1 leading-relaxed">Full encryption with QRIS, Virtual Accounts (BCA/Mandiri/BNI), E-Wallet, and COD.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-sm">
                            <div class="w-12 h-12 rounded-sm bg-white flex items-center justify-center text-dark-brown shadow-soft flex-shrink-0">
                                <i data-lucide="truck" class="w-6 h-6 text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-base font-semibold text-dark-brown">Fast Delivery</h4>
                                <p class="text-xs text-dark-brown/70 mt-1 leading-relaxed">Nationwide priority dispatch in custom luxury boutique packaging.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- 7. CUSTOMER REVIEWS SECTION -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
                <div class="text-center max-w-xl mx-auto mb-14">
                    <span class="text-xs uppercase tracking-[0.25em] text-primary font-semibold">Praise from Our Clientele</span>
                    <h2 class="font-serif text-3xl sm:text-4xl text-dark-brown mt-2">What Our Customers Say</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <template x-for="review in reviews" :key="review.id">
                        <div class="bg-white border border-soft-beige rounded-sm p-6 shadow-soft flex flex-col justify-between">
                            <div class="space-y-3">
                                <!-- Star Rating -->
                                <div class="flex text-amber-600 gap-1">
                                    <template x-for="i in review.rating" :key="i">
                                        <i data-lucide="star" class="w-4 h-4 fill-amber-500 text-amber-500"></i>
                                    </template>
                                </div>
                                <p class="text-xs sm:text-sm text-dark-brown/80 font-light italic leading-relaxed" x-text="'“' + review.comment + '”'"></p>
                            </div>

                            <div class="pt-5 mt-4 border-t border-soft-beige/70 flex items-center gap-3">
                                <img 
                                    :src="review.author_photo" 
                                    :alt="review.author_name" 
                                    class="w-10 h-10 rounded-full object-cover border border-primary/30"
                                >
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <h5 class="text-xs font-semibold text-dark-brown" x-text="review.author_name"></h5>
                                        <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-primary" title="Verified Buyer"></i>
                                    </div>
                                    <span class="text-[10px] text-dark-brown/60 block truncate" x-text="'Membeli: ' + review.purchased_product_name"></span>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </section>

            <!-- 8. NEWSLETTER SECTION -->
            <section class="bg-dark-brown text-cream py-16">
                <div class="max-w-3xl mx-auto px-4 text-center space-y-5">
                    <span class="text-xs uppercase tracking-[0.3em] text-light-brown font-semibold">Join The Cercle DAÏRSCO</span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-normal">Stay in Style</h2>
                    <p class="text-xs sm:text-sm text-cream/70 max-w-md mx-auto font-light leading-relaxed">
                        Get updates on new arrivals, exclusive offers, private archive sales, and seasonal fashion inspiration directly to your inbox.
                    </p>
                    <form @submit.prevent="handleNewsletterSubscribe()" class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-2 max-w-md mx-auto">
                        <input 
                            type="email" 
                            x-model="newsletterEmail" 
                            placeholder="Alamat email Anda..." 
                            required 
                            class="w-full px-4 py-3 bg-cream/10 border border-cream/20 text-cream placeholder:text-cream/50 text-xs focus:outline-none focus:border-primary rounded-xs"
                        >
                        <button 
                            type="submit" 
                            class="w-full sm:w-auto px-6 py-3 bg-primary text-white hover:bg-light-brown hover:text-dark-brown text-xs uppercase tracking-widest font-semibold transition-colors rounded-xs flex-shrink-0"
                        >
                            Subscribe
                        </button>
                    </form>
                    <span class="block text-[11px] text-cream/50">Kami menghargai privasi Anda. Berhenti berlangganan kapan saja.</span>
                </div>
            </section>

        </div>

        <!-- ========================================== -->
        <!-- VIEW: PRODUCT LISTING PAGE (CATALOG)       -->
        <!-- ========================================== -->
        <div x-show="currentView === 'catalog'" x-cloak class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
            
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs text-dark-brown/60 mb-6">
                <button @click="navigate('home')" class="hover:text-primary">Home</button>
                <span>/</span>
                <span class="text-dark-brown font-medium">Catalog</span>
                <span x-show="selectedCategory !== 'all'">/</span>
                <span x-show="selectedCategory !== 'all'" class="text-primary capitalize font-medium" x-text="selectedCategory.replace('-', ' ')"></span>
            </nav>

            <!-- Catalog Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between border-b border-soft-beige pb-6 mb-8 gap-4">
                <div>
                    <h1 class="font-serif text-3xl sm:text-4xl text-dark-brown capitalize" x-text="selectedCategory === 'all' ? 'All Women\'s Collection' : selectedCategory.replace('-', ' ')"></h1>
                    <p class="text-xs sm:text-sm text-dark-brown/70 mt-1">Menampilkan <span class="font-semibold text-dark-brown" x-text="filteredProducts.length"></span> pakaian wanita berkualitas tinggi</p>
                </div>

                <!-- Sort & Filter Toggle Bar -->
                <div class="flex items-center gap-3">
                    <!-- Mobile Filter Trigger -->
                    <button 
                        @click="filterSidebarOpen = true" 
                        class="md:hidden inline-flex items-center gap-2 px-3 py-2 border border-soft-beige bg-white text-xs font-medium text-dark-brown rounded-xs"
                    >
                        <i data-lucide="sliders-horizontal" class="w-4 h-4"></i>
                        <span>Filter (<span x-text="activeFilterCount"></span>)</span>
                    </button>

                    <!-- Sort Dropdown -->
                    <div class="flex items-center gap-2 text-xs text-dark-brown/80">
                        <label for="catalogSort" class="hidden sm:inline font-medium">Sort By:</label>
                        <select 
                            id="catalogSort" 
                            x-model="catalogSort" 
                            @change="applyCatalogFilters()" 
                            class="px-3 py-2 bg-white border border-soft-beige rounded-xs text-xs font-medium text-dark-brown focus:outline-none focus:border-primary"
                        >
                            <option value="newest">Newest Arrivals</option>
                            <option value="best_selling">Best Selling</option>
                            <option value="price_asc">Price: Low to High</option>
                            <option value="price_desc">Price: High to Low</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Category Pills Bar -->
            <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-8 scrollbar-none">
                <button 
                    @click="filterCategory('all')" 
                    :class="selectedCategory === 'all' ? 'bg-dark-brown text-cream' : 'bg-white border border-soft-beige text-dark-brown hover:border-primary'"
                    class="px-4 py-2 rounded-xs text-xs uppercase tracking-wider font-semibold whitespace-nowrap transition-colors"
                >
                    All Items
                </button>
                <template x-for="cat in categories" :key="cat.slug">
                    <button 
                        @click="filterCategory(cat.slug)" 
                        :class="selectedCategory === cat.slug ? 'bg-dark-brown text-cream' : 'bg-white border border-soft-beige text-dark-brown hover:border-primary'"
                        class="px-4 py-2 rounded-xs text-xs uppercase tracking-wider font-semibold whitespace-nowrap transition-colors"
                        x-text="cat.name"
                    ></button>
                </template>
            </div>

            <!-- Catalog Layout: Sidebar + Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
                
                <!-- Desktop Filter Sidebar -->
                <aside class="hidden md:block md:col-span-3 space-y-6 sticky top-28 bg-white border border-soft-beige p-5 rounded-sm shadow-soft">
                    <div class="flex items-center justify-between pb-3 border-b border-soft-beige">
                        <h4 class="font-serif text-base font-semibold text-dark-brown">Filters</h4>
                        <button 
                            x-show="activeFilterCount > 0" 
                            @click="resetFilters()" 
                            class="text-[11px] text-primary hover:underline uppercase tracking-wider font-medium"
                        >
                            Reset All
                        </button>
                    </div>

                    <!-- Size Filter -->
                    <div class="space-y-3">
                        <span class="block text-xs font-semibold uppercase tracking-wider text-dark-brown">Ukuran (Size)</span>
                        <div class="flex flex-wrap gap-2">
                            <template x-for="size in availableSizes" :key="size">
                                <button 
                                    @click="toggleSizeFilter(size)" 
                                    :class="selectedSizes.includes(size) ? 'bg-dark-brown text-cream border-dark-brown' : 'bg-cream/50 text-dark-brown border-soft-beige hover:border-primary'"
                                    class="w-9 h-9 border rounded-xs text-xs font-semibold flex items-center justify-center transition-colors"
                                    x-text="size"
                                ></button>
                            </template>
                        </div>
                    </div>

                    <!-- Price Range Filter -->
                    <div class="space-y-3 pt-3 border-t border-soft-beige">
                        <div class="flex justify-between items-center text-xs">
                            <span class="font-semibold uppercase tracking-wider text-dark-brown">Maksimal Harga</span>
                            <span class="font-medium text-primary" x-text="formatRupiah(maxPriceFilter)"></span>
                        </div>
                        <input 
                            type="range" 
                            min="300000" 
                            max="2000000" 
                            step="50000" 
                            x-model="maxPriceFilter" 
                            @input="applyCatalogFilters()" 
                            class="w-full accent-dark-brown cursor-pointer"
                        >
                    </div>

                    <!-- Availability -->
                    <div class="space-y-2 pt-3 border-t border-soft-beige">
                        <label class="flex items-center gap-2 cursor-pointer text-xs text-dark-brown">
                            <input type="checkbox" x-model="inStockOnly" @change="applyCatalogFilters()" class="rounded-xs accent-dark-brown w-4 h-4">
                            <span>Hanya Stok Tersedia (In Stock)</span>
                        </label>
                    </div>

                    <!-- Rating Filter -->
                    <div class="space-y-2 pt-3 border-t border-soft-beige">
                        <label class="flex items-center gap-2 cursor-pointer text-xs text-dark-brown">
                            <input type="checkbox" x-model="fourStarsPlus" @change="applyCatalogFilters()" class="rounded-xs accent-dark-brown w-4 h-4">
                            <span class="flex items-center gap-1">
                                <span>Rating 4.9+</span>
                                <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-500 text-amber-500"></i>
                            </span>
                        </label>
                    </div>
                </aside>

                <!-- Products Grid -->
                <div class="md:col-span-9">
                    
                    <!-- Zero state when no products match filter -->
                    <div x-show="filteredProducts.length === 0" class="text-center py-16 bg-white border border-soft-beige rounded-sm p-8">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-cream flex items-center justify-center text-dark-brown/50">
                            <i data-lucide="search-x" class="w-8 h-8"></i>
                        </div>
                        <h3 class="font-serif text-xl font-semibold text-dark-brown">Produk Tidak Ditemukan</h3>
                        <p class="text-xs sm:text-sm text-dark-brown/70 mt-1 max-w-md mx-auto">Kami tidak menemukan produk yang cocok dengan kriteria filter Anda. Coba atur ulang filter pencarian.</p>
                        <button 
                            @click="resetFilters()" 
                            class="mt-5 px-6 py-2.5 bg-dark-brown text-cream hover:bg-primary text-xs uppercase tracking-widest font-semibold transition-colors rounded-xs"
                        >
                            Reset Semua Filter
                        </button>
                    </div>

                    <!-- Grid: 4 Desktop / 3 Tablet / 2 Mobile -->
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                        <template x-for="product in filteredProducts" :key="product.id">
                            <div class="group relative bg-white border border-soft-beige rounded-sm p-3 sm:p-4 flex flex-col justify-between hover:shadow-soft-lg transition-all duration-300">
                                
                                <div class="relative aspect-[3/4] overflow-hidden rounded-sm bg-cream/50 mb-3 img-zoom-container">
                                    <img 
                                        :src="product.images[0]" 
                                        :alt="product.name" 
                                        class="w-full h-full object-cover object-center"
                                    >
                                    
                                    <div class="absolute top-2.5 left-2.5 flex flex-col gap-1.5 z-10">
                                        <span 
                                            x-show="product.badge" 
                                            x-text="product.badge" 
                                            :class="{
                                                'bg-dark-brown text-cream': product.badge === 'NEW',
                                                'bg-primary text-white': product.badge === 'BEST SELLER',
                                                'bg-rose-900 text-white': product.badge === 'SALE'
                                            }"
                                            class="text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-xs shadow-xs"
                                        ></span>
                                    </div>

                                    <button 
                                        @click.stop="toggleWishlist(product)" 
                                        class="absolute top-2.5 right-2.5 w-8 h-8 rounded-full bg-white/90 backdrop-blur-sm flex items-center justify-center text-dark-brown hover:text-rose-700 transition-colors shadow-xs z-10"
                                    >
                                        <i data-lucide="heart" class="w-4 h-4" :class="isInWishlist(product.id) ? 'fill-rose-700 text-rose-700' : ''"></i>
                                    </button>

                                    <div class="absolute inset-x-2 bottom-2 hidden sm:flex opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                                        <button 
                                            @click.stop="openProductModal(product)" 
                                            class="w-full py-2.5 bg-dark-brown/95 text-cream text-[10px] uppercase tracking-widest font-semibold hover:bg-primary transition-colors backdrop-blur-sm rounded-xs flex items-center justify-center gap-1.5"
                                        >
                                            <i data-lucide="eye" class="w-3.5 h-3.5"></i>
                                            <span>Quick View</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="space-y-1.5">
                                    <div class="flex items-center justify-between text-[11px] text-dark-brown/60">
                                        <span x-text="product.category ? product.category.name : 'Boutique'"></span>
                                        <div class="flex items-center gap-1 text-primary">
                                            <i data-lucide="star" class="w-3 h-3 fill-primary"></i>
                                            <span class="font-medium" x-text="product.rating"></span>
                                        </div>
                                    </div>
                                    <h4 
                                        @click="openProductModal(product)" 
                                        class="font-serif text-sm sm:text-base font-medium text-dark-brown group-hover:text-primary transition-colors cursor-pointer line-clamp-1" 
                                        x-text="product.name"
                                    ></h4>
                                    <div class="flex items-baseline gap-2 pt-0.5">
                                        <span 
                                            class="font-semibold text-dark-brown text-sm sm:text-base" 
                                            x-text="formatRupiah(product.discount_price || product.price)"
                                        ></span>
                                        <span 
                                            x-show="product.discount_price" 
                                            class="text-xs text-dark-brown/40 line-through" 
                                            x-text="formatRupiah(product.price)"
                                        ></span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                </div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- VIEW: 4-STEP STREAMLINED CHECKOUT          -->
        <!-- ========================================== -->
        <div x-show="currentView === 'checkout'" x-cloak class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-14">
            
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 text-xs text-dark-brown/60 mb-6">
                <button @click="navigate('home')" class="hover:text-primary">Home</button>
                <span>/</span>
                <button @click="cartDrawerOpen = true" class="hover:text-primary">Keranjang</button>
                <span>/</span>
                <span class="text-dark-brown font-medium">Checkout</span>
            </div>

            <!-- STEP INDICATOR -->
            <div class="max-w-2xl mx-auto mb-10">
                <div class="flex items-center justify-between relative">
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 h-0.5 bg-soft-beige w-full -z-10"></div>
                    
                    <!-- Step 1: Information -->
                    <div class="flex flex-col items-center bg-cream px-2">
                        <div 
                            :class="checkoutStep >= 1 ? 'bg-dark-brown text-cream' : 'bg-soft-beige text-dark-brown/60'" 
                            class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold transition-colors"
                        >1</div>
                        <span class="text-[11px] font-semibold mt-1 text-dark-brown">Informasi</span>
                    </div>

                    <!-- Step 2: Shipping -->
                    <div class="flex flex-col items-center bg-cream px-2">
                        <div 
                            :class="checkoutStep >= 2 ? 'bg-dark-brown text-cream' : 'bg-soft-beige text-dark-brown/60'" 
                            class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold transition-colors"
                        >2</div>
                        <span class="text-[11px] font-semibold mt-1 text-dark-brown">Pengiriman</span>
                    </div>

                    <!-- Step 3: Payment -->
                    <div class="flex flex-col items-center bg-cream px-2">
                        <div 
                            :class="checkoutStep >= 3 ? 'bg-dark-brown text-cream' : 'bg-soft-beige text-dark-brown/60'" 
                            class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold transition-colors"
                        >3</div>
                        <span class="text-[11px] font-semibold mt-1 text-dark-brown">Pembayaran</span>
                    </div>

                    <!-- Step 4: Confirmation -->
                    <div class="flex flex-col items-center bg-cream px-2">
                        <div 
                            :class="checkoutStep === 4 ? 'bg-primary text-white' : 'bg-soft-beige text-dark-brown/60'" 
                            class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold transition-colors"
                        >4</div>
                        <span class="text-[11px] font-semibold mt-1 text-dark-brown">Konfirmasi</span>
                    </div>
                </div>
            </div>

            <!-- CHECKOUT CONTENT: Forms & Order Summary -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- Left Column: Step Content -->
                <div class="lg:col-span-7 bg-white border border-soft-beige p-6 sm:p-8 rounded-sm shadow-soft">
                    
                    <!-- STEP 1: INFORMATION FORM -->
                    <div x-show="checkoutStep === 1">
                        <h2 class="font-serif text-2xl text-dark-brown mb-6 font-semibold">1. Informasi Pengiriman</h2>
                        
                        <form @submit.prevent="proceedToShipping()" class="space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold uppercase tracking-wider text-dark-brown/80 mb-1.5">Nama Lengkap *</label>
                                    <input 
                                        type="text" 
                                        x-model="checkoutForm.customer_name" 
                                        required 
                                        placeholder="cth. Clarissa Stephanie"
                                        class="w-full px-3.5 py-2.5 bg-cream/30 border border-soft-beige rounded-xs text-xs focus:outline-none focus:border-primary text-dark-brown"
                                    >
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold uppercase tracking-wider text-dark-brown/80 mb-1.5">Nomor WhatsApp / HP *</label>
                                    <input 
                                        type="tel" 
                                        x-model="checkoutForm.customer_phone" 
                                        required 
                                        placeholder="0812XXXXXXXX"
                                        class="w-full px-3.5 py-2.5 bg-cream/30 border border-soft-beige rounded-xs text-xs focus:outline-none focus:border-primary text-dark-brown"
                                    >
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold uppercase tracking-wider text-dark-brown/80 mb-1.5">Email *</label>
                                <input 
                                    type="email" 
                                    x-model="checkoutForm.customer_email" 
                                    required 
                                    placeholder="clarissa@example.com"
                                    class="w-full px-3.5 py-2.5 bg-cream/30 border border-soft-beige rounded-xs text-xs focus:outline-none focus:border-primary text-dark-brown"
                                >
                            </div>

                            <div>
                                <label class="block text-xs font-semibold uppercase tracking-wider text-dark-brown/80 mb-1.5">Alamat Lengkap *</label>
                                <textarea 
                                    x-model="checkoutForm.shipping_address" 
                                    rows="2" 
                                    required 
                                    placeholder="Nama jalan, nomor rumah/kantor, RT/RW, kelurahan..."
                                    class="w-full px-3.5 py-2.5 bg-cream/30 border border-soft-beige rounded-xs text-xs focus:outline-none focus:border-primary text-dark-brown"
                                ></textarea>
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold uppercase tracking-wider text-dark-brown/80 mb-1.5">Provinsi *</label>
                                    <input 
                                        type="text" 
                                        x-model="checkoutForm.province" 
                                        required 
                                        placeholder="DKI Jakarta"
                                        class="w-full px-3.5 py-2.5 bg-cream/30 border border-soft-beige rounded-xs text-xs focus:outline-none focus:border-primary text-dark-brown"
                                    >
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold uppercase tracking-wider text-dark-brown/80 mb-1.5">Kota / Kab *</label>
                                    <input 
                                        type="text" 
                                        x-model="checkoutForm.city" 
                                        required 
                                        placeholder="Jakarta Selatan"
                                        class="w-full px-3.5 py-2.5 bg-cream/30 border border-soft-beige rounded-xs text-xs focus:outline-none focus:border-primary text-dark-brown"
                                    >
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label class="block text-xs font-semibold uppercase tracking-wider text-dark-brown/80 mb-1.5">Kode Pos *</label>
                                    <input 
                                        type="text" 
                                        x-model="checkoutForm.postal_code" 
                                        required 
                                        placeholder="12190"
                                        class="w-full px-3.5 py-2.5 bg-cream/30 border border-soft-beige rounded-xs text-xs focus:outline-none focus:border-primary text-dark-brown"
                                    >
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold uppercase tracking-wider text-dark-brown/80 mb-1.5">Catatan Pesanan (Opsional)</label>
                                <input 
                                    type="text" 
                                    x-model="checkoutForm.notes" 
                                    placeholder="cth. Mohon titip di resepsionis"
                                    class="w-full px-3.5 py-2.5 bg-cream/30 border border-soft-beige rounded-xs text-xs focus:outline-none focus:border-primary text-dark-brown"
                                >
                            </div>

                            <div class="pt-4 flex justify-end">
                                <button 
                                    type="submit" 
                                    class="px-8 py-3 bg-dark-brown text-cream hover:bg-primary text-xs uppercase tracking-widest font-semibold transition-colors rounded-xs shadow-soft"
                                >
                                    Lanjut ke Pengiriman →
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- STEP 2: SHIPPING SELECTION -->
                    <div x-show="checkoutStep === 2">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="font-serif text-2xl text-dark-brown font-semibold">2. Pilih Metode Pengiriman</h2>
                            <button @click="checkoutStep = 1" class="text-xs text-primary hover:underline">← Ubah Alamat</button>
                        </div>

                        <!-- Address preview -->
                        <div class="p-3.5 bg-cream/50 border border-soft-beige rounded-xs text-xs text-dark-brown/80 mb-6 space-y-1">
                            <div class="font-semibold text-dark-brown" x-text="checkoutForm.customer_name + ' (' + checkoutForm.customer_phone + ')'"></div>
                            <div x-text="checkoutForm.shipping_address + ', ' + checkoutForm.city + ', ' + checkoutForm.province + ' ' + checkoutForm.postal_code"></div>
                        </div>

                        <div class="space-y-3">
                            <!-- Option A: Standard Shipping -->
                            <label 
                                class="flex items-center justify-between p-4 border rounded-xs cursor-pointer transition-all"
                                :class="selectedShippingOption === 'standard' ? 'border-primary bg-primary/5 ring-1 ring-primary' : 'border-soft-beige bg-white hover:border-dark-brown/40'"
                            >
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="shippingMethod" value="standard" x-model="selectedShippingOption" @change="updateShippingCost(20000)" class="accent-dark-brown">
                                    <div>
                                        <div class="text-xs font-semibold text-dark-brown">Reguler Priority Delivery (2–3 Hari)</div>
                                        <div class="text-[11px] text-dark-brown/60">Kurir aman dengan perlindungan asuransi paket butik</div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-dark-brown" x-text="cartSubtotal >= 750000 ? 'GRATIS' : formatRupiah(20000)"></span>
                            </label>

                            <!-- Option B: Express Shipping -->
                            <label 
                                class="flex items-center justify-between p-4 border rounded-xs cursor-pointer transition-all"
                                :class="selectedShippingOption === 'express' ? 'border-primary bg-primary/5 ring-1 ring-primary' : 'border-soft-beige bg-white hover:border-dark-brown/40'"
                            >
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="shippingMethod" value="express" x-model="selectedShippingOption" @change="updateShippingCost(35000)" class="accent-dark-brown">
                                    <div>
                                        <div class="text-xs font-semibold text-dark-brown">Express Next-Day (1 Hari Kerja)</div>
                                        <div class="text-[11px] text-dark-brown/60">Paket prioritas tercepat sampai esok hari</div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-dark-brown" x-text="formatRupiah(35000)"></span>
                            </label>

                            <!-- Option C: Same-Day Instant -->
                            <label 
                                class="flex items-center justify-between p-4 border rounded-xs cursor-pointer transition-all"
                                :class="selectedShippingOption === 'instant' ? 'border-primary bg-primary/5 ring-1 ring-primary' : 'border-soft-beige bg-white hover:border-dark-brown/40'"
                            >
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="shippingMethod" value="instant" x-model="selectedShippingOption" @change="updateShippingCost(50000)" class="accent-dark-brown">
                                    <div>
                                        <div class="text-xs font-semibold text-dark-brown">Instant Courier (Jabodetabek / Same-Day)</div>
                                        <div class="text-[11px] text-dark-brown/60">Tiba dalam 3–4 jam setelah disiapkan</div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-dark-brown" x-text="formatRupiah(50000)"></span>
                            </label>
                        </div>

                        <div class="pt-6 flex justify-between items-center">
                            <button @click="checkoutStep = 1" class="text-xs font-semibold text-dark-brown hover:text-primary">← Kembali</button>
                            <button 
                                @click="checkoutStep = 3" 
                                class="px-8 py-3 bg-dark-brown text-cream hover:bg-primary text-xs uppercase tracking-widest font-semibold transition-colors rounded-xs shadow-soft"
                            >
                                Lanjut ke Pembayaran →
                            </button>
                        </div>
                    </div>

                    <!-- STEP 3: PAYMENT SELECTION -->
                    <div x-show="checkoutStep === 3">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="font-serif text-2xl text-dark-brown font-semibold">3. Metode Pembayaran</h2>
                            <button @click="checkoutStep = 2" class="text-xs text-primary hover:underline">← Ubah Pengiriman</button>
                        </div>

                        <div class="space-y-3">
                            <!-- QRIS -->
                            <label 
                                class="block p-4 border rounded-xs cursor-pointer transition-all"
                                :class="selectedPaymentMethod === 'qris' ? 'border-primary bg-primary/5 ring-1 ring-primary' : 'border-soft-beige bg-white hover:border-dark-brown/40'"
                            >
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="paymentMethod" value="qris" x-model="selectedPaymentMethod" class="accent-dark-brown">
                                        <span class="text-xs font-semibold text-dark-brown">QRIS (BCA, GoPay, OVO, ShopeePay, Dana)</span>
                                    </div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 bg-emerald-100 text-emerald-800 rounded-xs">Instan</span>
                                </div>
                                <div x-show="selectedPaymentMethod === 'qris'" class="mt-4 pt-3 border-t border-soft-beige text-center">
                                    <p class="text-xs text-dark-brown/70 mb-2">Pindai kode QRIS berikut dengan aplikasi bank / e-wallet Anda:</p>
                                    <div class="inline-block p-2 bg-white border border-soft-beige rounded-sm shadow-xs">
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=DAIRSCO-LUXURY-BOUTIQUE-PAYMENT" alt="QRIS DAÏRSCO" class="w-32 h-32 mx-auto">
                                    </div>
                                    <span class="block text-[10px] text-dark-brown/50 mt-1">Konfirmasi otomatis dalam hitungan detik</span>
                                </div>
                            </label>

                            <!-- Virtual Account BCA -->
                            <label 
                                class="block p-4 border rounded-xs cursor-pointer transition-all"
                                :class="selectedPaymentMethod === 'bca_va' ? 'border-primary bg-primary/5 ring-1 ring-primary' : 'border-soft-beige bg-white hover:border-dark-brown/40'"
                            >
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="paymentMethod" value="bca_va" x-model="selectedPaymentMethod" class="accent-dark-brown">
                                        <span class="text-xs font-semibold text-dark-brown">BCA Virtual Account</span>
                                    </div>
                                    <span class="text-xs text-dark-brown/60 font-mono">VA 8201 0812 9940</span>
                                </div>
                            </label>

                            <!-- Virtual Account Mandiri / BNI -->
                            <label 
                                class="block p-4 border rounded-xs cursor-pointer transition-all"
                                :class="selectedPaymentMethod === 'mandiri_va' ? 'border-primary bg-primary/5 ring-1 ring-primary' : 'border-soft-beige bg-white hover:border-dark-brown/40'"
                            >
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="paymentMethod" value="mandiri_va" x-model="selectedPaymentMethod" class="accent-dark-brown">
                                        <span class="text-xs font-semibold text-dark-brown">Mandiri / BNI Virtual Account</span>
                                    </div>
                                </div>
                            </label>

                            <!-- Credit / Debit Card -->
                            <label 
                                class="block p-4 border rounded-xs cursor-pointer transition-all"
                                :class="selectedPaymentMethod === 'credit_card' ? 'border-primary bg-primary/5 ring-1 ring-primary' : 'border-soft-beige bg-white hover:border-dark-brown/40'"
                            >
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="paymentMethod" value="credit_card" x-model="selectedPaymentMethod" class="accent-dark-brown">
                                        <span class="text-xs font-semibold text-dark-brown">Kartu Kredit / Debit (Visa, Mastercard, JCB)</span>
                                    </div>
                                    <i data-lucide="credit-card" class="w-4 h-4 text-dark-brown/60"></i>
                                </div>
                            </label>

                            <!-- COD -->
                            <label 
                                class="block p-4 border rounded-xs cursor-pointer transition-all"
                                :class="selectedPaymentMethod === 'cod' ? 'border-primary bg-primary/5 ring-1 ring-primary' : 'border-soft-beige bg-white hover:border-dark-brown/40'"
                            >
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="paymentMethod" value="cod" x-model="selectedPaymentMethod" class="accent-dark-brown">
                                        <span class="text-xs font-semibold text-dark-brown">Cash on Delivery (Bayar di Tempat)</span>
                                    </div>
                                    <span class="text-[10px] text-dark-brown/60">Jabodetabek Only</span>
                                </div>
                            </label>
                        </div>

                        <div class="pt-6 flex justify-between items-center">
                            <button @click="checkoutStep = 2" class="text-xs font-semibold text-dark-brown hover:text-primary">← Kembali</button>
                            <button 
                                @click="submitOrder()" 
                                :disabled="isSubmittingOrder" 
                                class="px-8 py-3.5 bg-dark-brown text-cream hover:bg-primary text-xs uppercase tracking-widest font-semibold transition-colors rounded-xs shadow-soft disabled:opacity-50 flex items-center gap-2"
                            >
                                <i x-show="isSubmittingOrder" data-lucide="loader" class="w-4 h-4 animate-spin"></i>
                                <span x-text="isSubmittingOrder ? 'Memproses Pesanan...' : 'Konfirmasi & Bayar Sekarang'"></span>
                            </button>
                        </div>
                    </div>

                    <!-- STEP 4: ORDER CONFIRMATION SCREEN -->
                    <div x-show="checkoutStep === 4" class="text-center py-6">
                        <div class="w-16 h-16 bg-emerald-100 text-emerald-800 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="check" class="w-8 h-8"></i>
                        </div>
                        <span class="text-xs uppercase tracking-[0.25em] text-primary font-semibold">Pesanan Berhasil Dibuat</span>
                        <h2 class="font-serif text-3xl font-semibold text-dark-brown mt-1">Merci Beaucoup!</h2>
                        <p class="text-xs sm:text-sm text-dark-brown/70 mt-2 max-w-md mx-auto">
                            Terima kasih atas pesanan Anda. Kami telah mengirimkan detail konfirmasi dan kwitansi ke email Anda.
                        </p>

                        <!-- Order Ref Box -->
                        <div class="my-6 p-4 bg-cream/70 border border-soft-beige rounded-sm inline-block text-left min-w-[280px]">
                            <div class="text-[11px] text-dark-brown/60 uppercase tracking-wider">Nomor Pesanan</div>
                            <div class="font-serif text-2xl font-bold text-dark-brown" x-text="completedOrder.order_number || '#DS-92811'"></div>
                            <div class="text-xs text-dark-brown/80 mt-2 pt-2 border-t border-soft-beige flex justify-between">
                                <span>Total Pembayaran:</span>
                                <span class="font-bold text-dark-brown" x-text="formatRupiah(completedOrder.total || 0)"></span>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 pt-2">
                            <button 
                                @click="openAccountTab('orders'); checkoutStep = 1; navigate('home')" 
                                class="w-full sm:w-auto px-6 py-2.5 bg-dark-brown text-cream hover:bg-primary text-xs uppercase tracking-widest font-semibold transition-colors rounded-xs"
                            >
                                Lacak Pesanan di Akun
                            </button>
                            <button 
                                @click="checkoutStep = 1; navigate('home')" 
                                class="w-full sm:w-auto px-6 py-2.5 bg-white border border-soft-beige text-dark-brown hover:bg-cream text-xs uppercase tracking-widest font-semibold transition-colors rounded-xs"
                            >
                                Lanjut Belanja
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Sticky Order Summary -->
                <div class="lg:col-span-5 bg-white border border-soft-beige p-6 rounded-sm shadow-soft sticky top-28">
                    <h3 class="font-serif text-lg font-semibold text-dark-brown pb-3 border-b border-soft-beige mb-4">Ringkasan Pesanan</h3>

                    <!-- Cart Item Rows -->
                    <div class="divide-y divide-soft-beige/60 max-h-64 overflow-y-auto pr-1">
                        <template x-for="item in cart" :key="item.id + item.selected_size + item.selected_color">
                            <div class="py-3 flex items-center gap-3">
                                <img :src="item.image" :alt="item.name" class="w-14 h-16 object-cover rounded-xs border border-soft-beige flex-shrink-0">
                                <div class="flex-grow">
                                    <h5 class="text-xs font-semibold text-dark-brown line-clamp-1" x-text="item.name"></h5>
                                    <div class="text-[11px] text-dark-brown/60">
                                        <span x-text="'Size: ' + (item.selected_size || 'Standard')"></span> • 
                                        <span x-text="item.selected_color || 'Default'"></span>
                                    </div>
                                    <div class="text-xs text-dark-brown font-medium mt-1">
                                        <span x-text="item.quantity + ' × '"></span>
                                        <span x-text="formatRupiah(item.price)"></span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Voucher Input -->
                    <div class="pt-4 border-t border-soft-beige">
                        <div class="flex gap-2">
                            <input 
                                type="text" 
                                x-model="voucherInput" 
                                placeholder="Kode voucher (cth. WELCOME10)" 
                                class="w-full px-3 py-2 bg-cream/40 border border-soft-beige rounded-xs text-xs uppercase focus:outline-none focus:border-primary text-dark-brown"
                            >
                            <button 
                                @click="applyVoucher()" 
                                class="px-4 py-2 bg-dark-brown text-cream hover:bg-primary text-xs uppercase tracking-wider font-semibold rounded-xs transition-colors flex-shrink-0"
                            >
                                Pakai
                            </button>
                        </div>
                        <div x-show="appliedCoupon" class="mt-2 text-[11px] text-emerald-800 font-medium flex items-center justify-between">
                            <span x-text="'Voucher ' + (appliedCoupon ? appliedCoupon.code : '') + ' Aktif (-' + (appliedCoupon ? appliedCoupon.discount_percent : 0) + '%)'"></span>
                            <button @click="removeVoucher()" class="text-rose-700 hover:underline">Hapus</button>
                        </div>
                    </div>

                    <!-- Calculations -->
                    <div class="pt-4 border-t border-soft-beige space-y-2 text-xs">
                        <div class="flex justify-between text-dark-brown/70">
                            <span>Subtotal Produk</span>
                            <span class="font-medium text-dark-brown" x-text="formatRupiah(cartSubtotal)"></span>
                        </div>
                        <div x-show="cartDiscountAmount > 0" class="flex justify-between text-emerald-800">
                            <span>Diskon Voucher</span>
                            <span class="font-medium" x-text="'-' + formatRupiah(cartDiscountAmount)"></span>
                        </div>
                        <div class="flex justify-between text-dark-brown/70">
                            <span>Biaya Pengiriman</span>
                            <span class="font-medium text-dark-brown" x-text="cartShippingFee === 0 ? 'GRATIS' : formatRupiah(cartShippingFee)"></span>
                        </div>
                        <div class="pt-2 border-t border-soft-beige flex justify-between items-baseline text-sm">
                            <span class="font-serif font-bold text-dark-brown text-base">Total Tagihan</span>
                            <span class="font-serif font-bold text-dark-brown text-lg" x-text="formatRupiah(cartFinalTotal)"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- ========================================== -->
        <!-- VIEW: ADMIN DASHBOARD                      -->
        <!-- ========================================== -->
        <div x-show="currentView === 'admin'" x-cloak class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 border-b border-soft-beige mb-8 gap-4">
                <div>
                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-dark-brown text-cream text-[10px] uppercase tracking-wider font-semibold rounded-xs mb-1">
                        <i data-lucide="shield" class="w-3 h-3"></i>
                        <span>Admin Console</span>
                    </div>
                    <h1 class="font-serif text-3xl font-bold text-dark-brown">Manajemen Boutique DAÏRSCO</h1>
                </div>
                <div class="flex items-center gap-3">
                    <button 
                        @click="openAddProductModal()" 
                        class="px-4 py-2.5 bg-dark-brown text-cream hover:bg-primary text-xs uppercase tracking-wider font-semibold rounded-xs transition-colors flex items-center gap-2"
                    >
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        <span>Tambah Produk Baru</span>
                    </button>
                    <button 
                        @click="navigate('home')" 
                        class="px-4 py-2.5 bg-white border border-soft-beige text-dark-brown hover:bg-cream text-xs uppercase tracking-wider font-semibold rounded-xs transition-colors"
                    >
                        Kembali ke Toko
                    </button>
                </div>
            </div>

            <!-- Stats Overview Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="bg-white border border-soft-beige p-5 rounded-sm shadow-soft">
                    <div class="flex items-center justify-between text-dark-brown/60 mb-2">
                        <span class="text-xs uppercase tracking-wider font-semibold">Total Pendapatan</span>
                        <i data-lucide="banknote" class="w-5 h-5 text-primary"></i>
                    </div>
                    <div class="font-serif text-2xl font-bold text-dark-brown" x-text="formatRupiah(adminStats.total_revenue || 0)"></div>
                    <span class="text-[11px] text-emerald-700 font-medium">Pembayaran terverifikasi</span>
                </div>

                <div class="bg-white border border-soft-beige p-5 rounded-sm shadow-soft">
                    <div class="flex items-center justify-between text-dark-brown/60 mb-2">
                        <span class="text-xs uppercase tracking-wider font-semibold">Total Pesanan</span>
                        <i data-lucide="package" class="w-5 h-5 text-primary"></i>
                    </div>
                    <div class="font-serif text-2xl font-bold text-dark-brown" x-text="adminStats.total_orders || 0"></div>
                    <span class="text-[11px] text-dark-brown/60 font-medium">Pesanan masuk</span>
                </div>

                <div class="bg-white border border-soft-beige p-5 rounded-sm shadow-soft">
                    <div class="flex items-center justify-between text-dark-brown/60 mb-2">
                        <span class="text-xs uppercase tracking-wider font-semibold">Total Produk Aktif</span>
                        <i data-lucide="shirt" class="w-5 h-5 text-primary"></i>
                    </div>
                    <div class="font-serif text-2xl font-bold text-dark-brown" x-text="adminStats.total_products || products.length"></div>
                    <span class="text-[11px] text-dark-brown/60 font-medium">Katalog butik</span>
                </div>

                <div class="bg-white border border-soft-beige p-5 rounded-sm shadow-soft">
                    <div class="flex items-center justify-between text-dark-brown/60 mb-2">
                        <span class="text-xs uppercase tracking-wider font-semibold">Stok Menipis</span>
                        <i data-lucide="alert-triangle" class="w-5 h-5 text-amber-600"></i>
                    </div>
                    <div class="font-serif text-2xl font-bold text-amber-700" x-text="adminStats.low_stock_count || 0"></div>
                    <span class="text-[11px] text-amber-800 font-medium">Stok &lt;= 10 pcs</span>
                </div>
            </div>

            <!-- Admin Tabs: Products vs Orders -->
            <div class="flex border-b border-soft-beige mb-6 gap-6">
                <button 
                    @click="adminActiveTab = 'products'" 
                    :class="adminActiveTab === 'products' ? 'border-b-2 border-dark-brown text-dark-brown font-bold' : 'text-dark-brown/60 hover:text-dark-brown'"
                    class="pb-3 text-xs uppercase tracking-widest transition-colors"
                >
                    Katalog Produk (<span x-text="products.length"></span>)
                </button>
                <button 
                    @click="adminActiveTab = 'orders'" 
                    :class="adminActiveTab === 'orders' ? 'border-b-2 border-dark-brown text-dark-brown font-bold' : 'text-dark-brown/60 hover:text-dark-brown'"
                    class="pb-3 text-xs uppercase tracking-widest transition-colors"
                >
                    Daftar Pesanan (<span x-text="adminOrders.length"></span>)
                </button>
            </div>

            <!-- Tab 1: Products Management Table -->
            <div x-show="adminActiveTab === 'products'" class="bg-white border border-soft-beige rounded-sm shadow-soft overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-cream/60 border-b border-soft-beige text-dark-brown font-semibold uppercase tracking-wider">
                            <tr>
                                <th class="p-3.5">Produk</th>
                                <th class="p-3.5">Kategori</th>
                                <th class="p-3.5">Harga</th>
                                <th class="p-3.5">Diskon</th>
                                <th class="p-3.5">Stok</th>
                                <th class="p-3.5">Badge</th>
                                <th class="p-3.5 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-soft-beige/70 text-dark-brown/90">
                            <template x-for="prod in products" :key="prod.id">
                                <tr class="hover:bg-cream/30 transition-colors">
                                    <td class="p-3.5 flex items-center gap-3">
                                        <img :src="prod.images[0]" :alt="prod.name" class="w-10 h-12 object-cover rounded-xs border border-soft-beige flex-shrink-0">
                                        <div>
                                            <div class="font-semibold text-dark-brown" x-text="prod.name"></div>
                                            <div class="text-[11px] text-dark-brown/50" x-text="prod.slug"></div>
                                        </div>
                                    </td>
                                    <td class="p-3.5" x-text="prod.category ? prod.category.name : '-'"></td>
                                    <td class="p-3.5 font-medium" x-text="formatRupiah(prod.price)"></td>
                                    <td class="p-3.5 text-rose-800" x-text="prod.discount_price ? formatRupiah(prod.discount_price) : '-'"></td>
                                    <td class="p-3.5">
                                        <span 
                                            :class="prod.stock <= 10 ? 'bg-amber-100 text-amber-800 font-bold' : 'bg-emerald-50 text-emerald-800'"
                                            class="px-2 py-0.5 rounded-xs text-[11px]"
                                            x-text="prod.stock + ' pcs'"
                                        ></span>
                                    </td>
                                    <td class="p-3.5">
                                        <span x-show="prod.badge" class="px-2 py-0.5 bg-dark-brown text-cream text-[9px] font-bold rounded-xs" x-text="prod.badge"></span>
                                        <span x-show="!prod.badge" class="text-dark-brown/40">-</span>
                                    </td>
                                    <td class="p-3.5 text-right space-x-2">
                                        <button @click="openEditProductModal(prod)" class="text-primary hover:underline font-semibold">Edit</button>
                                        <button @click="deleteProduct(prod.id)" class="text-rose-700 hover:underline font-semibold">Hapus</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tab 2: Orders Management Table -->
            <div x-show="adminActiveTab === 'orders'" class="bg-white border border-soft-beige rounded-sm shadow-soft overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-cream/60 border-b border-soft-beige text-dark-brown font-semibold uppercase tracking-wider">
                            <tr>
                                <th class="p-3.5">No. Pesanan</th>
                                <th class="p-3.5">Pelanggan</th>
                                <th class="p-3.5">Total Belanja</th>
                                <th class="p-3.5">Metode Bayar</th>
                                <th class="p-3.5">Status Bayar</th>
                                <th class="p-3.5">Status Pesanan</th>
                                <th class="p-3.5 text-right">Ubah Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-soft-beige/70 text-dark-brown/90">
                            <template x-for="ord in adminOrders" :key="ord.id">
                                <tr class="hover:bg-cream/30 transition-colors">
                                    <td class="p-3.5 font-bold font-serif text-dark-brown" x-text="ord.order_number"></td>
                                    <td class="p-3.5">
                                        <div class="font-semibold text-dark-brown" x-text="ord.customer_name"></div>
                                        <div class="text-[11px] text-dark-brown/60" x-text="ord.customer_phone"></div>
                                    </td>
                                    <td class="p-3.5 font-bold" x-text="formatRupiah(ord.total)"></td>
                                    <td class="p-3.5 uppercase" x-text="ord.payment_method"></td>
                                    <td class="p-3.5">
                                        <span 
                                            :class="ord.payment_status === 'paid' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800'"
                                            class="px-2 py-0.5 rounded-xs text-[10px] font-bold uppercase"
                                            x-text="ord.payment_status"
                                        ></span>
                                    </td>
                                    <td class="p-3.5">
                                        <span 
                                            :class="{
                                                'bg-blue-100 text-blue-800': ord.order_status === 'processing',
                                                'bg-indigo-100 text-indigo-800': ord.order_status === 'shipped',
                                                'bg-emerald-100 text-emerald-800': ord.order_status === 'delivered',
                                                'bg-rose-100 text-rose-800': ord.order_status === 'cancelled'
                                            }"
                                            class="px-2 py-0.5 rounded-xs text-[10px] font-bold uppercase"
                                            x-text="ord.order_status"
                                        ></span>
                                    </td>
                                    <td class="p-3.5 text-right">
                                        <select 
                                            @change="updateAdminOrderStatus(ord.id, $event.target.value)" 
                                            class="px-2 py-1 bg-cream/50 border border-soft-beige rounded-xs text-xs"
                                        >
                                            <option value="processing" :selected="ord.order_status === 'processing'">Processing</option>
                                            <option value="shipped" :selected="ord.order_status === 'shipped'">Shipped</option>
                                            <option value="delivered" :selected="ord.order_status === 'delivered'">Delivered</option>
                                            <option value="cancelled" :selected="ord.order_status === 'cancelled'">Cancelled</option>
                                        </select>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </main>

    <!-- ========================================== -->
    <!-- FOOTER                                     -->
    <!-- ========================================== -->
    <footer class="bg-cream border-t border-soft-beige pt-16 pb-20 md:pb-12 text-dark-brown">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 mb-12">
                
                <!-- Brand Info -->
                <div class="lg:col-span-2 space-y-4">
                    <span class="block font-serif text-2xl tracking-[0.2em] font-semibold text-dark-brown">DAÏRSCO</span>
                    <span class="block text-[9px] tracking-[0.3em] text-primary uppercase font-semibold -mt-2">Paris • Jakarta</span>
                    <p class="text-xs text-dark-brown/70 max-w-sm font-light leading-relaxed">
                        Maison de mode modern boutique dedicated to timeless women's fashion. Crafted with exquisite natural fabrics, designed to endure through every chapter of your life.
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <a href="https://instagram.com" target="_blank" class="w-8 h-8 rounded-full border border-soft-beige bg-white flex items-center justify-center text-dark-brown hover:text-primary transition-colors">
                            <i data-lucide="instagram" class="w-4 h-4"></i>
                        </a>
                        <a href="https://tiktok.com" target="_blank" class="w-8 h-8 rounded-full border border-soft-beige bg-white flex items-center justify-center text-dark-brown hover:text-primary transition-colors">
                            <i data-lucide="video" class="w-4 h-4"></i>
                        </a>
                        <a href="https://wa.me/6281289123456" target="_blank" class="w-8 h-8 rounded-full border border-soft-beige bg-white flex items-center justify-center text-dark-brown hover:text-primary transition-colors">
                            <i data-lucide="message-circle" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Column 1: Shop Collections -->
                <div class="space-y-3">
                    <h5 class="text-xs uppercase tracking-widest font-bold text-dark-brown">Koleksi</h5>
                    <ul class="space-y-2 text-xs text-dark-brown/70 font-light">
                        <li><a href="#" @click.prevent="filterCategory('new-arrivals')" class="hover:text-primary transition-colors">New Arrivals</a></li>
                        <li><a href="#" @click.prevent="filterCategory('blouses')" class="hover:text-primary transition-colors">Linen Blouses</a></li>
                        <li><a href="#" @click.prevent="filterCategory('dresses')" class="hover:text-primary transition-colors">Silk Dresses</a></li>
                        <li><a href="#" @click.prevent="filterCategory('outerwear')" class="hover:text-primary transition-colors">Tailored Trench & Coats</a></li>
                        <li><a href="#" @click.prevent="filterCategory('sale')" class="hover:text-primary transition-colors text-amber-800 font-medium">Seasonal Archive (Sale)</a></li>
                    </ul>
                </div>

                <!-- Column 2: Customer Service -->
                <div class="space-y-3">
                    <h5 class="text-xs uppercase tracking-widest font-bold text-dark-brown">Customer Care</h5>
                    <ul class="space-y-2 text-xs text-dark-brown/70 font-light">
                        <li><a href="#" @click.prevent="sizeGuideModalOpen = true" class="hover:text-primary transition-colors">Size Guide & Fit</a></li>
                        <li><a href="#" @click.prevent="openAccountTab('orders')" class="hover:text-primary transition-colors">Lacak Pesanan</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Kebijakan Pengembalian (30 Hari)</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Informasi Pengiriman</a></li>
                        <li><a href="https://wa.me/6281289123456" class="hover:text-primary transition-colors">Hubungi Concierge WhatsApp</a></li>
                    </ul>
                </div>

                <!-- Column 3: Boutique Atelier -->
                <div class="space-y-3">
                    <h5 class="text-xs uppercase tracking-widest font-bold text-dark-brown">Boutique Atelier</h5>
                    <p class="text-xs text-dark-brown/70 leading-relaxed font-light">
                        Flagship Boutique: <br>
                        Senopati Promenade No. 42, Kebayoran Baru, Jakarta Selatan.
                    </p>
                    <p class="text-xs text-dark-brown/70 leading-relaxed font-light">
                        Buka Setiap Hari: 10:00 – 21:00 WIB
                    </p>
                </div>

            </div>

            <div class="pt-8 border-t border-soft-beige flex flex-col sm:flex-row items-center justify-between text-[11px] text-dark-brown/60 gap-4">
                <span>© 2026 DAÏRSCO Atelier Paris • Jakarta. All rights reserved.</span>
                <div class="flex items-center space-x-6">
                    <a href="#" class="hover:text-primary">Privacy Policy</a>
                    <a href="#" class="hover:text-primary">Terms & Conditions</a>
                    <a href="#" class="hover:text-primary">Cookie Settings</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- ========================================== -->
    <!-- SLIDE-OVER: SHOPPING CART DRAWER           -->
    <!-- ========================================== -->
    <div x-show="cartDrawerOpen" x-cloak class="relative z-50">
        <!-- Backdrop -->
        <div 
            x-show="cartDrawerOpen" 
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="cartDrawerOpen = false" 
            class="fixed inset-0 bg-dark-brown/50 backdrop-blur-xs"
        ></div>

        <!-- Slide panel -->
        <div class="fixed inset-y-0 right-0 max-w-full flex pl-10">
            <div 
                x-show="cartDrawerOpen" 
                x-transition:enter="transform transition ease-in-out duration-300"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in-out duration-300"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="w-screen max-w-md bg-white border-l border-soft-beige flex flex-col shadow-soft-xl"
            >
                <!-- Drawer Header -->
                <div class="p-5 border-b border-soft-beige flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <i data-lucide="shopping-bag" class="w-5 h-5 text-dark-brown"></i>
                        <h3 class="font-serif text-lg font-semibold text-dark-brown">Keranjang Belanja</h3>
                        <span class="text-xs text-dark-brown/60">(<span x-text="cartTotalItems"></span> item)</span>
                    </div>
                    <button @click="cartDrawerOpen = false" class="p-1 text-dark-brown/60 hover:text-dark-brown">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>

                <!-- Free Shipping Progress -->
                <div class="px-5 py-3 bg-cream/70 border-b border-soft-beige text-xs">
                    <div class="flex justify-between items-center mb-1.5 font-medium">
                        <span x-show="cartSubtotal < 750000" x-text="'Tambah ' + formatRupiah(750000 - cartSubtotal) + ' lagi untuk Bebas Ongkir!'"></span>
                        <span x-show="cartSubtotal >= 750000" class="text-emerald-800 font-semibold flex items-center gap-1">
                            <i data-lucide="check-circle" class="w-3.5 h-3.5"></i>
                            Selamat! Anda berhak mendapatkan Gratis Ongkir!
                        </span>
                    </div>
                    <div class="w-full bg-soft-beige h-1.5 rounded-full overflow-hidden">
                        <div 
                            class="bg-primary h-full transition-all duration-300" 
                            :style="'width: ' + Math.min(100, (cartSubtotal / 750000) * 100) + '%'"
                        ></div>
                    </div>
                </div>

                <!-- Cart Items List -->
                <div class="flex-1 overflow-y-auto p-5 divide-y divide-soft-beige/70">
                    <div x-show="cart.length === 0" class="text-center py-16">
                        <i data-lucide="shopping-bag" class="w-12 h-12 text-dark-brown/30 mx-auto mb-3"></i>
                        <h4 class="font-serif text-base font-semibold text-dark-brown">Keranjang Anda Masih Kosong</h4>
                        <p class="text-xs text-dark-brown/60 mt-1 mb-5">Temukan busana pilihan Anda dari koleksi terbaru kami.</p>
                        <button 
                            @click="cartDrawerOpen = false; filterCategory('all')" 
                            class="px-6 py-2.5 bg-dark-brown text-cream hover:bg-primary text-xs uppercase tracking-widest font-semibold rounded-xs transition-colors"
                        >
                            Mulai Belanja
                        </button>
                    </div>

                    <template x-for="item in cart" :key="item.id + item.selected_size + item.selected_color">
                        <div class="py-4 flex gap-3">
                            <img :src="item.image" :alt="item.name" class="w-16 h-20 object-cover rounded-xs border border-soft-beige flex-shrink-0">
                            <div class="flex-1 flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between">
                                        <h5 class="text-xs font-semibold text-dark-brown line-clamp-1" x-text="item.name"></h5>
                                        <button @click="removeFromCart(item)" class="text-dark-brown/40 hover:text-rose-700 ml-2">
                                            <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                        </button>
                                    </div>
                                    <div class="text-[11px] text-dark-brown/60 mt-0.5">
                                        <span x-text="'Size: ' + item.selected_size"></span> • <span x-text="item.selected_color"></span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between pt-2">
                                    <!-- Stepper -->
                                    <div class="flex items-center border border-soft-beige rounded-xs bg-cream/40">
                                        <button @click="decreaseQty(item)" class="w-6 h-6 flex items-center justify-center text-xs font-bold hover:bg-soft-beige">-</button>
                                        <span class="w-7 text-center text-xs font-semibold" x-text="item.quantity"></span>
                                        <button @click="increaseQty(item)" class="w-6 h-6 flex items-center justify-center text-xs font-bold hover:bg-soft-beige">+</button>
                                    </div>
                                    <span class="font-serif font-bold text-xs text-dark-brown" x-text="formatRupiah(item.price * item.quantity)"></span>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Drawer Footer (Subtotal + Checkout CTA) -->
                <div x-show="cart.length > 0" class="p-5 border-t border-soft-beige bg-cream/30 space-y-3">
                    <div class="flex justify-between items-baseline">
                        <span class="text-xs uppercase tracking-wider text-dark-brown/70 font-semibold">Subtotal</span>
                        <span class="font-serif font-bold text-base text-dark-brown" x-text="formatRupiah(cartSubtotal)"></span>
                    </div>
                    <p class="text-[11px] text-dark-brown/60">Biaya kirim dan voucher diskon akan dihitung saat checkout.</p>
                    <button 
                        @click="cartDrawerOpen = false; navigate('checkout')" 
                        class="w-full py-3.5 bg-dark-brown text-cream hover:bg-primary text-xs uppercase tracking-widest font-semibold transition-colors rounded-xs shadow-soft flex items-center justify-center gap-2"
                    >
                        <span>Proceed to Checkout</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL: PRODUCT DETAIL (PDP) / QUICK VIEW   -->
    <!-- ========================================== -->
    <div x-show="productModalOpen" x-cloak class="relative z-50">
        <div 
            x-show="productModalOpen" 
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="productModalOpen = false" 
            class="fixed inset-0 bg-dark-brown/60 backdrop-blur-xs"
        ></div>

        <div class="fixed inset-0 overflow-y-auto p-4 sm:p-6 lg:p-8 flex items-center justify-center">
            <div 
                x-show="productModalOpen" 
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:scale-95"
                class="bg-white border border-soft-beige rounded-sm shadow-soft-xl max-w-4xl w-full relative overflow-hidden my-8"
            >
                <!-- Close Button -->
                <button 
                    @click="productModalOpen = false" 
                    class="absolute top-4 right-4 z-20 w-8 h-8 rounded-full bg-white/90 backdrop-blur-sm flex items-center justify-center text-dark-brown hover:text-primary transition-colors shadow-xs"
                >
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>

                <div x-show="selectedProduct" class="grid grid-cols-1 md:grid-cols-12 gap-6 sm:gap-8 p-5 sm:p-8">
                    
                    <!-- Left Gallery: Active Image + Thumbnails -->
                    <div class="md:col-span-6 space-y-3">
                        <div class="aspect-[3/4] rounded-sm overflow-hidden bg-cream relative img-zoom-container border border-soft-beige">
                            <img 
                                :src="activeProductImage || (selectedProduct ? selectedProduct.images[0] : '')" 
                                :alt="selectedProduct ? selectedProduct.name : ''" 
                                class="w-full h-full object-cover object-center"
                            >
                            <span 
                                x-show="selectedProduct && selectedProduct.badge" 
                                x-text="selectedProduct ? selectedProduct.badge : ''" 
                                class="absolute top-3 left-3 bg-dark-brown text-cream text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-xs"
                            ></span>
                        </div>

                        <!-- Thumbnails -->
                        <div class="flex gap-2.5 overflow-x-auto pb-1">
                            <template x-for="(img, idx) in (selectedProduct ? selectedProduct.images : [])" :key="idx">
                                <button 
                                    @click="activeProductImage = img" 
                                    :class="activeProductImage === img ? 'ring-2 ring-primary border-primary' : 'opacity-70 hover:opacity-100'"
                                    class="w-16 h-20 rounded-xs overflow-hidden border border-soft-beige flex-shrink-0 transition-all"
                                >
                                    <img :src="img" class="w-full h-full object-cover">
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Right Column: Details & Interactive Selectors -->
                    <div class="md:col-span-6 flex flex-col justify-between space-y-5">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between text-xs text-dark-brown/60">
                                <span class="uppercase tracking-widest text-[10px] font-semibold text-primary" x-text="selectedProduct && selectedProduct.category ? selectedProduct.category.name : 'Boutique'"></span>
                                <div class="flex items-center gap-1 text-primary">
                                    <i data-lucide="star" class="w-3.5 h-3.5 fill-primary"></i>
                                    <span class="font-bold" x-text="selectedProduct ? selectedProduct.rating : 5"></span>
                                    <span class="text-dark-brown/50">(<span x-text="selectedProduct ? selectedProduct.reviews_count : 0"></span> ulasan)</span>
                                </div>
                            </div>

                            <h2 class="font-serif text-2xl sm:text-3xl font-semibold text-dark-brown" x-text="selectedProduct ? selectedProduct.name : ''"></h2>

                            <!-- Pricing -->
                            <div class="flex items-baseline gap-3">
                                <span 
                                    class="font-serif text-xl sm:text-2xl font-bold text-dark-brown" 
                                    x-text="formatRupiah(selectedProduct ? (selectedProduct.discount_price || selectedProduct.price) : 0)"
                                ></span>
                                <span 
                                    x-show="selectedProduct && selectedProduct.discount_price" 
                                    class="text-sm text-dark-brown/40 line-through" 
                                    x-text="formatRupiah(selectedProduct ? selectedProduct.price : 0)"
                                ></span>
                                <span 
                                    x-show="selectedProduct && selectedProduct.discount_price" 
                                    class="px-2 py-0.5 bg-rose-100 text-rose-800 text-[10px] font-bold rounded-xs uppercase tracking-wider"
                                >
                                    Save <span x-text="Math.round(((selectedProduct.price - selectedProduct.discount_price) / selectedProduct.price) * 100)"></span>%
                                </span>
                            </div>

                            <p class="text-xs sm:text-sm text-dark-brown/80 font-light leading-relaxed" x-text="selectedProduct ? selectedProduct.short_description : ''"></p>

                            <!-- Color selection -->
                            <div class="pt-2">
                                <div class="flex items-center justify-between text-xs mb-2">
                                    <span class="font-semibold uppercase tracking-wider text-dark-brown">Pilihan Warna: <span class="font-normal text-primary" x-text="activeSelectedColor"></span></span>
                                </div>
                                <div class="flex gap-2">
                                    <template x-for="col in (selectedProduct && selectedProduct.colors ? selectedProduct.colors : [])" :key="col.name">
                                        <button 
                                            @click="activeSelectedColor = col.name" 
                                            :title="col.name"
                                            :class="activeSelectedColor === col.name ? 'ring-2 ring-primary ring-offset-2 scale-110' : 'hover:scale-105'"
                                            class="w-7 h-7 rounded-full border border-dark-brown/20 transition-all flex items-center justify-center"
                                            :style="'background-color: ' + col.hex"
                                        >
                                            <span x-show="activeSelectedColor === col.name" class="w-1.5 h-1.5 rounded-full bg-dark-brown/80"></span>
                                        </button>
                                    </template>
                                </div>
                            </div>

                            <!-- Size selection -->
                            <div class="pt-2">
                                <div class="flex items-center justify-between text-xs mb-2">
                                    <span class="font-semibold uppercase tracking-wider text-dark-brown">Ukuran (Size)</span>
                                    <button @click="sizeGuideModalOpen = true" class="text-primary hover:underline flex items-center gap-1 font-medium">
                                        <i data-lucide="ruler" class="w-3.5 h-3.5"></i>
                                        <span>Size Guide</span>
                                    </button>
                                </div>
                                <div class="flex gap-2">
                                    <template x-for="sz in (selectedProduct && selectedProduct.sizes ? selectedProduct.sizes : ['S','M','L'])" :key="sz">
                                        <button 
                                            @click="activeSelectedSize = sz" 
                                            :class="activeSelectedSize === sz ? 'bg-dark-brown text-cream border-dark-brown' : 'bg-cream/40 text-dark-brown border-soft-beige hover:border-primary'"
                                            class="w-10 h-10 border rounded-xs text-xs font-semibold flex items-center justify-center transition-colors"
                                            x-text="sz"
                                        ></button>
                                    </template>
                                </div>
                                <div x-show="selectedProduct && selectedProduct.stock <= 10" class="text-[11px] text-amber-800 font-medium mt-1.5 flex items-center gap-1">
                                    <i data-lucide="alert-circle" class="w-3 h-3"></i>
                                    <span>Hanya tersisa <strong x-text="selectedProduct.stock"></strong> pcs di butik!</span>
                                </div>
                            </div>

                            <!-- Quantity Stepper & Actions -->
                            <div class="pt-4 flex items-center gap-3">
                                <div class="flex items-center border border-soft-beige rounded-xs bg-cream/40 h-11">
                                    <button @click="if(productQty > 1) productQty--" class="w-9 h-full flex items-center justify-center text-sm font-bold hover:bg-soft-beige">-</button>
                                    <span class="w-8 text-center text-xs font-semibold" x-text="productQty"></span>
                                    <button @click="productQty++" class="w-9 h-full flex items-center justify-center text-sm font-bold hover:bg-soft-beige">+</button>
                                </div>

                                <button 
                                    @click="addToCartFromModal()" 
                                    class="flex-1 h-11 bg-dark-brown text-cream hover:bg-primary text-xs uppercase tracking-widest font-semibold transition-colors rounded-xs shadow-soft flex items-center justify-center gap-2"
                                >
                                    <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                                    <span>Add to Cart</span>
                                </button>

                                <button 
                                    @click="toggleWishlist(selectedProduct)" 
                                    class="w-11 h-11 border border-soft-beige rounded-xs flex items-center justify-center text-dark-brown hover:text-rose-700 hover:border-rose-300 transition-colors"
                                >
                                    <i data-lucide="heart" class="w-5 h-5" :class="isInWishlist(selectedProduct ? selectedProduct.id : 0) ? 'fill-rose-700 text-rose-700' : ''"></i>
                                </button>
                            </div>

                            <button 
                                @click="buyNowFromModal()" 
                                class="w-full py-3 bg-primary text-white hover:bg-dark-brown text-xs uppercase tracking-widest font-semibold transition-colors rounded-xs shadow-soft"
                            >
                                Buy Now (Beli Langsung)
                            </button>
                        </div>

                        <!-- Product Accordions -->
                        <div class="pt-4 border-t border-soft-beige divide-y divide-soft-beige/70 text-xs">
                            <div class="py-2.5">
                                <div @click="toggleAccordion('material')" class="flex justify-between items-center cursor-pointer font-semibold uppercase tracking-wider text-dark-brown">
                                    <span>Material & Komposisi</span>
                                    <i data-lucide="chevron-down" class="w-4 h-4 transform transition-transform" :class="activeAccordion === 'material' ? 'rotate-180' : ''"></i>
                                </div>
                                <div x-show="activeAccordion === 'material'" class="mt-2 text-dark-brown/70 leading-relaxed font-light" x-text="selectedProduct ? selectedProduct.material : ''"></div>
                            </div>

                            <div class="py-2.5">
                                <div @click="toggleAccordion('care')" class="flex justify-between items-center cursor-pointer font-semibold uppercase tracking-wider text-dark-brown">
                                    <span>Petunjuk Perawatan (Care)</span>
                                    <i data-lucide="chevron-down" class="w-4 h-4 transform transition-transform" :class="activeAccordion === 'care' ? 'rotate-180' : ''"></i>
                                </div>
                                <div x-show="activeAccordion === 'care'" class="mt-2 text-dark-brown/70 leading-relaxed font-light" x-text="selectedProduct ? selectedProduct.care_instructions : ''"></div>
                            </div>

                            <div class="py-2.5">
                                <div @click="toggleAccordion('shipping')" class="flex justify-between items-center cursor-pointer font-semibold uppercase tracking-wider text-dark-brown">
                                    <span>Pengiriman & Pengembalian</span>
                                    <i data-lucide="chevron-down" class="w-4 h-4 transform transition-transform" :class="activeAccordion === 'shipping' ? 'rotate-180' : ''"></i>
                                </div>
                                <div x-show="activeAccordion === 'shipping'" class="mt-2 text-dark-brown/70 leading-relaxed font-light space-y-1">
                                    <p>• Estimasi Pengiriman: 2–3 hari kerja ke seluruh Indonesia.</p>
                                    <p>• Garansi Retur 30 hari untuk penukaran ukuran atau pengembalian produk butik.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL: INSTANT LIVE SEARCH MODAL           -->
    <!-- ========================================== -->
    <div x-show="searchModalOpen" x-cloak class="relative z-50">
        <div 
            x-show="searchModalOpen" 
            x-transition:enter="ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="searchModalOpen = false" 
            class="fixed inset-0 bg-dark-brown/60 backdrop-blur-xs"
        ></div>

        <div class="fixed inset-x-0 top-0 max-w-2xl mx-auto p-4 sm:p-6 z-50">
            <div 
                class="bg-white border border-soft-beige rounded-sm shadow-soft-xl overflow-hidden"
                @click.away="searchModalOpen = false"
            >
                <!-- Search Input Bar -->
                <div class="p-4 border-b border-soft-beige flex items-center gap-3">
                    <i data-lucide="search" class="w-5 h-5 text-primary flex-shrink-0"></i>
                    <input 
                        type="text" 
                        x-ref="searchInput" 
                        x-model="searchQuery" 
                        @input.debounce.300ms="performLiveSearch()" 
                        placeholder="Ketik nama busana, bahan (cth. blouse, linen, silk, trench)..."
                        class="w-full text-sm text-dark-brown placeholder:text-dark-brown/40 focus:outline-none"
                    >
                    <button @click="searchModalOpen = false" class="p-1 text-dark-brown/40 hover:text-dark-brown">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>

                <!-- Suggestions / Recent Searches -->
                <div x-show="!searchQuery" class="p-5 space-y-4">
                    <div>
                        <span class="block text-[11px] font-semibold uppercase tracking-wider text-dark-brown/60 mb-2">Pencarian Populer</span>
                        <div class="flex flex-wrap gap-2">
                            <button @click="setSearchQuery('Linen Blouse')" class="px-3 py-1 bg-cream/70 hover:bg-cream border border-soft-beige rounded-xs text-xs text-dark-brown">Linen Blouse</button>
                            <button @click="setSearchQuery('Silk Slip Dress')" class="px-3 py-1 bg-cream/70 hover:bg-cream border border-soft-beige rounded-xs text-xs text-dark-brown">Silk Slip Dress</button>
                            <button @click="setSearchQuery('Trench Coat')" class="px-3 py-1 bg-cream/70 hover:bg-cream border border-soft-beige rounded-xs text-xs text-dark-brown">Trench Coat</button>
                            <button @click="setSearchQuery('Cashmere Knit')" class="px-3 py-1 bg-cream/70 hover:bg-cream border border-soft-beige rounded-xs text-xs text-dark-brown">Cashmere Knit</button>
                        </div>
                    </div>

                    <div x-show="recentSearches.length > 0">
                        <span class="block text-[11px] font-semibold uppercase tracking-wider text-dark-brown/60 mb-2">Pencarian Terakhir</span>
                        <div class="flex flex-wrap gap-2">
                            <template x-for="r in recentSearches" :key="r">
                                <button @click="setSearchQuery(r)" class="px-3 py-1 bg-white hover:bg-cream border border-soft-beige rounded-xs text-xs text-dark-brown flex items-center gap-1.5">
                                    <i data-lucide="clock" class="w-3 h-3 text-dark-brown/40"></i>
                                    <span x-text="r"></span>
                                </button>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Search Results List -->
                <div x-show="searchQuery" class="max-h-96 overflow-y-auto p-4 divide-y divide-soft-beige/70">
                    <div x-show="searchResults.length === 0" class="text-center py-8">
                        <p class="text-xs text-dark-brown/60">Sorry, we couldn't find what you're looking for.</p>
                        <span class="block text-[11px] text-primary font-semibold mt-1">Lihat rekomendasi produk terbaik kami di bawah:</span>
                    </div>

                    <template x-for="item in (searchResults.length > 0 ? searchResults : bestSellerProducts.slice(0, 3))" :key="item.id">
                        <div 
                            @click="searchModalOpen = false; openProductModal(item)" 
                            class="py-3 flex items-center gap-3 cursor-pointer hover:bg-cream/40 p-2 rounded-xs transition-colors"
                        >
                            <img :src="item.images[0]" :alt="item.name" class="w-12 h-14 object-cover rounded-xs border border-soft-beige flex-shrink-0">
                            <div class="flex-1">
                                <h5 class="text-xs font-semibold text-dark-brown" x-text="item.name"></h5>
                                <span class="text-[11px] text-dark-brown/60 line-clamp-1" x-text="item.short_description"></span>
                                <span class="font-serif font-bold text-xs text-dark-brown mt-0.5 block" x-text="formatRupiah(item.discount_price || item.price)"></span>
                            </div>
                            <i data-lucide="chevron-right" class="w-4 h-4 text-dark-brown/40"></i>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL: SIZE GUIDE MODAL                    -->
    <!-- ========================================== -->
    <div x-show="sizeGuideModalOpen" x-cloak class="relative z-50">
        <div @click="sizeGuideModalOpen = false" class="fixed inset-0 bg-dark-brown/60 backdrop-blur-xs"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="bg-white border border-soft-beige rounded-sm shadow-soft-xl max-w-lg w-full p-6 relative">
                <button @click="sizeGuideModalOpen = false" class="absolute top-4 right-4 text-dark-brown/60 hover:text-dark-brown">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
                <div class="flex items-center gap-2 mb-4">
                    <i data-lucide="ruler" class="w-5 h-5 text-primary"></i>
                    <h3 class="font-serif text-xl font-semibold text-dark-brown">Panduan Ukuran (Size Guide)</h3>
                </div>
                <p class="text-xs text-dark-brown/70 mb-4">Pengukuran dalam satuan Centimeter (cm) dengan toleransi 1–2 cm.</p>
                <div class="overflow-x-auto border border-soft-beige rounded-xs">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-cream/60 border-b border-soft-beige uppercase font-semibold text-dark-brown">
                            <tr>
                                <th class="p-2.5">Size</th>
                                <th class="p-2.5">Bust (Dada)</th>
                                <th class="p-2.5">Waist (Pinggang)</th>
                                <th class="p-2.5">Hips (Pinggul)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-soft-beige/70">
                            <tr><td class="p-2.5 font-bold">XS</td><td class="p-2.5">80–84 cm</td><td class="p-2.5">62–66 cm</td><td class="p-2.5">88–92 cm</td></tr>
                            <tr><td class="p-2.5 font-bold">S</td><td class="p-2.5">84–88 cm</td><td class="p-2.5">66–70 cm</td><td class="p-2.5">92–96 cm</td></tr>
                            <tr><td class="p-2.5 font-bold">M</td><td class="p-2.5">88–94 cm</td><td class="p-2.5">70–76 cm</td><td class="p-2.5">96–102 cm</td></tr>
                            <tr><td class="p-2.5 font-bold">L</td><td class="p-2.5">94–100 cm</td><td class="p-2.5">76–82 cm</td><td class="p-2.5">102–108 cm</td></tr>
                            <tr><td class="p-2.5 font-bold">XL</td><td class="p-2.5">100–108 cm</td><td class="p-2.5">82–90 cm</td><td class="p-2.5">108–116 cm</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL: CUSTOMER ACCOUNT CENTER             -->
    <!-- ========================================== -->
    <div x-show="accountModalOpen" x-cloak class="relative z-50">
        <div @click="accountModalOpen = false" class="fixed inset-0 bg-dark-brown/60 backdrop-blur-xs"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="bg-white border border-soft-beige rounded-sm shadow-soft-xl max-w-2xl w-full p-6 relative">
                <button @click="accountModalOpen = false" class="absolute top-4 right-4 text-dark-brown/60 hover:text-dark-brown">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
                
                <!-- Account Header -->
                <div class="flex items-center gap-4 pb-5 border-b border-soft-beige">
                    <div class="w-14 h-14 rounded-full bg-cream border border-primary/40 flex items-center justify-center text-primary font-serif text-xl font-bold">
                        CS
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="font-serif text-xl font-semibold text-dark-brown">Clarissa Stephanie</h3>
                            <span class="px-2 py-0.5 bg-primary/20 text-dark-brown text-[10px] font-bold rounded-xs uppercase tracking-wider">Gold Tier Member</span>
                        </div>
                        <span class="text-xs text-dark-brown/60">clarissa.s@example.com • +62 812-8912-3456</span>
                    </div>
                </div>

                <!-- Account Tabs -->
                <div class="flex border-b border-soft-beige gap-6 my-4">
                    <button 
                        @click="accountTab = 'orders'" 
                        :class="accountTab === 'orders' ? 'border-b-2 border-dark-brown text-dark-brown font-bold' : 'text-dark-brown/60'"
                        class="pb-2 text-xs uppercase tracking-wider transition-colors"
                    >
                        Riwayat Pesanan
                    </button>
                    <button 
                        @click="accountTab = 'wishlist'" 
                        :class="accountTab === 'wishlist' ? 'border-b-2 border-dark-brown text-dark-brown font-bold' : 'text-dark-brown/60'"
                        class="pb-2 text-xs uppercase tracking-wider transition-colors"
                    >
                        Wishlist Saya (<span x-text="wishlist.length"></span>)
                    </button>
                    <button 
                        @click="accountTab = 'address'" 
                        :class="accountTab === 'address' ? 'border-b-2 border-dark-brown text-dark-brown font-bold' : 'text-dark-brown/60'"
                        class="pb-2 text-xs uppercase tracking-wider transition-colors"
                    >
                        Buku Alamat
                    </button>
                </div>

                <!-- Tab: Orders -->
                <div x-show="accountTab === 'orders'" class="space-y-3 max-h-72 overflow-y-auto">
                    <template x-for="ord in adminOrders" :key="ord.id">
                        <div class="p-3.5 border border-soft-beige rounded-xs bg-cream/20 flex items-center justify-between">
                            <div>
                                <div class="font-serif font-bold text-sm text-dark-brown" x-text="ord.order_number"></div>
                                <div class="text-[11px] text-dark-brown/60" x-text="ord.created_at ? new Date(ord.created_at).toLocaleDateString('id-ID') : 'Baru saja'"></div>
                                <span 
                                    :class="ord.order_status === 'delivered' ? 'bg-emerald-100 text-emerald-800' : 'bg-blue-100 text-blue-800'"
                                    class="inline-block mt-1 px-2 py-0.5 text-[9px] font-bold uppercase rounded-xs"
                                    x-text="'Status: ' + ord.order_status"
                                ></span>
                            </div>
                            <div class="text-right">
                                <span class="font-serif font-bold text-xs text-dark-brown" x-text="formatRupiah(ord.total)"></span>
                                <span class="block text-[10px] text-dark-brown/60 uppercase" x-text="ord.payment_method"></span>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Tab: Wishlist -->
                <div x-show="accountTab === 'wishlist'" class="space-y-3 max-h-72 overflow-y-auto">
                    <div x-show="wishlist.length === 0" class="text-center py-8 text-xs text-dark-brown/60">
                        Belum ada busana di wishlist Anda. Klik ikon hati pada produk untuk menyimpannya.
                    </div>
                    <template x-for="item in wishlist" :key="item.id">
                        <div class="p-3 border border-soft-beige rounded-xs flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <img :src="item.images[0]" :alt="item.name" class="w-12 h-14 object-cover rounded-xs border border-soft-beige">
                                <div>
                                    <h5 class="text-xs font-semibold text-dark-brown" x-text="item.name"></h5>
                                    <span class="font-serif text-xs font-bold text-dark-brown" x-text="formatRupiah(item.discount_price || item.price)"></span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <button 
                                    @click="addToCart(item); removeFromWishlist(item.id)" 
                                    class="px-3 py-1.5 bg-dark-brown text-cream hover:bg-primary text-[10px] uppercase tracking-wider font-semibold rounded-xs"
                                >
                                    Pindah ke Keranjang
                                </button>
                                <button @click="removeFromWishlist(item.id)" class="text-dark-brown/40 hover:text-rose-700 p-1">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Tab: Address -->
                <div x-show="accountTab === 'address'" class="space-y-3">
                    <div class="p-4 border border-primary bg-primary/5 rounded-xs">
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-xs font-bold text-dark-brown">Alamat Utama (Rumah)</span>
                            <span class="text-[10px] font-bold text-primary uppercase">Default</span>
                        </div>
                        <p class="text-xs text-dark-brown/80">Jl. Senopati No. 42, Kebayoran Baru, Jakarta Selatan, DKI Jakarta 12190</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL: ADD / EDIT PRODUCT (ADMIN)          -->
    <!-- ========================================== -->
    <div x-show="adminProductModalOpen" x-cloak class="relative z-50">
        <div @click="adminProductModalOpen = false" class="fixed inset-0 bg-dark-brown/60 backdrop-blur-xs"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="bg-white border border-soft-beige rounded-sm shadow-soft-xl max-w-lg w-full p-6 relative">
                <button @click="adminProductModalOpen = false" class="absolute top-4 right-4 text-dark-brown/60 hover:text-dark-brown">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
                <h3 class="font-serif text-xl font-semibold text-dark-brown mb-4" x-text="isEditingProduct ? 'Edit Produk' : 'Tambah Produk Baru'"></h3>
                
                <form @submit.prevent="saveAdminProduct()" class="space-y-3">
                    <div>
                        <label class="block text-xs font-semibold text-dark-brown mb-1">Nama Busana *</label>
                        <input type="text" x-model="adminProductForm.name" required class="w-full px-3 py-2 bg-cream/30 border border-soft-beige rounded-xs text-xs">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-dark-brown mb-1">Kategori *</label>
                            <select x-model="adminProductForm.category_id" required class="w-full px-3 py-2 bg-cream/30 border border-soft-beige rounded-xs text-xs">
                                <template x-for="cat in categories" :key="cat.id">
                                    <option :value="cat.id" x-text="cat.name"></option>
                                </template>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-dark-brown mb-1">Stok (Pcs) *</label>
                            <input type="number" x-model="adminProductForm.stock" required class="w-full px-3 py-2 bg-cream/30 border border-soft-beige rounded-xs text-xs">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-dark-brown mb-1">Harga Normal (Rp) *</label>
                            <input type="number" x-model="adminProductForm.price" required class="w-full px-3 py-2 bg-cream/30 border border-soft-beige rounded-xs text-xs">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-dark-brown mb-1">Harga Diskon (Rp)</label>
                            <input type="number" x-model="adminProductForm.discount_price" class="w-full px-3 py-2 bg-cream/30 border border-soft-beige rounded-xs text-xs">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-dark-brown mb-1">Deskripsi Singkat *</label>
                        <textarea x-model="adminProductForm.short_description" rows="2" required class="w-full px-3 py-2 bg-cream/30 border border-soft-beige rounded-xs text-xs"></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-dark-brown mb-1">URL Foto Produk (Unsplash / WebP) *</label>
                        <input type="url" x-model="adminProductForm.image_url" required placeholder="https://..." class="w-full px-3 py-2 bg-cream/30 border border-soft-beige rounded-xs text-xs">
                    </div>
                    <div class="pt-3 flex justify-end gap-2">
                        <button type="button" @click="adminProductModalOpen = false" class="px-4 py-2 border border-soft-beige text-xs font-semibold rounded-xs">Batal</button>
                        <button type="submit" class="px-6 py-2 bg-dark-brown text-cream hover:bg-primary text-xs uppercase tracking-wider font-semibold rounded-xs">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MOBILE BOTTOM NAVIGATION (MOBILE-FIRST)    -->
    <!-- ========================================== -->
    <nav class="md:hidden fixed bottom-0 inset-x-0 bg-cream/95 backdrop-blur-md border-t border-soft-beige z-40 px-2 py-1.5 flex items-center justify-around shadow-soft">
        <button 
            @click="navigate('home')" 
            :class="currentView === 'home' ? 'text-primary' : 'text-dark-brown/70'"
            class="flex flex-col items-center gap-0.5 py-1 px-3 text-[10px] font-medium"
        >
            <i data-lucide="home" class="w-5 h-5"></i>
            <span>Home</span>
        </button>

        <button 
            @click="filterCategory('all')" 
            :class="currentView === 'catalog' ? 'text-primary' : 'text-dark-brown/70'"
            class="flex flex-col items-center gap-0.5 py-1 px-3 text-[10px] font-medium"
        >
            <i data-lucide="layout-grid" class="w-5 h-5"></i>
            <span>Kategori</span>
        </button>

        <button 
            @click="openSearchModal()" 
            class="flex flex-col items-center gap-0.5 py-1 px-3 text-[10px] font-medium text-dark-brown/70"
        >
            <i data-lucide="search" class="w-5 h-5"></i>
            <span>Cari</span>
        </button>

        <button 
            @click="openAccountTab('wishlist')" 
            class="flex flex-col items-center gap-0.5 py-1 px-3 text-[10px] font-medium text-dark-brown/70 relative"
        >
            <i data-lucide="heart" class="w-5 h-5"></i>
            <span>Wishlist</span>
            <span 
                x-show="wishlist.length > 0" 
                x-text="wishlist.length" 
                class="absolute top-0 right-3 w-3.5 h-3.5 bg-primary text-white text-[8px] font-bold rounded-full flex items-center justify-center"
            ></span>
        </button>

        <button 
            @click="cartDrawerOpen = true" 
            class="flex flex-col items-center gap-0.5 py-1 px-3 text-[10px] font-medium text-dark-brown/70 relative"
        >
            <i data-lucide="shopping-bag" class="w-5 h-5"></i>
            <span>Cart</span>
            <span 
                x-show="cartTotalItems > 0" 
                x-text="cartTotalItems" 
                class="absolute top-0 right-3 w-3.5 h-3.5 bg-dark-brown text-cream text-[8px] font-bold rounded-full flex items-center justify-center"
            ></span>
        </button>
    </nav>

    <!-- ========================================== -->
    <!-- TOAST NOTIFICATION CONTAINER               -->
    <!-- ========================================== -->
    <div class="fixed bottom-20 md:bottom-6 right-4 sm:right-6 z-50 flex flex-col gap-2 max-w-sm w-full pointer-events-none">
        <template x-for="toast in toasts" :key="toast.id">
            <div 
                x-show="toast.visible" 
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-3"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="pointer-events-auto bg-dark-brown text-cream px-4 py-3 rounded-xs shadow-soft-lg border border-primary/30 flex items-center gap-3 text-xs"
            >
                <i data-lucide="check-circle-2" class="w-4 h-4 text-primary flex-shrink-0"></i>
                <span class="flex-1" x-text="toast.message"></span>
            </div>
        </template>
    </div>

    <!-- INITIAL SERVER DATA INJECTION -->
    <script>
        window.INITIAL_DATA = {
            categories: @json($initialCategories),
            products: @json($initialProducts),
            coupons: @json($initialCoupons),
            reviews: @json($initialReviews),
        };
    </script>

    <!-- REACTIVE CLIENT SCRIPT -->
    <script>
        function boutiqueApp() {
            return {
                currentView: 'home', // 'home', 'catalog', 'checkout', 'admin'
                categories: window.INITIAL_DATA?.categories || [],
                products: window.INITIAL_DATA?.products || [],
                coupons: window.INITIAL_DATA?.coupons || [],
                reviews: window.INITIAL_DATA?.reviews || [],
                
                // Navigation & Modals
                mobileMenuOpen: false,
                cartDrawerOpen: false,
                productModalOpen: false,
                searchModalOpen: false,
                sizeGuideModalOpen: false,
                accountModalOpen: false,
                adminProductModalOpen: false,

                // Filtering & Catalog
                selectedCategory: 'all',
                catalogSort: 'newest',
                filteredProducts: [],
                availableSizes: ['XS', 'S', 'M', 'L', 'XL'],
                selectedSizes: [],
                maxPriceFilter: 2000000,
                inStockOnly: false,
                fourStarsPlus: false,
                filterSidebarOpen: false,

                // Live Search
                searchQuery: '',
                searchResults: [],
                recentSearches: ['Linen Blouse', 'Silk Dress', 'Trench'],

                // Product Detail Modal State
                selectedProduct: null,
                activeProductImage: '',
                activeSelectedColor: '',
                activeSelectedSize: 'S',
                productQty: 1,
                activeAccordion: 'material',

                // Cart & Wishlist
                cart: [],
                wishlist: [],
                voucherInput: '',
                appliedCoupon: null,

                // Checkout State
                checkoutStep: 1,
                isSubmittingOrder: false,
                selectedShippingOption: 'standard',
                selectedPaymentMethod: 'qris',
                completedOrder: {},
                checkoutForm: {
                    customer_name: 'Clarissa Stephanie',
                    customer_phone: '081289123456',
                    customer_email: 'clarissa.s@example.com',
                    shipping_address: 'Jl. Senopati No. 42, Kebayoran Baru',
                    province: 'DKI Jakarta',
                    city: 'Jakarta Selatan',
                    district: 'Kebayoran Baru',
                    postal_code: '12190',
                    notes: '',
                },

                // User Account
                accountTab: 'orders',

                // Admin
                adminActiveTab: 'products',
                adminStats: {},
                adminOrders: [],
                isEditingProduct: false,
                adminProductForm: {
                    id: null,
                    name: '',
                    category_id: 1,
                    price: 450000,
                    discount_price: null,
                    stock: 20,
                    short_description: '',
                    image_url: 'https://images.unsplash.com/photo-1598554747436-c9293d6a588f?q=80&w=900&auto=format&fit=crop',
                },

                // Newsletter & Toasts
                newsletterEmail: '',
                toasts: [],

                initApp() {
                    // Load local storage if exists
                    const savedCart = localStorage.getItem('dairsco_cart');
                    if (savedCart) {
                        try { this.cart = JSON.parse(savedCart); } catch(e){}
                    }

                    const savedWishlist = localStorage.getItem('dairsco_wishlist');
                    if (savedWishlist) {
                        try { this.wishlist = JSON.parse(savedWishlist); } catch(e){}
                    }

                    this.applyCatalogFilters();
                    this.fetchAdminData();

                    this.$nextTick(() => {
                        lucide.createIcons();
                    });
                },

                navigate(view) {
                    this.currentView = view;
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    this.$nextTick(() => lucide.createIcons());
                },

                toggleAdminView() {
                    this.currentView = this.currentView === 'admin' ? 'home' : 'admin';
                    if (this.currentView === 'admin') {
                        this.fetchAdminData();
                    }
                    this.$nextTick(() => lucide.createIcons());
                },

                // Computed Getters
                get newArrivalProducts() {
                    return this.products.filter(p => p.is_new_arrival).slice(0, 8);
                },

                get bestSellerProducts() {
                    return this.products.filter(p => p.is_best_seller || p.rating >= 4.9).slice(0, 8);
                },

                get cartTotalItems() {
                    return this.cart.reduce((sum, item) => sum + item.quantity, 0);
                },

                get cartSubtotal() {
                    return this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                },

                get cartDiscountAmount() {
                    if (!this.appliedCoupon) return 0;
                    return (this.cartSubtotal * this.appliedCoupon.discount_percent) / 100;
                },

                get cartShippingFee() {
                    if (this.cartSubtotal >= 750000 && this.selectedShippingOption === 'standard') {
                        return 0;
                    }
                    if (this.selectedShippingOption === 'express') return 35000;
                    if (this.selectedShippingOption === 'instant') return 50000;
                    return 20000;
                },

                get cartFinalTotal() {
                    return Math.max(0, this.cartSubtotal - this.cartDiscountAmount + this.cartShippingFee);
                },

                get activeFilterCount() {
                    let count = 0;
                    if (this.selectedSizes.length > 0) count++;
                    if (this.maxPriceFilter < 2000000) count++;
                    if (this.inStockOnly) count++;
                    if (this.fourStarsPlus) count++;
                    return count;
                },

                // Catalog & Filtering
                filterCategory(categorySlug) {
                    this.selectedCategory = categorySlug;
                    this.navigate('catalog');
                    this.applyCatalogFilters();
                },

                applyCatalogFilters() {
                    let list = [...this.products];

                    // Category
                    if (this.selectedCategory !== 'all') {
                        if (this.selectedCategory === 'new-arrivals') {
                            list = list.filter(p => p.is_new_arrival);
                        } else if (this.selectedCategory === 'best-sellers') {
                            list = list.filter(p => p.is_best_seller);
                        } else if (this.selectedCategory === 'sale') {
                            list = list.filter(p => p.discount_price !== null && p.discount_price > 0);
                        } else {
                            list = list.filter(p => p.category && p.category.slug === this.selectedCategory);
                        }
                    }

                    // Sizes
                    if (this.selectedSizes.length > 0) {
                        list = list.filter(p => {
                            if (!Array.isArray(p.sizes)) return false;
                            return this.selectedSizes.some(s => p.sizes.includes(s));
                        });
                    }

                    // Max Price
                    list = list.filter(p => {
                        const effPrice = p.discount_price || p.price;
                        return effPrice <= this.maxPriceFilter;
                    });

                    // Stock
                    if (this.inStockOnly) {
                        list = list.filter(p => p.stock > 0);
                    }

                    // Rating
                    if (this.fourStarsPlus) {
                        list = list.filter(p => p.rating >= 4.9);
                    }

                    // Sorting
                    if (this.catalogSort === 'price_asc') {
                        list.sort((a, b) => (a.discount_price || a.price) - (b.discount_price || b.price));
                    } else if (this.catalogSort === 'price_desc') {
                        list.sort((a, b) => (b.discount_price || b.price) - (a.discount_price || a.price));
                    } else if (this.catalogSort === 'best_selling') {
                        list.sort((a, b) => b.rating - a.rating);
                    } else {
                        // newest
                        list.sort((a, b) => b.id - a.id);
                    }

                    this.filteredProducts = list;
                    this.$nextTick(() => lucide.createIcons());
                },

                toggleSizeFilter(size) {
                    if (this.selectedSizes.includes(size)) {
                        this.selectedSizes = this.selectedSizes.filter(s => s !== size);
                    } else {
                        this.selectedSizes.push(size);
                    }
                    this.applyCatalogFilters();
                },

                resetFilters() {
                    this.selectedSizes = [];
                    this.maxPriceFilter = 2000000;
                    this.inStockOnly = false;
                    this.fourStarsPlus = false;
                    this.catalogSort = 'newest';
                    this.applyCatalogFilters();
                },

                // Search Modal
                openSearchModal() {
                    this.searchModalOpen = true;
                    this.searchQuery = '';
                    this.searchResults = [];
                    setTimeout(() => {
                        if (this.$refs.searchInput) this.$refs.searchInput.focus();
                        lucide.createIcons();
                    }, 100);
                },

                setSearchQuery(q) {
                    this.searchQuery = q;
                    this.performLiveSearch();
                },

                performLiveSearch() {
                    const q = this.searchQuery.toLowerCase().trim();
                    if (!q) {
                        this.searchResults = [];
                        return;
                    }

                    this.searchResults = this.products.filter(p => {
                        return p.name.toLowerCase().includes(q) || 
                               (p.short_description && p.short_description.toLowerCase().includes(q)) ||
                               (p.material && p.material.toLowerCase().includes(q));
                    });

                    if (this.searchResults.length > 0 && !this.recentSearches.includes(this.searchQuery)) {
                        this.recentSearches.unshift(this.searchQuery);
                        if (this.recentSearches.length > 5) this.recentSearches.pop();
                    }

                    this.$nextTick(() => lucide.createIcons());
                },

                // Product Detail Modal
                openProductModal(product) {
                    this.selectedProduct = product;
                    this.activeProductImage = product.images && product.images.length > 0 ? product.images[0] : '';
                    this.activeSelectedColor = product.colors && product.colors.length > 0 ? product.colors[0].name : 'Default';
                    this.activeSelectedSize = product.sizes && product.sizes.length > 0 ? product.sizes[0] : 'S';
                    this.productQty = 1;
                    this.productModalOpen = true;
                    this.$nextTick(() => lucide.createIcons());
                },

                toggleAccordion(tab) {
                    this.activeAccordion = this.activeAccordion === tab ? null : tab;
                    this.$nextTick(() => lucide.createIcons());
                },

                // Cart Methods
                addToCart(product, size = null, color = null, qty = 1) {
                    const s = size || (product.sizes ? product.sizes[0] : 'Standard');
                    const c = color || (product.colors ? product.colors[0].name : 'Default');

                    const existing = this.cart.find(item => item.id === product.id && item.selected_size === s && item.selected_color === c);
                    if (existing) {
                        existing.quantity += qty;
                    } else {
                        this.cart.push({
                            id: product.id,
                            name: product.name,
                            price: product.discount_price || product.price,
                            image: product.images[0],
                            selected_size: s,
                            selected_color: c,
                            quantity: qty,
                        });
                    }

                    this.saveCart();
                    this.showToast(`Berhasil menambahkan "${product.name}" ke keranjang!`);
                    this.$nextTick(() => lucide.createIcons());
                },

                addToCartFromModal() {
                    if (!this.selectedProduct) return;
                    this.addToCart(this.selectedProduct, this.activeSelectedSize, this.activeSelectedColor, this.productQty);
                    this.productModalOpen = false;
                    this.cartDrawerOpen = true;
                },

                buyNowFromModal() {
                    if (!this.selectedProduct) return;
                    this.addToCart(this.selectedProduct, this.activeSelectedSize, this.activeSelectedColor, this.productQty);
                    this.productModalOpen = false;
                    this.navigate('checkout');
                },

                increaseQty(item) {
                    item.quantity++;
                    this.saveCart();
                },

                decreaseQty(item) {
                    if (item.quantity > 1) {
                        item.quantity--;
                    } else {
                        this.removeFromCart(item);
                    }
                    this.saveCart();
                },

                removeFromCart(item) {
                    this.cart = this.cart.filter(i => !(i.id === item.id && i.selected_size === item.selected_size && i.selected_color === item.selected_color));
                    this.saveCart();
                    this.showToast('Item dihapus dari keranjang.');
                },

                saveCart() {
                    localStorage.setItem('dairsco_cart', JSON.stringify(this.cart));
                },

                // Wishlist Methods
                isInWishlist(productId) {
                    return this.wishlist.some(p => p.id === productId);
                },

                toggleWishlist(product) {
                    if (this.isInWishlist(product.id)) {
                        this.removeFromWishlist(product.id);
                    } else {
                        this.wishlist.push(product);
                        this.saveWishlist();
                        this.showToast(`"${product.name}" ditambahkan ke Wishlist.`);
                    }
                    this.$nextTick(() => lucide.createIcons());
                },

                removeFromWishlist(productId) {
                    this.wishlist = this.wishlist.filter(p => p.id !== productId);
                    this.saveWishlist();
                    this.showToast('Item dihapus dari Wishlist.');
                    this.$nextTick(() => lucide.createIcons());
                },

                saveWishlist() {
                    localStorage.setItem('dairsco_wishlist', JSON.stringify(this.wishlist));
                },

                openAccountTab(tab) {
                    this.accountTab = tab;
                    this.accountModalOpen = true;
                    this.$nextTick(() => lucide.createIcons());
                },

                // Voucher Coupon
                applyVoucher() {
                    const code = this.voucherInput.toUpperCase().trim();
                    if (!code) return;

                    fetch('/api/coupon/apply', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            code: code,
                            subtotal: this.cartSubtotal
                        })
                    })
                    .then(r => r.json())
                    .then(data => {
                        if (data.success) {
                            this.appliedCoupon = data.coupon;
                            this.showToast(data.message);
                        } else {
                            this.showToast(data.message || 'Voucher tidak valid.');
                        }
                    })
                    .catch(() => {
                        this.showToast('Gagal memvalidasi kupon voucher.');
                    });
                },

                removeVoucher() {
                    this.appliedCoupon = null;
                    this.voucherInput = '';
                    this.showToast('Voucher dihapus.');
                },

                // 4-Step Checkout
                proceedToShipping() {
                    if (this.cart.length === 0) {
                        this.showToast('Keranjang Anda kosong.');
                        return;
                    }
                    this.checkoutStep = 2;
                    this.$nextTick(() => lucide.createIcons());
                },

                updateShippingCost(cost) {
                    this.$nextTick(() => lucide.createIcons());
                },

                submitOrder() {
                    if (this.cart.length === 0) return;
                    this.isSubmittingOrder = true;

                    const payload = {
                        customer_name: this.checkoutForm.customer_name,
                        customer_email: this.checkoutForm.customer_email,
                        customer_phone: this.checkoutForm.customer_phone,
                        shipping_address: this.checkoutForm.shipping_address,
                        province: this.checkoutForm.province,
                        city: this.checkoutForm.city,
                        district: this.checkoutForm.district || 'Pusat',
                        postal_code: this.checkoutForm.postal_code,
                        shipping_method: this.selectedShippingOption,
                        shipping_cost: this.cartShippingFee,
                        payment_method: this.selectedPaymentMethod,
                        coupon_code: this.appliedCoupon ? this.appliedCoupon.code : null,
                        discount_amount: this.cartDiscountAmount,
                        subtotal: this.cartSubtotal,
                        total: this.cartFinalTotal,
                        notes: this.checkoutForm.notes,
                        items: this.cart,
                    };

                    fetch('/api/checkout', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(payload)
                    })
                    .then(r => r.json())
                    .then(data => {
                        this.isSubmittingOrder = false;
                        if (data.success) {
                            this.completedOrder = data.order;
                            this.cart = [];
                            this.saveCart();
                            this.checkoutStep = 4;
                            this.showToast('Pesanan berhasil dibuat!');
                            this.fetchAdminData();
                        } else {
                            this.showToast(data.message || 'Gagal membuat pesanan.');
                        }
                        this.$nextTick(() => lucide.createIcons());
                    })
                    .catch(() => {
                        this.isSubmittingOrder = false;
                        this.showToast('Terjadi kesalahan saat memproses pesanan.');
                    });
                },

                // Admin Operations
                fetchAdminData() {
                    fetch('/api/admin/stats')
                        .then(r => r.json())
                        .then(d => {
                            if (d.success) this.adminStats = d.stats;
                        });

                    fetch('/api/admin/orders')
                        .then(r => r.json())
                        .then(d => {
                            if (d.success) this.adminOrders = d.orders;
                        });
                },

                updateAdminOrderStatus(orderId, newStatus) {
                    fetch(`/api/admin/orders/${orderId}/status`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ order_status: newStatus })
                    })
                    .then(r => r.json())
                    .then(data => {
                        if (data.success) {
                            this.showToast('Status pesanan berhasil diperbarui.');
                            this.fetchAdminData();
                        }
                    });
                },

                openAddProductModal() {
                    this.isEditingProduct = false;
                    this.adminProductForm = {
                        id: null,
                        name: '',
                        category_id: this.categories.length > 0 ? this.categories[0].id : 1,
                        price: 450000,
                        discount_price: null,
                        stock: 20,
                        short_description: '',
                        image_url: 'https://images.unsplash.com/photo-1598554747436-c9293d6a588f?q=80&w=900&auto=format&fit=crop',
                    };
                    this.adminProductModalOpen = true;
                },

                openEditProductModal(product) {
                    this.isEditingProduct = true;
                    this.adminProductForm = {
                        id: product.id,
                        name: product.name,
                        category_id: product.category_id,
                        price: product.price,
                        discount_price: product.discount_price,
                        stock: product.stock,
                        short_description: product.short_description,
                        image_url: product.images[0],
                    };
                    this.adminProductModalOpen = true;
                },

                saveAdminProduct() {
                    if (this.isEditingProduct) {
                        fetch(`/api/admin/products/${this.adminProductForm.id}`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                name: this.adminProductForm.name,
                                category_id: this.adminProductForm.category_id,
                                price: this.adminProductForm.price,
                                discount_price: this.adminProductForm.discount_price,
                                stock: this.adminProductForm.stock,
                                short_description: this.adminProductForm.short_description,
                            })
                        })
                        .then(r => r.json())
                        .then(data => {
                            if (data.success) {
                                this.showToast('Produk berhasil diperbarui!');
                                this.adminProductModalOpen = false;
                                location.reload();
                            }
                        });
                    } else {
                        fetch('/api/admin/products', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                name: this.adminProductForm.name,
                                category_id: this.adminProductForm.category_id,
                                price: this.adminProductForm.price,
                                discount_price: this.adminProductForm.discount_price,
                                stock: this.adminProductForm.stock,
                                short_description: this.adminProductForm.short_description,
                                images: [this.adminProductForm.image_url],
                                colors: [{'name': 'Camel', 'hex': '#B89B7A'}],
                                sizes: ['S', 'M', 'L'],
                            })
                        })
                        .then(r => r.json())
                        .then(data => {
                            if (data.success) {
                                this.showToast('Produk baru berhasil ditambahkan!');
                                this.adminProductModalOpen = false;
                                location.reload();
                            }
                        });
                    }
                },

                deleteProduct(id) {
                    if (!confirm('Yakin ingin menghapus produk ini dari katalog?')) return;
                    fetch(`/api/admin/products/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(r => r.json())
                    .then(data => {
                        if (data.success) {
                            this.showToast('Produk berhasil dihapus.');
                            this.products = this.products.filter(p => p.id !== id);
                            this.applyCatalogFilters();
                        }
                    });
                },

                handleNewsletterSubscribe() {
                    this.showToast(`Merci! ${this.newsletterEmail} telah terdaftar ke Cercle DAÏRSCO.`);
                    this.newsletterEmail = '';
                },

                // UI Helpers
                formatRupiah(number) {
                    if (number === null || number === undefined) return 'Rp 0';
                    return 'Rp ' + Number(number).toLocaleString('id-ID');
                },

                showToast(message) {
                    const id = Date.now();
                    this.toasts.push({ id, message, visible: true });
                    this.$nextTick(() => lucide.createIcons());
                    setTimeout(() => {
                        const t = this.toasts.find(item => item.id === id);
                        if (t) t.visible = false;
                    }, 3500);
                }
            };
        }
    </script>
</body>
</html>
