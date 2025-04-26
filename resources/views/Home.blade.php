

<body style="background-color: #2c1e1e; color: #f5f5f5;">

@extends('layouts.scentora')

@section('title', 'Scentora - Luxury Perfumes')

@section('main-content')
    <!-- Hero Section -->
    <section class="hero-section py-5 text-center">
        <div class="container">
            <h1 class="display-3 fw-bold mb-3" data-aos="fade-up">Discover the Essence of Elegance</h1>
            <p class="lead mb-4" data-aos="fade-up" data-aos-delay="200">Signature scents curated just for you</p>
            <a href="{{ route('products_list') }}" class="btn btn-gold px-4 py-2" data-aos="fade-up" data-aos-delay="400">Shop Now</a>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section id="featured-products-list" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5" data-aos="fade-up">Our Signature Scents</h2>
        
        <div class="row justify-content-center">
            @if(isset($products) && count($products) > 0)
                @foreach($products as $product)
                    <div class="col-md-4 mb-5 d-flex justify-content-center" data-aos="fade-up">
                        <div class="card product-card text-center" style="background: #2c1e1e; color: #fff; border-radius: 15px; overflow: hidden; position: relative; transition: all 0.3s;">
                            <img src="{{ asset('images/' . $product->photo) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 300px; object-fit: cover;">
                            <div class="card-body p-4">
                                <h5 class="card-title" style="font-size: 1.5rem; font-weight: 700; letter-spacing: 1px;">LUXURY <span style="font-family: 'Pacifico', cursive; font-size: 1.2rem;">Perfume</span></h5>
                                <p class="card-text my-3" style="font-size: 0.95rem;">{{ Str::limit($product->description, 100) }}</p>
                                <p class="h5 my-2" style="color: #d4af37;">${{ number_format($product->price, 2) }}</p>
                                <a href="{{ route('products_list') }}" class="btn btn-outline-light mt-3 px-4 py-2" style="border: 1px solid #d4af37; color: #d4af37;">Order Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info text-center" data-aos="fade-up">
                    No featured products available at the moment.
                </div>
            @endif
        </div>
    </div>
</section>


    <!-- Footer Text -->
    <!-- <section class="footer-text py-5 bg-light">
        <div class="container text-center">
            <p class="lead fst-italic" data-aos="fade-up">Crafted with passion. Inspired by nature. Worn with pride.</p>
        </div>
    </section> -->

    <style>
        .product-img {
            max-height: 300px;
            object-fit: cover;
            width: 100%;
            transition: transform 0.3s ease;
        }
        
        .featured-product-large .product-img {
            max-height: 400px;
        }
        
        .featured-product-small .product-img {
            max-height: 250px;
        }
        
        .featured-product-large, .featured-product-small {
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .featured-product-large:hover, .featured-product-small:hover {
            transform: translateY(-5px);
        }
        
        .featured-product-large:hover .product-img, .featured-product-small:hover .product-img {
            transform: scale(1.05);
        }
        
        .product-caption {
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
            width: 100%;
        }
        
        .hero-section {
            background: linear-gradient(rgba(255,255,255,0.9), #2c1e1e), url('https://images.unsplash.com/photo-1587017539504-67cfbddac569?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
        }
    </style>

    <script>
        $(document).ready(function() {
            // Add hover effect to product items
            $('.featured-product-large, .featured-product-small').hover(
                function() {
                    $(this).find('.product-img').css('transform', 'scale(1.05)');
                },
                function() {
                    $(this).find('.product-img').css('transform', 'scale(1)');
                }
            );
        });
    </script>
@endsection 
</body>