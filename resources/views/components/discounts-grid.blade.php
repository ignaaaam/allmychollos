@props(['discounts'])

@if($discounts->count() > 1)
    <div>
        @foreach($discounts as $discount)
                <x-discount-card
                    :discount="$discount"
                    class="my-4" />
        @endforeach
    </div>

@endif
