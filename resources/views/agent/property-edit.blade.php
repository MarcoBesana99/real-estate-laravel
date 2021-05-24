@extends('layouts.base')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section spad set-bg" data-setbg="{{ asset('img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h4>Edit Property</h4>
                        <div class="bt-option">
                            <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                            <span>Property</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Property Submit Section Begin -->
    <section class="property-submit-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="property-submit-form">
                        <form action="{{ route('agent.properties.update', $property) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="pf-title">
                                <h4>Name</h4>
                                <input type="text" placeholder="Name" name="name" value={{ $property->name }}>
                            </div>
                            <div class="pf-map">
                                <h4>Property Location</h4>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="map-inputs">
                                            <input type="text" name="autocomplete" id="autocomplete"
                                                placeholder="Location/City/Address" value="{{ $property->address }}">
                                            <input type="text" id="latitude" name="latitude" placeholder="Latitude" readonly
                                                value={{ $property->latitude }}>
                                            <input type="text" name="longitude" id="longitude" placeholder="Longitude"
                                                readonly value={{ $property->longitude }}>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div id="map"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="pf-type">
                                <h4>Property type</h4>
                                <div class="type-item">
                                    <label for="pt-apart">Apartment
                                        <input type="radio" id="pt-apart" value="Apartment" name="type"
                                            {{ $property->type == 'Apartment' ? 'checked' : '' }}>
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="pt-house">House
                                        <input type="radio" id="pt-house" value="House" name="type"
                                            {{ $property->type == 'House' ? 'checked' : '' }}>
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="pt-off">Office
                                        <input type="radio" id="pt-off" value="Office" name="type"
                                            {{ $property->type == 'Office' ? 'checked' : '' }}>
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="pt-villa">Villa
                                        <input type="radio" id="pt-villa" value="Villa" name="type"
                                            {{ $property->type == 'Villa' ? 'checked' : '' }}>
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="pt-store">Store
                                        <input type="radio" id="pt-store" value="Store" name="type"
                                            {{ $property->type == 'Store' ? 'checked' : '' }}>
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="pt-rest">Restaurant
                                        <input type="radio" id="pt-rest" value="Restaurant" name="type"
                                            {{ $property->type == 'Restaurant' ? 'checked' : '' }}>
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="pf-status">
                                <h4>Property status</h4>
                                <div class="status-item">
                                    <label for="ps-rent">For rent
                                        <input type="radio" id="ps-rent" value="For rent" name="status"
                                            {{ $property->status == 'For rent' ? 'checked' : '' }}>
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="ps-sale">For sale
                                        <input type="radio" id="ps-sale" value="For sale" name="status"
                                            {{ $property->status == 'For sale' ? 'checked' : '' }}>
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="pf-feature-price">
                                <h4>Featured Price</h4>
                                <div class="fp-inputs">
                                    <input type="text" placeholder="Price" name="price" value={{ $property->price }}>
                                </div>
                            </div>
                            <div class="pf-feature">
                                <h4>Property Features</h4>
                                <div class="features-list">
                                    <div class="feature-item">
                                        <label for="air">Air conditioning
                                            <input type="checkbox" id="air" value="1" name="air_condition"
                                                {{ $property->air_condition == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                        <label for="lundry">Laundry
                                            <input type="checkbox" id="lundry" value="1" name="laundry"
                                                {{ $property->laundry == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                        <label for="refrigerator">Refrigerator
                                            <input type="checkbox" id="refrigerator" value="1" name="refrigerator"
                                                {{ $property->refrigerator == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                        <label for="washer">Washer
                                            <input type="checkbox" id="washer" value="1" name="washer"
                                                {{ $property->washer == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                    </div>
                                    <div class="feature-item">
                                        <label for="barbeque">Barbeque
                                            <input type="checkbox" id="barbeque" value="1" name="barbeque"
                                                {{ $property->barbeque == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                        <label for="lawn">Lawn
                                            <input type="checkbox" id="lawn" value="1" name="lawn"
                                                {{ $property->lawn == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                        <label for="sauna">Sauna
                                            <input type="checkbox" id="sauna" value="1" name="sauna"
                                                {{ $property->sauna == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                        <label for="wifi">Wifi
                                            <input type="checkbox" id="wifi" value="1" name="wifi"
                                                {{ $property->wifi == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                    </div>
                                    <div class="feature-item">
                                        <label for="dryer">Dryer
                                            <input type="checkbox" id="dryer" value="1" name="dryer"
                                                {{ $property->dryer == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                        <label for="microwave">Microwave
                                            <input type="checkbox" id="microwave" value="1" name="microwave"
                                                {{ $property->microwave == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                        <label for="pool">Swimming Pool
                                            <input type="checkbox" id="pool" value="1" name="swimming_pool"
                                                {{ $property->swimming_pool == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                        <label for="window">Window Coverings
                                            <input type="checkbox" id="window" value="1" name="window_coverings"
                                                {{ $property->window_coverings == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                    </div>
                                    <div class="feature-item">
                                        <label for="gym">Gym
                                            <input type="checkbox" id="gym" value="1" name="gym"
                                                {{ $property->gym == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                        <label for="shower">OutdoorShower
                                            <input type="checkbox" id="shower" value="1" name="outdoor_shower"
                                                {{ $property->outdoor_shower == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                        <label for="tv">Tv Cable
                                            <input type="checkbox" id="tv" value="1" name="tv_cable"
                                                {{ $property->tv_cable == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                        <label for="villa">Villa
                                            <input type="checkbox" id="villa" value="1" name="villa"
                                                {{ $property->villa == '1' ? 'checked' : '' }}>
                                            <span class="checkbox"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="pf-feature-image">
                                <h4>Images</h4>
                                <h6 class="alert alert-info mb-3">These is a preview of the images of this property. If you want to modify them, you need to delete them and upload again all images that you would like.</h6>
                                <div class="feature-image-content"></div>
                            </div>
                            <div class="pf-property-details">
                                <h4>Property details</h4>
                                <div class="property-details-inputs">
                                    <input type="text" placeholder="Area Size" name="area" value={{ $property->area }}>
                                    <input type="text" placeholder="Rooms" name="rooms" value={{ $property->rooms }}>
                                    <input type="text" placeholder="Bedrooms" name="bedrooms"
                                        value={{ $property->bedrooms }}>
                                    <input type="text" placeholder="Bathrooms" name="bathrooms"
                                        value={{ $property->bathrooms }}>
                                    <input type="text" placeholder="Garages" name="garages"
                                        value={{ $property->garages }}>
                                    <input type="text" placeholder="Parkings" name="parkings"
                                        value={{ $property->parkings }}>
                                    <input type="text" placeholder="Year Built" name="year" value={{ $property->year }}>
                                </div>
                                <button type="submit" class="site-btn">Edit Property</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Property Submit Section End -->

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
@section('scripts')
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAPS_API') }}&libraries=places&v=weekly"></script>
    <script>
        google.maps.event.addDomListener(window, 'load', initMap);
        google.maps.event.addDomListener(window, 'load', initialize);
        // Initialize lat and lng
        let lat = -34.397;
        let lng = 150.644;
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            let position = {
                lat: lat,
                lng: lng
            };
            // The map, centered at Uluru
            let map = new google.maps.Map(
                document.getElementById('map'), {
                    zoom: 8,
                    center: position
                }
            );
            // The marker, positioned at Uluru
            let marker = new google.maps.Marker({
                position: position,
                map: map
            });
        }
        // Autocomplete input address
        function initialize() {
            let input = document.getElementById('autocomplete');
            let autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function() {
                let place = autocomplete.getPlace();
                lat = place.geometry['location'].lat();
                lng = place.geometry['location'].lng();
                $('#latitude').val(lat);
                $('#longitude').val(lng);

                // Reload map on address change
                initMap();
            });
        }        
        //Drag Upload
        //Get old images
        let images = {!! json_encode(json_decode($property->images)) !!}
        let imagesObject = []
        images.forEach(function(element, index) {
            imagesObject[index] = {id: index, src: '/img/' + element}       
        });
        console.log(imagesObject)
        $('.feature-image-content').imageUploader({
            //preview old images
            preloaded: imagesObject
        });
    </script>
@endsection
