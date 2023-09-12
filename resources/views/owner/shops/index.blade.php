<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="color">
                        <x-flash-message status="info"/>
                       </div>
                    @foreach ($shops as $shop)
<div class="w-12 p-4">
                    <a href="{{route('owner.shops.edit', ['shop' => $shop->id])}}">

                        <div class="border rounded-md p-4">
                            <div class="mb-4">
                                @if($shop->is_selling === 1)
                                <span class="border p-2 rouded-md bg-blue-400 text-white">求人中</span>
                                @else
                                <span class="border p-2 rouded-md bg-red-400 text-white">締切済</span>
                                @endif
                            </div>
                            <div class="text-xl">
                              企業名：{{$shop->name}}
                                {{-- <x-shop-thumbnail /> --}}
                                
                            </div>
                            <div>
                                @if (empty($shop->filename))
                                    <img src="{{asset('images/no_image.jpg')}}" alt="no image" class="iMage object-cover">
                                    @else
                                    <img src="{{asset('storage/shops/'. $shop->filename)}}">
                                @endif
                            </div>
                            
                        </div>
                    </a>
                </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<style>
.bg-blue-400{
    background-color: #3490dc;
}
.bg-red-400{
    background-color: #e3342f;
}
.text-white{
    color: #fff;
}
.border{
    border: 1px solid #ddd;
}
.rounded-md{
    border-radius: 0.375rem;
}
.p-2{
    padding: 0.5rem;
}
.text-xl{
    font-size: 1.25rem;
}
.text-gray-900{
    color: #1a202c;
}
.text-gray-800{
    color: #2d3748;
}
.text-gray-700{
    color: #4a5568;
}
.text-gray-600{
    color: #718096;
}
.p-4{
    padding: 1rem;
}
.w-12{
    width: 50%;
}
.iMage{
    width: 100%;
    aspect-ratio: 1920/1080;
    border:1px solid #ddd;
}
.object-cover{
    object-fit: cover;
}
.color{
                    background: rebeccapurple
                  }
</style>