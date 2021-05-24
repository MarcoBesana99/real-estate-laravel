<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //get latest 20 properties
        $properties = Property::orderBy('id','desc')->take(20)->get();

        //get unique cities
        $addresses = Property::pluck('address');
        $cities = [];
        foreach ($addresses as $address) {
            array_push($cities, explode(",", $address)[0]);
        }
        $uniqueCities = array_unique($cities);

        //get property types
        $propertyTypes = Property::pluck('type');
        $types = [];
        foreach ($propertyTypes as $type) {
            array_push($types, explode(",", $type)[0]);
        }
        $types = array_unique($types);

        //get bedrooms numbers
        $bedrooms = Property::orderBy('bedrooms','asc')->pluck('bedrooms');
        $numberOfBedrooms = [];
        foreach ($bedrooms as $bedroom) {
            array_push($numberOfBedrooms, $bedroom);
        }
        $numberOfBedrooms = array_unique($numberOfBedrooms, SORT_NUMERIC);
        return view('index', compact('properties','uniqueCities','types','numberOfBedrooms'));
    }
}
