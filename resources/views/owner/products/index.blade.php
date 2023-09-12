<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           求人管理画面
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
                        <button onclick="location.href='{{ url('owner/products/create') }}'"  class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><p>新規登録する</p></button>
                      </div>
                   @foreach ($products as $product)
                        <div class="w-12 p-4">
                            <a href="{{route('owner.products.edit', ['product' => $product->id])}}">
                                <div class="border rounded-md p-4">
                                    <div class="text-xl">
                                        <div class="paddingBottom15 flex justify-between">  
                                            <div class="bold">
                                            求人名：{{$product->name}}
                                        </div>
                                            <p class="changeBtn">求人を編集・削除</p>
                                        </div>
                                    <div class="information">
                                            {{$product->information}}
                                    </div>
                                    
                                        
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
.bold{
    font-weight: 700;
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
                   .paddingBottom15{
                       padding-bottom: 15px;
                   }
                   .information{
                    background: #f1f1f1;
                    padding:15px 25px;
                   }
                   .changeBtn{
                    background: gray;
                    color: #fff;
                    padding: 0px 8px;
    font-size: 15px;
                   }
                   .changeBtn:hover{
opacity: 0.5;
                   }
</style>