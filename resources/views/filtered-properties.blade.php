@extends('layouts.base')
@section('content')
    <!-- Property Section Begin -->
    <section class="property-section latest-property-section spad">
        <div class="container">
            <div class="row">
                @if (count($properties) == 0)
                    <div class="alert alert-danger">No properties match your filters.</div>
                @endif
                <div class="col-lg-5">
                    <div class="section-title">
                        <h4>Filtered Properties</h4>
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
                                    <span>{{ $property->status === 'For rent' ? '/month' : '' }}</span></div>
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
@endsection

{{-- @section('scripts')
<script>
  //Change distance filter
  document.getElementById('distance').addEventListener('change', e => {
      let newDistance = e.target.value
      let url = new URL(window.location.href)
      url.searchParams.set('distance', newDistance)
      window.location.href = url
  })
</script>
@endsection --}}
