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
                       <div class="buttonWrapper">
                        <button onclick="location.href='{{ url('owner/images/create') }}'"  class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><p>新規登録する</p></button>
                      </div>
                    @foreach ($images as $image)
                    <div class="w-12 p-4">
                    <a href="{{route('owner.images.edit', ['image' => $image->id])}}">

                        <div class="border rounded-md p-4">
                            
                            <div class="text-xl">
                                {{$image->title}}
                                <x-thumbnail :filename="$shop->filename" type="product"/>
                            </div>
                            {{-- <div>
                                @if (empty($image->filename))
                                    <img src="{{asset('images/no_image.jpg')}}" alt="no image" class="iMage object-cover">
                                    @else
                                    <img src="{{asset('storage/images/'. $image->filename)}}">
                                @endif
                            </div> --}}
                            
                        </div>
                    </a>
                </div>
                    @endforeach
                    {{ $images->links() }}
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
                   
                  button{
                        background: gray;
                        
                    }
                    button:hover{
                       opacity: 0.5;
                    }
                    .block{
                        display: block;
                      background:gainsboro;
                    text-align: center;
                    padding-block: 10px;
                    margin-inline: 5px;
    padding-inline: 10px;
                  }
                  .color{
                    background: rebeccapurple
                  }
                    button p{
                        padding-inline: 15px;
                    }
                   .buttonWrapper{
                    display: flex;
                        justify-content: end;
                        margin-bottom: 40px
                   }
</style>