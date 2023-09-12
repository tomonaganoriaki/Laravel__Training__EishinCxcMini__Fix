<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            求人一覧（admin用）
        </h2>
    </x-slot>
    
    
    <div class="py-12">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <form class="searchForm" method="get" action="{{route('user.items.index')}}">
                @csrf
                <div class="flex searchOneSet">
                    <p>業種：</p>
                    <select name="category">
                        <option value="">選択してください</option>
                        <option value="0" @if (!isset($category) || $category == 0) selected @endif>全て</option>
                        @foreach($categories as $primaryCategory)
                        <optgroup label="{{$primaryCategory->name}}">
                            @foreach($primaryCategory->secondary as $secondary)
                                <option value="{{$secondary->id}}" @if (isset($category) && $category == $secondary->id) selected @endif>{{$secondary->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                    
                </div>
                <div>
                    <input class="searchButton" type="submit" value="検索">
                </div>
            </form> --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-6 text-gray-900">
                       @foreach ($products as $product)
                                <div class="block">
                                    <div class="border rounded-md p-4 marginB10">
                                        <div class="text-xl">
                                            <div class="paddingBottom15  justify-between">  
                                                <div style="justify-content: space-between" class="flex">
                                                <div>
                                                    <div class="block">
                                                    求人名： {{$product->name}}
                                                    </div>
                                                    <div class="block">
                                                        企業名： {{$product->company->name}}
                                                        </div>
                                                    <div class="block">
                                                    業種　： {{$product->secondary_category_name}}
                                                    </div>
                                                    <div class="block">
                                                        月給　：{{number_format($product->price)}}円
                                                    </div>
                                                    <div class="block">
                                                        説明　：{{$product->information}}
                                                    </div>   
                                                 </div>
                                                 <section class="accordion">
                                                    <input style="opacity: 0" id="{{ $loop->index + 1 }}" type="checkbox" class="toggle">
                                                    <label class="Label" for="{{ $loop->index + 1 }}">求人削除</label>
                                                    <div class="content">
                                                        <p class="text">本当に削除しますか？</p>
                                                    <form action="{{ route('admin.product.delete', $product->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="deleteBtn" type="submit">はい</button>
                                                    </form>
                                                    </div>
                                                </section>
                                            </div>
                                                 
                                            </div>
                                        </div>

                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
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
        align-items: center;
    }
    .oneSet{
        background:red;
    }
    .marginB10{
        margin-block: 20px
    }
    .searchForm{
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        background: #fff;
        margin-bottom: 30px;
        padding: 20px;
        justify-content: space-around;
    }
    .searchOneSet{
        margin-right: 20px;
    }
    .searchButton{
        background: gray;
        color: #fff;
        padding: 10px 70px;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 20px
    }
    .searchButton:hover{
        opacity: 0.5;
    }
    .changeButton{
        background: gray;
        color: #fff;
        padding: 10px 20px
    }
    .changeButton:hover{
        opacity: 0.5;
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
.text{
    font-size: 20px;
}
.deleteBtn{
    font-size: 20px;
    background: #d40606;
    color: #fff;
    margin-top: 10px;
    padding: 4px 12px;
    float: right;
    font-weight: bold;
}
.deleteBtn:hover{
    opacity: 0.5;
}
</style>