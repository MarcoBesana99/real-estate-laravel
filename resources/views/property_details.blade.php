@extends('layouts.base')
@section('content')
    <!-- Property Details Section Begin -->
    <section class="property-details-section">
        <div class="property-pic-slider owl-carousel">
            <div class="ps-item">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12 p-0">
                                    <div class="ps-item-inner large-item set-bg"
                                        data-setbg="{{ asset('img/' . json_decode($property->images)[0]) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                @if (count(json_decode($property->images)) > 1)
                                    @foreach (json_decode($property->images) as $index => $image)
                                        @if ($index == 0 || $index > 4)
                                            @continue
                                        @endif
                                        <div class="col-sm-6 p-0">
                                            <div class="ps-item-inner set-bg" data-setbg="{{ asset('img/' . $image) }}">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="pd-text">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="pd-title">
                                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                                    <div class="label">{{ $property->status }}</div>
                                    <div class="pt-price">$
                                        {{ $property->price }}<span>{{ $property->status === 'For rent' ? '/month' : '' }}</span>
                                    </div>
                                    <h3>{{ $property->name }}</h3>
                                    <p><span class="icon_pin_alt"></span> {{ $property->address }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="pd-social">
                                    <a href="#"><i class="fa fa-mail-forward"></i></a>
                                    <a href="#"><i class="fa fa-send"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-mail-forward"></i></a>
                                    <a href="#"><i class="fa fa-cloud-download"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="pd-board">
                            <div class="tab-board">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Overview</a>
                                    </li>
                                </ul><!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <div class="tab-details">
                                            <ul class="left-table">
                                                <li>
                                                    <span class="type-name">Property Type</span>
                                                    <span class="type-value">{{ $property->type }}</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Property ID</span>
                                                    <span class="type-value">#{{ $property->id }}</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Price</span>
                                                    <span class="type-value">$
                                                        {{ $property->price }}
                                                        {{ $property->status === 'For rent' ? '/month' : '' }}</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Year Built</span>
                                                    <span class="type-value">{{ $property->year }}</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Contract type</span>
                                                    <span class="type-value">{{ $property->contract }}</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Agent</span>
                                                    <span class="type-value">{{ $property->user->name }}</span>
                                                </li>
                                            </ul>
                                            <ul class="right-table">
                                                <li>
                                                    <span class="type-name">Home Area</span>
                                                    <span class="type-value">{{ $property->area }}</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Rooms</span>
                                                    <span class="type-value">{{ $property->rooms }}</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Bedrooms</span>
                                                    <span class="type-value">{{ $property->bedrooms }}</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Bathrooms</span>
                                                    <span class="type-value">{{ $property->bathrooms }}</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Garages</span>
                                                    <span class="type-value">{{ $property->garages }}</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Parking lots</span>
                                                    <span class="type-value">{{ $property->parkings }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pd-widget">
                            <h4>Location</h4>
                            <div id="propertyMap"></div>
                            <div class="map-location">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="ml-item">
                                            <div class="ml-single-item">
                                                <h6>Hospital</h6>
                                                <p class="nearest"></p>
                                            </div>
                                            <div class="ml-single-item">
                                                <h6>School</h6>
                                                <p class="nearest"></p>
                                            </div>
                                            <div class="ml-single-item">
                                                <h6>Store</h6>
                                                <p class="nearest"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="ml-item">
                                            <div class="ml-single-item">
                                                <h6>Laundry</h6>
                                                <p class="nearest"></p>
                                            </div>
                                            <div class="ml-single-item">
                                                <h6>Pharmacy</h6>
                                                <p class="nearest"></p>
                                            </div>
                                            <div class="ml-single-item">
                                                <h6>Gym</h6>
                                                <p class="nearest"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pd-widget">
                            <h4>Agent</h4>
                            <div class="pd-agent">
                                <div class="agent-pic">
                                    <img src="{{ $property->user->profile_photo_url }}" class="rounded-circle"
                                        style="height:80px; width:80px">
                                </div>
                                <div class="agent-text">
                                    <div class="at-title">
                                        <h6>{{ $property->user->name }}</h6>
                                        <span>Founder & CEO</span>
                                        <a href="#" class="primary-btn">VIew profile</a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, eiusmod tempor incididunt
                                    </p>
                                    <div class="at-option">
                                        <div class="at-number">{{ $property->user->phone_number }}</div>
                                        <div class="at-social">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-envelope-o"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <livewire:rating-handler :propertyId="$propertyId" />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="property-sidebar">
                        <div class="single-sidebar slider-op">
                            <div class="section-title sidebar-title">
                                <h5>Featural categories</h5>
                            </div>
                            <div class="sf-slider owl-carousel">
                                <div class="sf-item set-bg" data-setbg="img/categories/cat-1.jpg">
                                    <div class="sf-text">
                                        <h5>House</h5>
                                        <span>38 property</span>
                                    </div>
                                </div>
                                <div class="sf-item set-bg" data-setbg="img/categories/cat-2.jpg">
                                    <div class="sf-text">
                                        <h5>Apartment</h5>
                                        <span>238 property</span>
                                    </div>
                                </div>
                                <div class="sf-item set-bg" data-setbg="img/categories/cat-3.jpg">
                                    <div class="sf-text">
                                        <h5>Villa</h5>
                                        <span>230 property</span>
                                    </div>
                                </div>
                                <div class="sf-item set-bg" data-setbg="img/categories/cat-4.jpg">
                                    <div class="sf-text">
                                        <h5>Restaurent</h5>
                                        <span>38 property</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($property->status == 'For sale')
                            <div class="single-sidebar" style="height: 100%">
                                <div class="section-title sidebar-title">
                                    <h5>mortgage calculator</h5>
                                </div>
                                <iframe id="mortgageCalculator"
                                    src="https://www.mortgagecalculator.org/webmasters/?downpayment=50000&homevalue={{ $property->price }}&loanamount=250000&interestrate=3&loanterm=30&propertytax=2400&pmi=1&homeinsurance=1000&monthlyhoa=0"></iframe>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Property Details Section End -->

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
@endsection
@section('scripts')
    <!-- Contact Section End -->
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAPS_API') }}&libraries=places&v=weekly"></script>
    <script>
        google.maps.event.addDomListener(window, 'load', initMap);

        let position = {
            lat: {!! json_encode($property->latitude) !!},
            lng: {!! json_encode($property->longitude) !!}
        };

        let map = new google.maps.Map(
            document.getElementById('propertyMap'), {
                zoom: 8,
                center: position
            }
        );

        // Initialize and add the map
        function initMap() {
            // The marker
            let marker = new google.maps.Marker({
                position: position,
                map: map
            });
        }

        let nearPlaces = []
        let keywords = ['hospital', 'school', 'store', 'laundry', 'pharmacy', 'gym']

        function getNearByPlaces(keyword) {
            request = {
                location: position,
                radius: '500',
                query: keyword,
                rankby: 'distance'
            };

            service = new google.maps.places.PlacesService(map);
            service.textSearch(request, callback);
        }

        function callback(results, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                nearPlaces.push([results[0].name, results[0].formatted_address])
                nearPlaces.push()
            }
        }

        keywords.forEach(keyword => {
            getNearByPlaces(keyword)
        });

        $(window).on('load', function() {
            // Run code
            let nearests = document.querySelectorAll('.nearest')
            for (let i = 0; i < nearests.length; i++) {
                nearests[i].innerHTML = nearPlaces[i][0] + ' <br> ' + nearPlaces[i][1]
            }
        });
    </script>
@endsection
