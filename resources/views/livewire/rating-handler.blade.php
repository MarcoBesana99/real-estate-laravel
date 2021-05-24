<div>
    <div class="pd-widget">
        <h4>Last reviews</h4>
        @forelse ($propertyRatings as $rate)
            <div class="pd-review">
                <div class="pr-item">
                    <div class="pr-avatar">
                        <div class="pr-text">
                            <h6>{{ $rate->name }}</h6>
                            <span>{{ $rate->created_at->format('Y-m-d') }}</span>
                            <div class="pr-rating">
                                @for ($i = 0; $i < $rate->rating; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p>{{ $rate->message }}</p>
                </div>
            </div>
        @empty
            <div class="alert alert-danger">No reviews</div>
        @endforelse
    </div>
    <div class="pd-widget">
        <h4>Your Rating</h4>
        <form wire:submit.prevent="rate" class="review-form">
            <div class="group-input">
                <input type="text" placeholder="Name*" wire:model="name">
                <input type="text" placeholder="Email*" wire:model="email">
            </div>
            <div class="d-inline-flex">
                @error('name')
                    <p class="text-danger mr-5">{{ $message }}</p>
                @enderror
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <textarea placeholder="Message*" wire:model="message"></textarea>
            @error('message')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" wire:model="rating" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" wire:model="rating" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" wire:model="rating" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" wire:model="rating" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" wire:model="rating" />
                <label for="star1" title="text">1 star</label>
            </div>
            <button type="submit" class="site-btn">Review</button>
            @error('rating')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </form>
    </div>
</div>
