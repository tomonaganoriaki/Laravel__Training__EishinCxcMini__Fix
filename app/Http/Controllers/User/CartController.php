<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\CartService;
use App\Jobs\SendThanksMail;
use App\Mail\ThanksMail;
use Illuminate\Support\Facades\Mail;

// class CartController extends Controller
// {
//     public function index()
//     {
//         $user = User::findOrfail(Auth::id());
//         $products = $user->products;
//         $totalPrice = 0;
//         foreach ($products as $product) {
//             $totalPrice += $product->price * $product->pivot->quantity;
//         }
//         return view('user.cart', compact('products', 'totalPrice'));
//     }

//     public function add(Request $request)
//     {
//         $itemInCart = Cart::where('product_id', $request->product_id)
//             ->where('user_id', Auth::id())
//             ->first();

//         if ($itemInCart) {
//             $itemInCart->quantity += 1;
//             $itemInCart->save();
//         } else {
//             Cart::create([
//                 'user_id' => Auth::id(),
//                 'product_id' => $request->product_id,
//                 'quantity' => 1
//             ]);
//         }

//         // Moving the email send function here
//         $user = User::findOrfail(Auth::id());
//         $items = Cart::where('user_id', Auth::id())->get();
//         $products = CartService::getItemsInCart($items);
//         SendThanksMail::dispatch($products, $user);

//         return redirect()->route('user.cart.index');
//     }

//     public function buy()
//     {
//         $user = User::findOrfail(Auth::id());
//         $products = $user->products;
//         $totalPrice = 0;
//         foreach ($products as $product) {
//             $totalPrice += $product->price * $product->pivot->quantity;
//         }
//         return view('user.checkout', compact('products', 'totalPrice'));
//     }

//     public function delete($item)
//     {
//         $itemInCart = Cart::where('product_id', $item)
//             ->where('user_id', Auth::id())
//             ->delete();
//         return redirect()->route('user.cart.index');
//     }
// }
class CartController extends Controller
{
    public function index()
    {
        $user = User::findOrfail(Auth::id());
        $products = $user->products;
        $carts = Cart::where('user_id', Auth::id())->get();
        $totalPrice = 0;
        foreach ($products as $product) {
            $totalPrice += $product->price * $product->pivot->quantity;
        }
        return view('user.cart', compact('products', 'totalPrice', 'carts'));
    }

    public function add(Request $request)
    {
        $itemInCart = Cart::where('product_id', $request->product_id)
            ->where('user_id', Auth::id())
            ->first();

        if ($itemInCart) {
            $itemInCart->quantity += 1;
            $itemInCart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => 1
            ]);
        }

        // Moving the email send function here
        $user = User::findOrfail(Auth::id());
        $items = Cart::where('user_id', Auth::id())->get();
        $products = CartService::getItemsInCart($items);
        SendThanksMail::dispatch($products, $user);

        return redirect()->route('user.cart.index');
    }

    public function buy()
    {
        $user = User::findOrfail(Auth::id());
        $products = $user->products;
        $totalPrice = 0;
        foreach ($products as $product) {
            $totalPrice += $product->price * $product->pivot->quantity;
        }
        return view('user.checkout', compact('products', 'totalPrice'));
    }

    public function delete($item)
    {
        $itemInCart = Cart::where('product_id', $item)
            ->where('user_id', Auth::id())
            ->delete();
        return redirect()->route('user.cart.index');
    }
}
