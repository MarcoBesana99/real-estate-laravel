<?php

namespace App\Http\Livewire;

use App\Models\Property;
use App\Models\Rating;
use Livewire\Component;

class RatingHandler extends Component
{
    public $email;
    public $name;
    public $message;
    public $rating;
    public $propertyId;
    public $propertyRatings;

    public function mount($propertyId)
    {
        $this->propertyId = $propertyId;
        $this->getRatings();
    }

    public function getRatings() {
        $this->propertyRatings =  Property::find($this->propertyId)->ratings->sortByDesc('created_at')->take(4);
    }

    public function resetFields()
    {
        $this->reset(['name', 'email', 'message','rating']);
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
        'rating' => 'required'
    ];

    public function rate()
    {
        $this->validate();

        Rating::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
            'rating' => $this->rating,
            'property_id' => $this->propertyId
        ]);

        $this->resetFields();
        $this->getRatings();
    }

    public function render()
    {
        return view('livewire.rating-handler');
    }
}
