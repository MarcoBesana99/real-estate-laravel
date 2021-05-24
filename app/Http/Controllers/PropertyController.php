<?php

namespace App\Http\Controllers;


use App\Models\Property;
use Illuminate\Http\Request;
use \App\Http\Requests\EditPropertyRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get properties of the agent
        $properties = auth()->user()->properties->sortByDesc('created_at');
        return view('agent.properties', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent.submit_property');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'autocomplete'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'type'=>'required',
            'status'=>'required',
            'price'=>'required|integer',
            'area'=>'required|integer',
            'rooms'=>'required|integer',
            'bedrooms'=>'required|integer',
            'bathrooms'=>'required|integer',
            'garages'=>'required|integer',
            'parkings'=>'required|integer',
            'year'=>'required|integer',
            'images'=>'required'
         ]);

        $property = new Property;
        $property->name = $request->name;
        $property->address = $request->autocomplete;
        $property->latitude = $request->latitude;
        $property->longitude = $request->longitude;
        $property->type = $request->type;
        $property->status = $request->status;
        $property->contract = $request->status;
        $property->user_id = auth()->user()->id;
        $property->price = $request->price;
        $request->has('air_condition') ? $property->air_condition = $request->air_condition : $property->air_condition = 0;
        $request->has('laundry') ? $property->laundry = $request->laundry : $property->laundry = 0;
        $request->has('refrigerator') ? $property->refrigerator = $request->refrigerator : $property->refrigerator = 0;
        $request->has('washer') ? $property->washer = $request->washer : $property->washer = 0;
        $request->has('barbeque') ? $property->barbeque = $request->barbeque : $property->barbeque = 0;
        $request->has('lawn') ? $property->lawn = $request->lawn : $property->lawn = 0;
        $request->has('sauna') ? $property->sauna = $request->sauna : $property->sauna = 0;
        $request->has('wifi') ? $property->wifi = $request->wifi : $property->wifi = 0;
        $request->has('dryer') ? $property->dryer = $request->dryer : $property->dryer = 0;
        $request->has('microwave') ? $property->microwave = $request->microwave : $property->microwave = 0;
        $request->has('swimming_pool') ? $property->swimming_pool = $request->swimming_pool : $property->swimming_pool = 0;
        $request->has('window_coverings') ? $property->window_coverings = $request->window_coverings : $property->window_coverings = 0;
        $request->has('gym') ? $property->gym = $request->gym : $property->gym = 0;
        $request->has('outdoor_shower') ? $property->outdoor_shower = $request->outdoor_shower : $property->outdoor_shower = 0;
        $request->has('tv_cable') ? $property->tv_cable = $request->tv_cable : $property->tv_cable = 0;
        $request->has('villa') ? $property->villa = $request->villa : $property->villa = 0;
        $property->area = $request->area;
        $property->rooms = $request->rooms;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->garages = $request->garages;
        $property->parkings = $request->parkings;
        $property->year = $request->year;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/img/', $name);
                $data[] = $name;
            }
        }

        $property->images = json_encode($data);
        $property->save();

        return redirect()->back()->with('message', 'You added succesfully the property');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        $propertyId = $property->id;
        return view('property_details', compact('property','propertyId'));
    }

    public function filter(Request $request)
    {
        //get price range
        $prices = explode('-',str_replace(['[',']','$',' '], '', $request->priceRange));
        $minPrice = $prices[0];
        $maxPrice = $prices[1];

        $properties = Property::when($request->filled('address'), function ($query) use ($request) {
            return $query->where('address', 'LIKE', '%'.$request->address.'%');
        })->when($request->filled('status'), function ($query) use ($request) {
            return $query->where('status', $request->status);
        })->when($request->filled('type'), function ($query) use ($request) {
            return $query->where('type', $request->type);
        })->when($request->filled('bedrooms'), function ($query) use ($request) {
            return $query->where('bedrooms', $request->bedrooms);
        })->when($request->filled('priceRange'), function ($query) use ($minPrice, $maxPrice) {
            return $query->whereBetween('price', [$minPrice, $maxPrice]);
        })->get();

        return view('filtered-properties', compact('properties'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('agent.property-edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EditPropertyRequest  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(EditPropertyRequest $request, Property $property)
    {
        $validated = $request->validated();

        $property = $property;
        $property->name = $request->name;
        $property->address = $request->autocomplete;
        $property->latitude = $request->latitude;
        $property->longitude = $request->longitude;
        $property->type = $request->type;
        $property->status = $request->status;
        $property->contract = $request->status;
        $property->user_id = auth()->user()->id;
        $property->price = $request->price;
        $request->has('air_condition') ? $property->air_condition = $request->air_condition : $property->air_condition = 0;
        $request->has('laundry') ? $property->laundry = $request->laundry : $property->laundry = 0;
        $request->has('refrigerator') ? $property->refrigerator = $request->refrigerator : $property->refrigerator = 0;
        $request->has('washer') ? $property->washer = $request->washer : $property->washer = 0;
        $request->has('barbeque') ? $property->barbeque = $request->barbeque : $property->barbeque = 0;
        $request->has('lawn') ? $property->lawn = $request->lawn : $property->lawn = 0;
        $request->has('sauna') ? $property->sauna = $request->sauna : $property->sauna = 0;
        $request->has('wifi') ? $property->wifi = $request->wifi : $property->wifi = 0;
        $request->has('dryer') ? $property->dryer = $request->dryer : $property->dryer = 0;
        $request->has('microwave') ? $property->microwave = $request->microwave : $property->microwave = 0;
        $request->has('swimming_pool') ? $property->swimming_pool = $request->swimming_pool : $property->swimming_pool = 0;
        $request->has('window_coverings') ? $property->window_coverings = $request->window_coverings : $property->window_coverings = 0;
        $request->has('gym') ? $property->gym = $request->gym : $property->gym = 0;
        $request->has('outdoor_shower') ? $property->outdoor_shower = $request->outdoor_shower : $property->outdoor_shower = 0;
        $request->has('tv_cable') ? $property->tv_cable = $request->tv_cable : $property->tv_cable = 0;
        $request->has('villa') ? $property->villa = $request->villa : $property->villa = 0;
        $property->area = $request->area;
        $property->rooms = $request->rooms;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->garages = $request->garages;
        $property->parkings = $request->parkings;
        $property->year = $request->year;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/img/', $name);
                $data[] = $name;
            }
            $property->images = json_encode($data);
        }

        $property->save();

        return redirect()->route('agent.properties.index')->with('message', 'You edited succesfully the property');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('agent.properties.index')->with('message', 'You deleted succesfully the property');
    }
}
