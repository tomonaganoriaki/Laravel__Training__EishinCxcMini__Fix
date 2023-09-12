<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($id)
    {
        // チャットの取得　（チャットのテーブルから、$idで検索）
        $chats = Chat::where("cart_id", $id)->get();
        return view('owner.entry.chat.index', compact("chats", "id"));
    }
    public function store(Request $request, $cart_id)
    {
        $cart = Cart::find($cart_id);
        $companyId = $cart->product->company_id;

        // チャットの保存
        $chat = new Chat();
        $chat->cart_id = $cart_id;
        $chat->company_id = $companyId;
        $chat->user_id = $cart->user_id;
        $chat->message = $request->message;
        $chat->speaker = 1;
        $chat->save();
        return redirect()->back();
    }
    public function userIndex($id)
    {
        // チャットの取得　（チャットのテーブルから、$idで検索）
        $chats = Chat::where("cart_id", $id)->get();
        return view('user.entry.chat.index', compact("chats", "id"));
    }
    public function userStore(Request $request, $cart_id)
    {
        $cart = Cart::find($cart_id);
        $companyId = $cart->product->company_id;

        // チャットの保存
        $chat = new Chat();
        $chat->cart_id = $cart_id;
        $chat->company_id = $companyId;
        $chat->user_id = $cart->user_id;
        $chat->message = $request->message;
        $chat->speaker = 0;
        $chat->save();
        return redirect()->back();
    }
}
