
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            応募完了画面
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    <h1 class="title">求人への応募を受け付けました！</h1>
    <div>
    <p class="list">▼ 応募した求人情報:</p>
    <ul>
    @foreach($products as $product)
        <li class="oneSet">
            求人名：{{ $product->name }}<br>
            月給　：{{ $product->price }}円<br>
            説明文：<br>
            {{ $product->information }}<br>

        </li>
    @endforeach
    </ul>
 
</div>
</div></div></div>


</div>
</x-app-layout>
<style>
    .title{
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .list{
        font-weight: bold;
        border-bottom: 1px solid #ccc;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }
    .oneSet{
        background-color: rgb(230, 251, 251);
        padding: 40px;
        margin-block: 50px 20px;
    }
</style>