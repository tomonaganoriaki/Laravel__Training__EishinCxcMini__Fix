<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\CartService;
use App\Jobs\SendThanksMail;
use App\Mail\ThanksMail;
use App\Models\Chat;
use Illuminate\Support\Facades\Mail;


class EntryController extends Controller
{
    public function index()
    {

        $carts = Cart::with(['user', 'product'])->get();
        return view('owner.entry', compact('carts'));
    }


    public function delete($id)
    {
        $itemInCart = Cart::find($id);
        $itemInCart->delete();
        return redirect()->route('owner.entry.index');
    }
}
