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
                    {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
                   <form method="post" action="{{route('owner.shops.update', ['shop' => $shop->id])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="inner -m-2">
                        <div class="p-2 w-1/2">
                            <div class="relative">
                              <label for="name" class="leading-7 text-sm text-gray-600">【必須】 企業名</label>
                              <input type="text" id="name" name="name" value="{{ $shop->name }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                          <div class="p-2 w-1/2">
                            <div class="relative">
                              <label for="information" class="leading-7 text-sm text-gray-600">【必須】 企業情報</label>
                              <textarea id="information" rows="10" name="information" value="{{ $shop->information }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                            </div>
                          </div>
                          {{-- <div class="w-32">
                            <x-shop-thumbnail />
                          </div> --}}
                      <div class="p-2 w-1/2">
                        <div class="relative">
                          <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                          <input type="file" id="image" name="image" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        {{-- <div class="p-2 w-1/2">
                            <div class="relative flex">
                                <div class="inputRadio">
                                <input type="radio" name="is_selling" value="1" @if ($shop->is_selling === 1)
                                    {checked}
                                @endif>求人中
                            </div>
                            <div class="inputRadio">
                                <input type="radio" name="is_selling" value="1" @if ($shop->is_selling === 0)
                                    {checked}
                                @endif>締切済
                            </div>
                            </div>
                        </div> --}}
                        <div class="p-2 w-1/2">
                            <div class="relative flex">
                                <div class="inputRadio">
                                    <input type="radio" name="is_selling" value="1" @if ($shop->is_selling === 1)
                                        checked
                                    @endif>求人中
                                </div>
                                <div class="inputRadio">
                                    <input type="radio" name="is_selling" value="0" @if ($shop->is_selling === 0)
                                        checked
                                    @endif>締切済
                                </div>
                            </div>
                        </div>
                        
                        <div class="buttons p-2 w-full mt-5 ">
                            <button type="button" onclick="location.href='{{route('owner.shops.index')}}'" class="flex button text-white bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><p>戻る</p></button>
                            <button type="submit" accept="image/png,image/jpeg,image/jpg" class="flex button text-white  border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><p>更新する</p></button>
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