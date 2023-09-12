<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            企業一覧 / 管理
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <section class="text-gray-600 body-font">
                    <div class="container px-5 d mx-auto">
                      <div class="color">
                       <x-flash-message status="info"/>
                      </div>
                      <div class="buttonWrapper">
                        <button onclick="location.href='{{ url('admin/owners/create') }}'"  class="flex text-white border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><p>新規登録する</p></button>
                        
                      </div>
                      <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                          <thead>
                            <tr>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">企業名</th>
             
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($company as $owner)
                            <tr>
                              <td class="px-4 py-3"> {{$owner->name}}</td>
                              <td style="float: right" class="flex">
                           
                                <a class="button block" href="{{ route('admin.owners.edit',['owner' => $owner->id]) }}" class="flex button text-white border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded">
                                  <p>企業詳細 / 編集</p>
                                </a>
                                <form  style="margin-left: 10px" id="delete_{{$owner->id}}" method="post" action="{{route('admin.owners.destroy' , ['owner'=> $owner->id])}}">
@csrf
                                  @method('delete')
                                  <a  class="button block" data-id="{{$owner->id}}" onclick="deletePost(this)"  class="flex button text-white border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded">
                                    <p>削除</p>
                                  </a>
                                </form>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      
                    </div>
                  </section>
                  <script>
                    function deletePost(e){
                      'use strict';
                      if(confirm('本当に削除していいですか？')){
                        document.getElementById('delete_' + e.dataset.id).submit();
                      }
                    }
                  </script>
                  <style>
                   
                    button{
                        background: gray ;
                        
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
              
                </div>
            </div>
        </div>
    </div>
</x-app-layout>