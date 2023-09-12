<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            応募済の求人一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (count($products) > 0)
                        @foreach ($carts as $cart)
                            <div class="cartOneSet">
                                <div>求人名：{{$cart->product->name}}</div>
                             
                                <div><a class="grayButton" href="{{ route('user.entry.chat', ['id' => $cart->id]) }}">チャットする</a></div>
                                <form method="post" action="{{route('user.cart.delete',['item'=>$cart->product->id])}}">
                                    @csrf
                                    <button>応募を取り下げる</button>
                                </form>
                            </div> <!-- このタグを追加 -->
                        @endforeach
                    @else
                        応募した求人はありません。
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
<style>
    .cartOneSet{
        display: flex;
        justify-content: space-between;
        padding-block: 20px;
        border-bottom: 1px solid #ccc;
        align-content: center;
    }
    button{
        background: gray;
        color: #fff;
        padding: 10px 20px;
        transform: translateY(-13px);
    }
    button:hover{
        opacity: 0.5;
    }
    .grayButton{
        background: gray;
        color: #fff;
        padding: 10px 20px;
    }
    .grayButton:hover{
        opacity: 0.5;
    }
</style>