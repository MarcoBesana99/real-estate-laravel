@extends('layouts.base')
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="hs-slider owl-carousel">
                @foreach ($properties->take(3) as $property)
                    <div class="hs-item set-bg" data-setbg="{{ asset('img/' . json_decode($property->images)[0]) }}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hc-inner-text">
                                    <div class="hc-text">
                                        <a href="{{ route('show.property', $property->id) }}">
                                            <h4>{{ $property->name }}</h4>
                                        </a>
                                        <p><span class="icon_pin_alt"></span> {{ $property->address }}</p>
                                        <div class="label {{ $property->status === 'For sale' ? 'c-red' : '' }}">
                                            {{ $property->status }}</div>
                                        <h5>$
                                            {{ $property->price }}<span>{{ $property->status === 'For rent' ? '/month' : '' }}</span>
                                        </h5>
                                    </div>
                                    <div class="hc-widget">
                                        <ul>
                                            <li><i class="fa fa-object-group"></i> {{ $property->area }}</li>
                                            <li><i class="fa fa-bathtub"></i> {{ $property->bathrooms }}</li>
                                            <li><i class="fa fa-bed"></i> {{ $property->bedrooms }}</li>
                                            <li><i class="fa fa-automobile"></i> {{ $property->parkings }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Search Section Begin -->
    <section class="search-section spad">
        <div class="container">

            <div class="search-form-content">
                <form action="{{ route('filter') }}" class="filter-form" method="GET">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="section-title">
                                <h4>Where would you rather live?</h4>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="change-btn">
                                <div class="cb-item">
                                    <label for="cb-rent" class="active">
                                        For Rent
                                        <input name="status" value="For rent" type="radio" id="cb-rent" checked>
                                    </label>
                                </div>
                                <div class="cb-item">
                                    <label for="cb-sale">
                                        For Sale
                                        <input name="status" value="For sale" type="radio" id="cb-sale">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <select name="address" class="sm-width">
                        <option value="">Chose The City</option>
                        @foreach ($uniqueCities as $city)
                            <option value="{{ $city }}">{{ $city }}</option>
                        @endforeach
                    </select>
                    <select name="type" class="sm-width">
                        <option value="">Property Type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    <select name="bedrooms" class="sm-width">
                        <option value="">No Of Bedrooms</option>
                        @foreach ($numberOfBedrooms as $numberOfBedroom)
                            <option value="{{ $numberOfBedroom }}">{{ $numberOfBedroom }}</option>
                        @endforeach
                    </select>
                    {{-- <select name="bathrooms" class="sm-width">
                        <option value="">No Of Bathrooms</option>
                    </select> --}}
                    <div class="price-range-wrap sm-width">
                        <div class="price-text">
                            <label for="priceRange">Price:</label>
                            <input type="text" id="priceRange" name="priceRange" readonly>
                        </div>
                        <div id="price-range" class="slider"></div>
                    </div>
                    <button type="submit" class="search-btn sm-width mt-5 btn-block">Search</button>
                </form>
            </div>
        </div>
    </section>
    <!-- Search Section End -->

    <!-- Property Section Begin -->
    <section class="property-section latest-property-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title">
                        <h4>Latest PROPERTY</h4>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="property-controls">
                        <ul>
                            <li data-filter="all">All</li>
                            <li data-filter=".apartment">Apartment</li>
                            <li data-filter=".house">House</li>
                            <li data-filter=".villa">Villa</li>
                            <li data-filter=".office">Office</li>
                            <li data-filter=".hotel">Hotel</li>
                            <li data-filter=".restaurant">Restaurant</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row property-filter">

                @foreach ($properties as $property)
                    <div class="col-lg-4 col-md-6 mix all {{ strtolower($property->type) }}">
                        <div class="property-item">
                            <div class="pi-pic set-bg"
                                data-setbg="{{ asset('img/' . json_decode($property->images)[0]) }}">
                                <div class="label {{ $property->status === 'For sale' ? 'c-red' : '' }}">
                                    {{ $property->status }}</div>
                            </div>
                            <div class="pi-text">
                                <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                                <div class="pt-price">$ {{ $property->price }}
                                    <span>{{ $property->status === 'For rent' ? '/month' : '' }}</span>
                                </div>
                                <h5><a href="{{ route('show.property', $property->id) }}">{{ $property->name }}</a>
                                </h5>
                                <p><span class="icon_pin_alt"></span> {{ $property->address }} </p>
                                <ul>
                                    <li><i class="fa fa-object-group"></i> {{ $property->area }} </li>
                                    <li><i class="fa fa-bathtub"></i> {{ $property->bathrooms }}</li>
                                    <li><i class="fa fa-bed"></i> {{ $property->bedrooms }}</li>
                                    <li><i class="fa fa-automobile"></i> {{ $property->parkings }}</li>
                                </ul>
                                <div class="pi-agent">
                                    <div class="pa-item">
                                        <div class="pa-info">
                                            <img src="{{ $property->user->profile_photo_url }}" class="rounded-circle"
                                                style="height:40px; width:40px">
                                            <h6>{{ $property->user->name }}</h6>
                                        </div>
                                        <div class="pa-text">
                                            {{ $property->user->phone_number }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Property Section End -->

    <!-- Chooseus Section Begin -->
    <section class="chooseus-section spad set-bg" data-setbg="img/chooseus/chooseus-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="chooseus-text">
                        <div class="section-title">
                            <h4>Why choose us</h4>
                        </div>
                        <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                    <div class="chooseus-features">
                        <div class="cf-item">
                            <div class="cf-pic">
                                <img src="img/chooseus/chooseus-icon-1.png" alt="">
                            </div>
                            <div class="cf-text">
                                <h5>Find your future home</h5>
                                <p>We help you find a new home by offering a smart real estate.</p>
                            </div>
                        </div>
                        <div class="cf-item">
                            <div class="cf-pic">
                                <img src="img/chooseus/chooseus-icon-2.png" alt="">
                            </div>
                            <div class="cf-text">
                                <h5>Buy or rent homes</h5>
                                <p>Millions of houses and apartments in your favourite cities</p>
                            </div>
                        </div>
                        <div class="cf-item">
                            <div class="cf-pic">
                                <img src="img/chooseus/chooseus-icon-3.png" alt="">
                            </div>
                            <div class="cf-text">
                                <h5>Experienced agents</h5>
                                <p>Find an agent who knows your market best</p>
                            </div>
                        </div>
                        <div class="cf-item">
                            <div class="cf-pic">
                                <img src="img/chooseus/chooseus-icon-4.png" alt="">
                            </div>
                            <div class="cf-text">
                                <h5>List your own property</h5>
                                <p>Sign up now and sell or rent your own properties</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Chooseus Section End -->

    <!-- Feature Property Section Begin -->
    <section class="feature-property-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-0">
                    <div class="feature-property-left">
                        <div class="section-title">
                            <h4>Feature PROPERTY</h4>
                        </div>
                        <ul>
                            <li>Apartment</li>
                            <li>House</li>
                            <li>Office</li>
                            <li>Hotel</li>
                            <li>Villa</li>
                            <li>Restaurent</li>
                        </ul>
                        <a href="#">View all property</a>
                    </div>
                </div>
                <div class="col-lg-8 p-0">
                    <div class="fp-slider owl-carousel">
                        <div class="fp-item set-bg" data-setbg="img/feature-property/fp-1.jpg">
                            <div class="fp-text">
                                <h5 class="title">Home in Merrick Way</h5>
                                <p><span class="icon_pin_alt"></span> 3 Middle Winchendon Rd, Rindge, NH 03461</p>
                                <div class="label">For Rent</div>
                                <h5>$ 289.0<span>/month</span></h5>
                                <ul>
                                    <li><i class="fa fa-object-group"></i> 2, 283</li>
                                    <li><i class="fa fa-bathtub"></i> 03</li>
                                    <li><i class="fa fa-bed"></i> 05</li>
                                    <li><i class="fa fa-automobile"></i> 01</li>
                                </ul>
                            </div>
                        </div>
                        <div class="fp-item set-bg" data-setbg="img/feature-property/fp-2.jpg">
                            <div class="fp-text">
                                <h5 class="title">Home in Merrick Way</h5>
                                <p><span class="icon_pin_alt"></span> 3 Middle Winchendon Rd, Rindge, NH 03461</p>
                                <div class="label">For Rent</div>
                                <h5>$ 289.0<span>/month</span></h5>
                                <ul>
                                    <li><i class="fa fa-object-group"></i> 2, 283</li>
                                    <li><i class="fa fa-bathtub"></i> 03</li>
                                    <li><i class="fa fa-bed"></i> 05</li>
                                    <li><i class="fa fa-automobile"></i> 01</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Property Section End -->

    <!-- Team Section Begin -->
    <section class="team-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="section-title">
                        <h4>Latest Property</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="team-btn">
                        <a href="#"><i class="fa fa-user"></i> ALL counselor</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="ts-item">
                        <div class="ts-text">
                            <img src="img/team/team-1.jpg" alt="">
                            <h5>Ashton Kutcher</h5>
                            <span>123-455-688</span>
                            <p>Ipsum dolor amet, consectetur adipiscing elit, eiusmod tempor incididunt lorem.</p>
                            <div class="ts-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-envelope-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ts-item">
                        <div class="ts-text">
                            <img src="img/team/team-2.jpg" alt="">
                            <h5>Ashton Kutcher</h5>
                            <span>123-455-688</span>
                            <p>Ipsum dolor amet, consectetur adipiscing elit, eiusmod tempor incididunt lorem.</p>
                            <div class="ts-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-envelope-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ts-item">
                        <div class="ts-text">
                            <img src="img/team/team-3.jpg" alt="">
                            <h5>Ashton Kutcher</h5>
                            <span>123-455-688</span>
                            <p>Ipsum dolor amet, consectetur adipiscing elit, eiusmod tempor incididunt lorem.</p>
                            <div class="ts-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-envelope-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Categories Section Begin -->
    <section class="categories-section">
        <div class="cs-item-list">
            <div class="cs-item set-bg" data-setbg="img/categories/cat-1.jpg">
                <div class="cs-text">
                    <h5>Apartment</h5>
                    <span>{{ $properties->where('type', 'Apartment')->count() }} property</span>
                </div>
            </div>
            <div class="cs-item set-bg" data-setbg="img/categories/cat-2.jpg">
                <div class="cs-text">
                    <h5>Villa</h5>
                    <span>{{ $properties->where('type', 'Villa')->count() }} property</span>
                </div>
            </div>
            <div class="cs-item set-bg" data-setbg="img/categories/cat-3.jpg">
                <div class="cs-text">
                    <h5>House</h5>
                    <span>{{ $properties->where('type', 'House')->count() }} property</span>
                </div>
            </div>
            <div class="cs-item set-bg" data-setbg="img/categories/cat-4.jpg">
                <div class="cs-text">
                    <h5>Restaurant</h5>
                    <span>{{ $properties->where('type', 'Restaurant')->count() }} property</span>
                </div>
            </div>
            <div class="cs-item set-bg" data-setbg="img/categories/cat-5.jpg">
                <div class="cs-text">
                    <h5>Office</h5>
                    <span>{{ $properties->where('type', 'Office')->count() }} property</span>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h4>What our client says?</h4>
                    </div>
                </div>
            </div>
            <div class="row testimonial-slider owl-carousel">
                <div class="col-lg-6">
                    <div class="testimonial-item">
                        <div class="ti-text">
                            <p>Lorem ipsum dolor amet, consectetur adipiscing elit, seiusmod tempor incididunt ut labore
                                magna aliqua. Quis ipsum suspendisse ultrices gravida accumsan lacus vel facilisis.</p>
                        </div>
                        <div class="ti-author">
                            <div class="ta-pic">
                                <img src="img/testimonial-author/ta-1.jpg" alt="">
                            </div>
                            <div class="ta-text">
                                <h5>Arise Naieh</h5>
                                <span>Designer</span>
                                <div class="ta-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonial-item">
                        <div class="ti-text">
                            <p>Lorem ipsum dolor amet, consectetur adipiscing elit, seiusmod tempor incididunt ut labore
                                magna aliqua. Quis ipsum suspendisse ultrices gravida accumsan lacus vel facilisis.</p>
                        </div>
                        <div class="ti-author">
                            <div class="ta-pic">
                                <img src="img/testimonial-author/ta-2.jpg" alt="">
                            </div>
                            <div class="ta-text">
                                <h5>Arise Naieh</h5>
                                <span>Designer</span>
                                <div class="ta-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonial-item">
                        <div class="ti-text">
                            <p>Lorem ipsum dolor amet, consectetur adipiscing elit, seiusmod tempor incididunt ut labore
                                magna aliqua. Quis ipsum suspendisse ultrices gravida accumsan lacus vel facilisis.</p>
                        </div>
                        <div class="ti-author">
                            <div class="ta-pic">
                                <img src="img/testimonial-author/ta-1.jpg" alt="">
                            </div>
                            <div class="ta-text">
                                <h5>Arise Naieh</h5>
                                <span>Designer</span>
                                <div class="ta-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Logo Carousel Begin -->
    <div class="logo-carousel">
        <div class="container">
            <div class="lc-slider owl-carousel">
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="img/logo-carousel/lc-1.png" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="img/logo-carousel/lc-2.png" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="img/logo-carousel/lc-3.png" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="img/logo-carousel/lc-4.png" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="img/logo-carousel/lc-5.png" alt="">
                    </div>
                </a>
                <a href="#" class="lc-item">
                    <div class="lc-item-inner">
                        <img src="img/logo-carousel/lc-6.png" alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Logo Carousel End -->

    <!-- Contact Section Begin -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info">
                        <div class="ci-item">
                            <div class="ci-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="ci-text">
                                <h5>Address</h5>
                                <p>160 Pennsylvania Ave NW, Washington, Castle, PA 16101-5161</p>
                            </div>
                        </div>
                        <div class="ci-item">
                            <div class="ci-icon">
                                <i class="fa fa-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <h5>Phone</h5>
                                <ul>
                                    <li>125-711-811</li>
                                    <li>125-668-886</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ci-item">
                            <div class="ci-icon">
                                <i class="fa fa-headphones"></i>
                            </div>
                            <div class="ci-text">
                                <h5>Support</h5>
                                <p>Support.aler@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cs-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d735515.5813275519!2d-80.41163541934742!3d43.93644386501528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882a55bbf3de23d7%3A0x3ada5af229b47375!2sMono%2C%20ON%2C%20Canada!5e0!3m2!1sen!2sbd!4v1583262687289!5m2!1sen!2sbd"
                height="450" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
