<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            求人詳細（オーナー画面）
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex" style="justify-content:space-between">
                        <div>
                            <div class="block">
                            求人名：{{$product->name}}
                            </div>
                            <div class="block">
                            業種　：{{$product->secondary_category_name}}
                            </div>
                            <div class="block">
                                <span class="title-font font-medium text-2xl text-gray-900"> 月給　：{{number_format($product->price)}}円</span>
                            </div>
                        </div>
                     
                        <a style="display:block" class="button" href="javascript:history.back()">一覧へ戻る</a>


                       
                        {{-- <a class="changeButton" href="{{ route('items.edit2', ['id' => $product->id]) }}">編集 / 削除<a> --}}
                    </div>
                    {{-- <div class="block">
                        企業名：{{$product->company_id}}
                    </div>   --}}
                    <div class="block">
                        説明　：{{$product->information}}
                    </div>            
                </div>
                 {{-- 以下、修正欄 --}}

        <section class="accordion">
            <input id="2" type="checkbox" class="toggle">
            <label class="Label" for="2">求人削除</label>
            <div class="content">
                <p>本当に削除しますか？</p>
            <form action="{{ route('admin.product.delete', $product->id) }}" method="post">
                @csrf
                @method('delete')
                <button class="button" type="submit">はい</button>
            </form>
            </div>
        </section>
            </div>

        </div>
        {{-- 以下、修正欄 --}}

     

        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <section class="accordion">
                    <input id="1" type="checkbox" class="toggle">
                    <label class="Label" for="1">編集 / 削除</label>
                    <div class="content">
                    
                        <form action="{{ route('admin.update2', $product->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            
                            <div>
                                <div class="block">
                                    求人名：<input type="text" name="name" value="{{$product->name}}">
                                </div>
                                <div class="block">
                                    業種　：
                                    <select name='secondary_category_id'>
                                        @foreach($categories as $category)
                                            <optgroup label="{{$category->name}}">
                                                @foreach($category->secondary as $secondary)
                                                    <option value="{{$secondary->id}}">{{$secondary->name}}</option>
                                                @endforeach
                                                @endforeach
                                    
                                       </select>
                                </div>
                                <div class="block">
                                    <span class="title-font font-medium text-2xl text-gray-900">月給　：<input type="text" name="price" value="{{number_format($product->price)}}">円</span>
                                </div>
                            </div>
                          
                            <div style="align-items: center" class="block flex">
                                <div class="textAreaLavel">求人文：</div><textarea name="information">{{$product->information}}</textarea>
                            </div>
                            <button class="button" type="submit">更新</button>
                        </form>
                        
                       
                    </div>
                    
                </section>
            
              
                
            </div>
        </div> --}}
        
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
    .button{
        background: gray;
        color: white;
        padding: 5px 10px;
        float: right;
        height: 40px;
        margin-bottom: 10px;
    }
    .button:hover{
        opacity: 0.5;
    }
    .toggle {
	display: none;
}
.accordion{
    width: 21%;
    margin-inline: auto 1.7%;

}
.Label {		
	padding: 0.4em;
    text-align: center;
	display: block;
	color: #fff;
	background:gray;
}
.Label:hover {		
	opacity: 0.5;
}
.Label::before{		
	content:"";
	width: 10px;
	height: 10px;
	border-top: 2px solid #fff;
	border-right: 2px solid #fff;
	-webkit-transform: rotate(45deg);
	position: absolute;
	top:calc( 50% - 3px );
	right: 20px;
	transform: rotate(135deg);
}
.Label,
.content {
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	transform: translateZ(0);
	transition: all 0.3s;
}
.content {		/*本文*/
	height: 0;
	margin-bottom:10px;
	padding:0 20px;
	overflow: hidden;
}
.toggle:checked + .Label + .content {	/*開閉時*/
	height: auto;
	padding:20px ;
	transition: all .3s;
    background: #f4f2f2;
}
.toggle:checked + .Label::before {
	transform: rotate(-45deg) !important;
}
.textAreaLavel{
    display: flex;
    align-content: center
}
input{
    width: 80%;
    height: 40px;
    margin-bottom: 10px;
}
textarea{
    width: 80%;
    height: 200px;
    margin-bottom: 10px;
}
</style>