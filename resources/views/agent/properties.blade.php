<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    <!-- Property Section Begin -->
    <section class="property-section latest-property-section spad">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title">
                        <h4>My Properties</h4>
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
                                <form action="{{ route('agent.properties.destroy', $property) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete the property?')">Delete</button>
                                </form>
                                <a href="{{ route('agent.properties.edit', $property) }}" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Property Section End -->
</x-app-layout>
