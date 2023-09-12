@php
   if ($type === 'shops') {
         $path = 'storage/shops/';
    } elseif ($type === 'products') {
         $path = 'storage/products/';
   } 
@endphp
<div>
    @if (empty($shop->filename))
        <img src="{{asset('images/no_image.jpg')}}" alt="no image" class="iMage object-cover">
        @else
        <img src="{{asset($path. $shop->filename)}}">
    @endif
</div>