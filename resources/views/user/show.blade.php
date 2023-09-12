<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            求人詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bold block">
                       求人名：{{$product->name}}
                    </div>
                    <div class="bold block">
                        
                        {{-- 企業名：{{$product->company->name}} --}}
                     </div>
                    <div class="block">
                       業種　：{{$product->secondary_category_name}}
                    </div>
                    <div class="block">
                        <span class="title-font font-medium text-2xl text-gray-900"> 月給　：{{number_format($product->price)}}円</span>
                    </div>
                    <div class="block">
                        {{$product->information}}
                    </div>
                    <form method="post" action="{{ route('user.cart.add') }}">
                        @csrf
                        <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">求人に応募する</button>
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="quantity" value="1">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
<style>
    .bold{
        font-weight: bold;
    }
    .block{
        display: block;
    }
    .flex{
        display: flex;
        flex-wrap: wrap;
    }
    .oneSet{
        background:red;
    }
    .marginB10{
        margin-block: 20px
    }
    button{
        background: gray;
        float: right;
        margin-block: 20px 30px;
    }
    button:hover{
        opacity: 0.5;
    }
</style>