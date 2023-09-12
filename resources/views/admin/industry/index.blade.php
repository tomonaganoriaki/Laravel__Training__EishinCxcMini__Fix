<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           業界管理/編集（管理者用）
        </h2>
    </x-slot>

<div class="wrapper">
    <div class="wrapper__inner">
<a class="button button-top" href="{{route('admin.industry.create')}}">業界を新規作成</a>
<table>
   <thead>
       <tr>
           <th class="id">ID</th>
           <th class="name">業界名</th>
           <th >編集/削除</th>
       </tr>
   </thead>
   <tbody>
       @foreach ($secondaryCategories as $key => $value)
           <tr class="oneSet">
               <td class="id">{{ $value['id'] }}</td>
               <td class="name name-bottom">{{ $value['name'] }}</td>
               
               <td><a class="button" href="{{ route('admin.industry.edit', $value['id']) }}">編集</a>

                <form action="{{ route('admin.industry.delete', $value['id']) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button  class="button" type="submit">削除</button>
                </form>
  </td>
           </tr>
       @endforeach
   </tbody>
</table>
</div>
</div>
</x-app-layout>

<style>
    table{
        margin-inline: auto;
    }
    .wrapper{
        width: 90%;
        max-width: 1520px;
        margin: 0 auto;
        background: #fff;
        margin-top: 100px
    }
    .wrapper__inner{
        padding: 50px ;
    }
   .button{
    background: grey;
    padding: 10px 20px;
    color: #fff;
    border: 0;
    text-align: center;
    margin-inline: 40px;
    margin-block: 10px;
    display: flex;
   }
   .button:hover{
    opacity: 0.5;
   }
   .button-top{
    position: relative;
    width: 180px;
    text-align: center;
    margin-left: auto;
    margin-bottom: -50px;
   }
   .oneSet{
   border: 1px solid #000;
   }
   tr{
    border: 1px solid #000;
   }
    .id{
     width: 55px;
     text-align: center;
     border-right: 1px solid #000;
    }
    .name{
        width: 350px;
 
        border-right: 1px solid #000;
    }
    .name-bottom{
        padding-left: 30px;
    }
</style>