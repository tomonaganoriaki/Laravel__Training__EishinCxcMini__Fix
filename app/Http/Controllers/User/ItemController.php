<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use App\Models\PrimaryCategory;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Jobs\SendThanksMail;

class ItemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:users');
    }
    public function index(Request $request)
    {
        // SendThanksMail::dispatch();
        $query = Product::availableItems()
            ->select(
                'products.id as id',
                'products.name as name',
                'products.price as price',
                'products.information as information',
                'products.company_id as company_id',
                'secondary_categories.name as secondary_category_name'
            );

        $category = null;

        if ($request->has('category') && $request->category != 0) {
            $query->where('products.secondary_category_id', '=', $request->category);
            $category = $request->category;
        }
        $products = $query->paginate(15);
        $categories = PrimaryCategory::with('secondary')->get();
        return view('user.index', compact('products', 'categories', 'category'));
    }


    public function show($id)
    {

        $product = DB::table('products')
            ->join('secondary_categories', 'products.secondary_category_id', '=', 'secondary_categories.id')
            ->where('products.id', '=', $id)
            ->select(
                'products.id as id',
                'products.name as name',
                'products.price as price',
                'products.information as information',
                'products.company_id as company_id',
                'secondary_categories.name as secondary_category_name'
            )
            ->first();
        $quantity = Stock::where('product_id', $id)->sum('quantity');
        if ($quantity > 1) {
            $quantity = 1;
        }
        if ($product == null)
            abort(404);

        return view('user.show', compact('product', 'quantity'));
    }
}
