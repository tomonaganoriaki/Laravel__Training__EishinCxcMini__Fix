<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           求人作成画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <form method="post" action="{{route('owner.products.store')}}">
                        @csrf
                        <div class="inner -m-2">
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                  <label for="name" class="leading-7 text-sm text-gray-600">【必須】求人名</label>
                                  <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2">
                                <div class="relative">
                                  <label for="information" class="leading-7 text-sm text-gray-600">【必須】 求人情報</label>
                                  <textarea id="information" rows="10" name="information" value="{{ old('information') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                                </div>
                              </div>
                              <div class="p-2 w-1/2">
                                <div class="relative">
                                  <label for="price" class="leading-7 text-sm text-gray-600">【必須】月給</label>
                                  <input type="number" id="price" name="price" value="{{ old('price') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              {{-- <div class="p-2 w-1/2">
                                <div class="relative">
                                  <label for="sort_order" class="leading-7 text-sm text-gray-600">表示順</label>
                                  <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order') }}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div> --}}
                              {{-- <div class="p-2 w-1/2">
                                <div class="relative">
                                  <label for="quantity" class="leading-7 text-sm text-gray-600">初期募集数</label>
                                  <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div> --}}
                              <div class="p-2 w-1/2">
                                <label for="quantity" class="leading-7 text-sm text-gray-600">求人の所属企業</label>
                                <div class="relative">
                                    
                                        <label>{{$owner->company->name}}</label>
                                        <input value="{{$owner->company->id}}" hidden readonly name="company_id"/>
                                </div>
                            </div>
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="quantity" class="leading-7 text-sm text-gray-600">募集する業種</label>
                                   <select name='secondary_category_id'>
                                    @foreach($categories as $category)
                                        <optgroup label="{{$category->name}}">
                                            @foreach($category->secondary as $secondary)
                                                <option value="{{$secondary->id}}">{{$secondary->name}}</option>
                                            @endforeach
                                            @endforeach
                                
                                   </select>
                                </div>
                            </div>
                          
                            <div class="p-2 w-1/2">     
                                <div class="buttons p-2 w-full mt-5 ">
                                    <button type="button" onclick="location.href='{{route('owner.products.index')}}'" class="flex button text-white bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><p>戻る</p></button>
                                    <button type="submit" accept="image/png,image/jpeg,image/jpg" class="flex button text-white  border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><p>登録する</p></button>
                                </div> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
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
  </style> 