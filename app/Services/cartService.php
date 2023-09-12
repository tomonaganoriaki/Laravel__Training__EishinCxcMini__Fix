<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class CartService
{
    public static function getItemsInCart($items)
    {
        $products = [];
        foreach ($items as $item) {
            $p = Product::findOrFail($item->product_id);
            $owner = $p->company->owner->first()->select('name', 'email')->first()->toArray();
            $values = array_values($owner);
            $keys = ['owner_name', 'email'];
            $ownerInfo = array_combine($keys, $values);
            $product = $p->toArray();  // Change this line
            $cartItem = Cart::where('product_id', $item->product_id)->where('user_id', Auth::id())->first();
            $product['quantity'] = $cartItem->quantity;
            $product['created_at'] = $cartItem->created_at;
            array_push($products, $product);
        }
        return $products;
    }
}
