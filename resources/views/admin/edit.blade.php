<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           求人編集画面（admin用）
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-flash-message status="session('status')"/>
                   <form method="post" action="{{route('owner.products.update',['product'=>$product->id])}}" >
                        @csrf
                        @method('PUT')
                        <div class="inner -m-2">
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                  <label for="name" class="leading-7 text-sm text-gray-600">【必須】求人名</label>
                                  <input type="text" id="name" name="name" value="{{ $product->name }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2">
                                <div class="relative">
                                  <label for="information" class="leading-7 text-sm text-gray-600">【必須】 求人情報</label>
                                  <textarea id="information" rows="10" name="information" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $product->information }}</textarea>

                                </div>
                              </div>
                              <div class="p-2 w-1/2">
                                <div class="relative">
                                  <label for="price" class="leading-7 text-sm text-gray-600">【必須】月給</label>
                                  <input type="number" id="price" name="price" value="{{ $product->price }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2">
                                <div class="relative">
                                  <label for="sort_order" class="leading-7 text-sm text-gray-600">表示順</label>
                                  <input type="number" id="sort_order" name="sort_order" value="{{ $product->sort_order }}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2">
                                <div class="relative">
                                  <label for="quantity" class="leading-7 text-sm text-gray-600"></label>
                                  <input type="hidden" id="quantity" name="quantity" value="{{ $product->quantity }}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2">
                                <div class="relative">
                                  <label for="current_quantity" class="leading-7 text-sm text-gray-600">現在の求人残数</label>
                                  <input type="hidden" id="current_quantity" name="current_quantity" value="{{ $quantity }}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  <div>{{$quantity}}</div>
                                 
                                </div>
                              </div>
                              <div class="p-2 w-1/2">
                                <div class="relative flex">
                                    <div class="inputRadio">
                                        <input type="radio" name="type" value="1" @if ($product->is_selling === 1)
                                            checked
                                        @endif>募集の追加
                                    </div>
                                    <div class="inputRadio">
                                        <input type="radio" name="type" value="2" @if ($product->is_selling === 0)
                                        @endif>募集の削減
                                    </div>
                                </div>
                                </div>
                                <div class="p-2 w-1/2">
                                <div class="relative">
                                  <label for="quantity" class="leading-7 text-sm text-gray-600">【必須】増減する求人数</label>
                                  <input type="number" id="quantity" name="quantity" value="0"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                 <span>※0〜99の範囲で入力してください。</span>
                                </div>
                              </div>
                              
                              <div class="p-2 w-1/2">
                                <label for="quantity" class="leading-7 text-sm text-gray-600">募集する事業所/店舗</label>
                                <div class="relative">
                                    
                                   <select name='shop_id'>
                                    @foreach($shops as $shop)
                                        <option value="{{$shop->id}}" @if($shop->id === $product->shop_id) selected @endif>
                                            {{$shop->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="quantity" class="leading-7 text-sm text-gray-600">募集する業種</label>
                                   <select name='secondary_category_id'>
                                    @foreach($categories as $category)
                                        <optgroup label="{{$category->name}}">
                                            @foreach($category->secondary as $secondary)
                                                <option value="{{$secondary->id}}"  @if($secondary->id === $product->secondary_category_id) selected @endif>{{$secondary->name}}</option>
                                            @endforeach
                                            @endforeach
                                
                                   </select>
                                </div>
                            </div>
                            <div class="p-2 w-1/2">
                                <div class="relative flex">
                                    <div class="inputRadio">
                                        <input type="radio" name="is_selling" value="1" @if ($product->is_selling === 1)
                                            checked
                                        @endif>求人中
                                    </div>
                                    <div class="inputRadio">
                                        <input type="radio" name="is_selling" value="0" @if ($product->is_selling === 0)
                                        @endif>締切済
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 w-1/2">     
                                <div class="buttons p-2 w-full mt-5 ">
                                    <button type="button" onclick="location.href='{{route('owner.products.index')}}'" class="flex button text-white bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><p>戻る</p></button>
                                    <button type="submit" accept="image/png,image/jpeg,image/jpg" class="flex button text-white  border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><p>更新する</p></button>
                                </div> 
                            </div>
                        </div>
                    </form>
                    <form id="delete_{{$product->id}}" method="post" action="{{ route('owner.products.destroy', ['product'=> $product->id])}}">
                        @csrf
                        @method('delete')
                        <div class="buttons p-2 w-full mt-5 ">
                     <a class="deleteButton" href="#" data-id='{{$product->id}}' onclick="deletePost(this)" >削除する</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
<script>
  function deletePost(e){
        'use strict';
        if(confirm('本当に削除していいですか？')){
            document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>
<style>
    .inner{
        max-width: 270px;
        margin-inline: auto
    }

    .button{
        background: gray;
    }

    button:hover{
      opacity: 0.5;
    }
    button p{
        padding-inline: 15px;
    }
    .buttons{
        display: flex;
        justify-content: space-around;
    }
    .flex{
        display: flex;
        align-content: center
    }
    .inputRadio{
        margin-inline: 5px;
    }
    .inputRadio input{
        margin-right: 5px;
    }
    .deleteButton{
        background: gray;
        color: #fff;
        padding: 10px 15px;
    }
    .deleteButton:hover{
       opacity: 0.5;
    }
  </style> 