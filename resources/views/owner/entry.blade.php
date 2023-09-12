<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           エントリー一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (count($carts) > 0)
                    @foreach ($carts as $cart)
                        <div class="cartOneSet">
                            <div>
                                <div><span class="bold">求人名　：</span>{{ $cart->product->name }}</div> 
                                <div><span class="bold">応募者名：</span>{{ $cart->user->name }}</div> 
                            </div>
                            <section class="accordion">
                                <a class="grayButton" href="{{ route('owner.entry.chat', ['id' => $cart->id]) }}">チャット</a>
                            </section>
                            <section class="accordion">
                                <input id="{{ 'toggle-' . $loop->iteration }}" type="checkbox" class="toggle">
                                <label class="Label" for="{{ 'toggle-' . $loop->iteration }}">エントリー削除</label>
                                <div class="content">
                                    <p>本当に削除しますか？</p>
                                    <form method="POST" action="{{route('owner.entry.delete', ['id' => $cart->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button>削除</button>
                                    </form>
                                </div>
                            </section>
                        </div>
                    @endforeach
                @else
                    エントリーされている求人はありません。
                @endif
                
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
<style>
    .cartOneSet {
        display: flex;
        justify-content: space-between;
        padding-block: 20px;
        border-bottom: 1px solid #ccc;
        align-content: center;
    }

    button {
        background: #c81313;
    color: #fff;
    font-weight: bold;
    padding: 10px 20px;
    display: block;
    margin-inline: auto;
    margin-top: 11px;
    }

    button:hover {
        opacity: 0.5;
    }
    .bold{
        font-weight: bold;
    }
    .toggle {
	display: none;
}
.Label {		/*タイトル*/
	padding: 1em;
	display: block;
	color: #fff;
	background:gray;
}
.Lavel:hover {
    opacity: 0.5;
}
.Label::before{		/*タイトル横の矢印*/
	content:"";
	width: 6px;
	height: 6px;
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
    background: #efefef;
}
.toggle:checked + .Label::before {
	transform: rotate(-45deg) !important;
}
.grayButton{
        background: gray;
        color: #fff;
        padding: 10px 20px;
    }
    .grayButton:hover{
        opacity: 0.5;
    }
</style>