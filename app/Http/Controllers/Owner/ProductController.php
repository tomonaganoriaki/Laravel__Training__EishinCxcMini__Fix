<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SecondaryCategory;
use App\Models\PrimaryCategory;
use App\Models\Owner;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Throwable;
use App\Models\Stock;
use App\Http\Requests\ProductRequest;
use App\Models\Company;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');
        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('product');
            if (!is_null($id)) {
                // $productsOwnerId = Product::findOrFail($id)->shop->product->id;
                $productsOwnerId = Product::findOrFail($id)->company->owner->first()->id;
                $productId = (int)$productsOwnerId;
                // $ownerId = Auth::id();
                // if ($productId !== $ownerId) {
                //     abort(404);
                // }
            }
            return $next($request);
        });
    }
    public function index()
    {
        // Owner::findOrFail(Auth::id())->shop->product;
        // $products = Product::where('shop_id', Auth::id())->get();
        // return view('owner.products.index', compact('products'));
        $companyId = Owner::find(Auth::id())->company->id;
        $products = Product::where('company_id', $companyId)->get();

        return view('owner.products.index', compact('products'));
    }
    public function create()
    {
        // $shops = Shop::where('owner_id', Auth::id())
        //     ->select('id', 'name')
        //     ->get();
        $owner = Owner::find(Auth::id());


        $categories = PrimaryCategory::with('secondary')->get();
        return view('owner.products.create', compact('owner', 'categories'));
    }
    public function store(ProductRequest $request)
    {
        Log::info('Request data: ', $request->all());
        // $request->validate([
        //     'shop_id' => ['required', 'integer'],
        //     'name' => ['required', 'string', 'max:255'],
        //     'information' => ['required', 'string', 'max:255'],
        //     'price' => ['required', 'integer'],
        //     'is_selling' => ['required', 'integer'],
        //     'sort_order' => ['required', 'integer'],
        //     'secondary_category_id' => ['required', 'integer'],
        // ]);
        try {
            DB::transaction(function () use ($request) {
                $product = Product::create([
                    'company_id' => $request->company_id,
                    'name' => $request->name,
                    'information' => $request->information,
                    'price' => $request->price,
                    'is_selling' => 1,
                    'sort_order' => 1,
                    'secondary_category_id' => $request->secondary_category_id,
                ]);
                Stock::create([
                    'product_id' => $product->id,
                    'type' => 1,
                    'quantity' => 1000,
                ]);
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        return redirect()
            ->route('owner.products.index')
            ->with('message', '求人登録を実施しました。');
    }

    public function edit($id)
    {

        $product = Product::find($id);
        if ($product === null) {
            return redirect()
                ->route('owner.products.index')
                ->with('message', '指定された求人が見つかりませんでした。');
        }

        $quantity = Stock::where('product_id', $id)->sum('quantity');

        // $shops = Shop::where('owner_id', Auth::id())
        //     ->select('id', 'name')
        //     ->get();
        $shops = Company::where('id', Owner::find(Auth::id())->company->id)
            ->select('id', 'name')
            ->get();

        $categories = PrimaryCategory::with('secondary')->get();

        return view('owner.products.edit', compact('product', 'shops', 'categories', 'quantity'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        // if ($product === null) {
        //     return redirect()
        //         ->route('owner.products.index')
        //         ->with('message', '指定された求人が見つかりませんでした。');
        // }

        // $request->validate([
        //     'shop_id' => ['required', 'integer'],
        //     'name' => ['required', 'string', 'max:255'],
        //     'information' => ['required', 'string', 'max:255'],
        //     'price' => ['required', 'integer'],
        //     'is_selling' => ['required', 'integer'],
        //     'sort_order' => ['required', 'integer'],
        //     'secondary_category_id' => ['required', 'integer'],
        // ]);

        try {
            DB::transaction(function () use ($request, $product) {
                $product->fill([
                    'shop_id' => $request->shop_id,
                    'name' => $request->name,
                    'information' => $request->information,
                    'price' => $request->price,
                    'is_selling' => 1,
                    'sort_order' => 1,
                    'secondary_category_id' => $request->secondary_category_id,
                ])->save();

                // $newQuantity = 0;
                // if ($request->type === '1') {
                //     $newQuantity = $request->quantity;
                // } else if ($request->type === '2') {
                //     $newQuantity = $request->quantity * -1;
                // }

                Stock::create([
                    'product_id' => $product->id,
                    'type' => 1,
                    'quantity' => 10,
                ]);
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            return redirect()
                ->route('owner.products.edit', ['product' => $id])
                ->with('message', '求人情報の更新に失敗しました。');
        }

        return redirect()
            ->route('owner.products.index')
            ->with('message', '求人情報を更新しました。');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product === null) {
            return redirect()
                ->route('owner.products.index')
                ->with('message', '指定された求人が見つかりませんでした。');
        }

        try {
            DB::transaction(function () use ($product) {
                $product->delete();
                Stock::where('product_id', $product->id)->delete();
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            return redirect()
                ->route('owner.products.index')
                ->with('message', '求人情報の削除に失敗しました。');
        }

        return redirect()
            ->route('owner.products.index')
            ->with('message', '求人情報を削除しました。');
    }
}
