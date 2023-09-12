<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            チャット（ユーザー視点）
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
                      <div class="buttonWrapper chatSubmit">
                        <form class="flex" method='post' action="{{ route('user.entry.chat.store', ['cart_id' => $id]) }}">
                            @csrf
                            <input class="chatInput" name="message" type="text">
                            <button  type="submit"  class="flex border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg chatButton">送信</button>
                        </form>
                        @foreach ($chats as $chat)
                        <div class="chatWrapper">
                            <div class="chat">
                                @if ($chat->speaker === 1)
                                    <p class="bold company">企業（{{$chat->company->name}}）</p>
                                @elseif ($chat->speaker === 0)
                                    <p class="bold user">応募者（{{$chat->user->name}}）</p>
                                @endif
                                <div class="chatMessage">
                                    <p>{{ $chat->message }}</p>
                                </div>
                            </div>
                            
                        @endforeach
                       
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
                  .bold{
                    font-weight: bold;
                  }
                  .color{
                    background: rebeccapurple
                  }
                    button p{
                        padding-inline: 15px;
                    }
                   .buttonWrapper{
          
                        justify-content: end;
                        margin-bottom: 40px
                   }
                   .chatSubmit{
             
                    width:100%;
                   }
                   .chatInput{
                width: 88%;
                 margin-right:50px;
                   }
                   .chatButton{
                    background: gray;
                    color: white;
                    padding: 10px 20px;
                   }
                   .chatButton.hover{
                    opacity: 0.5;
                   }
                   .chatWrapper{
                    margin-top: 20px
                   }
                   .company{
                    color: blue;
                   }
                   .user{
                    color: red;
                   }
                  </style>
              
                </div>
            </div>
        </div>
    </div>
</x-app-layout>