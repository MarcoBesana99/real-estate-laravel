<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //check if the user is the agent of the property
        if($this->property->user_id == auth()->user()->id)
            return true;
        else 
            return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
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
            'images'=>'nullable'
        ];
    }
}
