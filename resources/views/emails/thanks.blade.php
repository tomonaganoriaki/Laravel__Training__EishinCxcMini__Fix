<p>{{$user->name}} 様</p>
<p>
    この度は、求人サイトをご利用いただき誠にありがとうございます。<br>
    下記、ご応募いただいた求人の詳細情報をご確認ください。
</p>

@foreach($products as $product)
<ul>
    <li>
        求人名：{{$product['name']}}
    </li>
    <li>
        月給：{{number_format($product['price'])}}円
    </li>
    <li>
        求人詳細：{{$product['information']}}
    </li>
    <li>
        応募日時：{{$product['created_at']}}
    </li>
</ul>
@endforeach
