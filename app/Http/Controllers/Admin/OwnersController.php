<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use PhpParser\Node\Expr\Throw_;
use Throwable;
use App\Models\Product;
use App\Models\PrimaryCategory;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $company = Company::all();
        return view('admin.owners.index', compact('company'));
    }
    public function lists(Request $request)
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
        return view('admin.lists', compact('products', 'categories', 'category'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.owners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Company::create([
            'name' => $request->name,
        ]);


        // try {
        //     DB::transaction(function () use ($request) {
        //         $owner = Owner::create([
        //             'name' => $request->name,
        //             'email' => $request->email,
        //             'password' => Hash::make($request->password),
        //         ]);
        //         Shop::create([
        //             'owner_id' => $owner->id,
        //             'name' => '店舗名未設定',
        //             'information' => '店舗情報未設定',
        //             'filename' => '店舗画像未設定',
        //             'is_selling' => true
        //         ]);
        //     }, 2);
        // } catch (Throwable $e) {
        //     Log::error($e);
        //     throw $e;
        // }


        return redirect()
            ->route('admin.owners.index')
            ->with('message', '企業登録を実施しました。');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     Owner::findOrFail($id);
    //     return view('admin.owners.edit', compact('owner'));
    // }
    public function edit($id)
    {
        $owner = Company::findOrFail($id);
        return view('admin.owners.edit', compact('owner'));
    }
    public function productDelete($id)
    {
        $product =  Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.items.lists')->with('success', '商品を削除しました。');
    }
    public function update2(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->secondary_category_name = $request->input('secondary_category_name');
        $product->price = str_replace(',', '', $request->input('price')); // カンマの削除
        $product->information = $request->input('information');
        $product->save();

        return redirect()->route('admin.show', $id)->with('success', '求人情報を更新しました。');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $owner = Company::findOrFail($id);
        $owner->name = $request->name;
        $owner->save();

        return redirect()
            ->route('admin.owners.index')
            ->with('message', 'オーナー情報を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::findOrFail($id)->delete();
        return redirect()
            ->route('admin.owners.index')
            ->with('message', 'オーナー情報を削除しました。');
    }
    public function expiredOwnerIndex()
    {
        $expiredOwners = Owner::onlyTrashed()->get();
        return view('admin.expired-owners', compact('expiredOwners'));
    }
    public function expiredOwnerDestroy($id)
    {
        Owner::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()
            ->route('admin.expired-owners.index')
            ->with('message', 'オーナー情報を完全に削除しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {

        $product = DB::table('products')
            ->join('secondary_categories', 'products.secondary_category_id', '=', 'secondary_categories.id')
            ->where('products.id', '=', $id)
            ->select(
                'products.id as id',
                'products.name as name',
                'products.price as price',
                'products.company_id as company_id',
                'products.information as information',
                'secondary_categories.name as secondary_category_name'
            )
            ->first();
        $quantity = Stock::where('product_id', $id)->sum('quantity');
        if ($quantity > 1) {
            $quantity = 1;
        }
        if ($product == null)
            abort(404);

        return view('admin.show', compact('product', 'quantity'));
    }
}
