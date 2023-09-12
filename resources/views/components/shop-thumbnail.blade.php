<div>
    @if (empty($shop->filename))
        <img src="{{asset('images/no_image.jpg')}}" alt="no image" class="iMage object-cover">
        @else
        <img src="{{asset('storage/shops/'. $shop->filename)}}">
    @endif
</div>