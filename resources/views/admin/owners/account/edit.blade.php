<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          企業アカウントの詳細情報 / 編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 mx-auto">
                          <div style="margin-block:10px 11px" class="flex flex-col text-center w-full mb-12">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font  text-gray-900">企業アカウント詳細情報 / 編集</h1>
                            
                          </div>
                          <div class="lg:w-1/2 md:w-2/3 mx-auto">
                              <form method="post" action="{{ route('admin.owners.account.update', ['id' => $owner->id]) }}">
                              @csrf
                              <div class="inner -m-2">
                                <div class="p-2 w-1/2">
                                  <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">所属企業名（変更不可）</label>
                                    <input type="text" id="name" name="name" value="{{ $owner->company->name }}" required readonly class="w-full  bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2">
                                  <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">アカウント名</label>
                                    <input type="text" id="name" name="name" value="{{ $owner->name }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2">
                                  <div class="relative">
                                    <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                                    <input type="email" id="email" name="email" value="{{ $owner->email }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                {{-- <div class="p-2 w-1/2">
                                  <div class="relative">
                                    <label for="shop" class="leading-7 text-sm text-gray-600">店名</label>
                                    <div value="{{ $owner->shop->name }}" class="shopName w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div> --}}
                                <!-- <div class="p-2 w-1/2">
                                  <div class="relative">
                                    <label for="password" class="leading-7 text-sm text-gray-600">パスワード（入力必須）</label>
                                    <input type="password" id="password" name="password" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                  </div>
                                  <div class="p-2 w-1/2">
                                    <div class="relative">
                                      <label for="password_confirmation" class="leading-7 text-sm text-gray-600">パスワード（確認 / 入力必須）</label>
                                      <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div> -->
                                  <div class="buttons p-2 w-full mt-5 ">
                                    <button type="button" onclick="history.back()" class="flex button text-white bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><p>戻る</p></button>
                                    <button type="submit" class="flex button text-white  border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><p>更新する</p></button>
                                  </div>        
                                </div>
                              <style>
                                  .inner{
                                      max-width: 450px;
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
                                  .shopName{
                                    height: 40px;
                                  }
                                </style> 
                            </form>
                          </div>
                        </div>
                      </section>
                      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
