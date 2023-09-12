<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
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

class AccountController extends Controller
{

    public function index()
    {
        // $owners = Owner::select('id', 'name', 'email', 'created_at')->get();
        $owners = Owner::with("company")->get();
        return view('admin.owners.account.index', compact('owners'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('admin.owners.account.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Owner::class],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try {
            DB::transaction(function () use ($request) {
                $owner = Owner::create([
                    'name' => $request->name,
                    'company_id' => intval($request->company_id),
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                Shop::create([
                    'owner_id' => $owner->id,
                    'name' => '店舗名未設定',
                    'information' => '店舗情報未設定',
                    'filename' => '店舗画像未設定',
                    'is_selling' => true
                ]);
            });
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }


        return redirect()
            ->route('admin.owners.account.index')
            ->with('message', 'オーナー登録を実施しました。');
    }

    public function edit($id)
    {
        // ddd("aaaa");
        $owner = Owner::findOrFail($id);
        return view('admin.owners.account.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['nullable', 'confirmed'],
        ]);

        $owner = Owner::findOrFail($id);
        $owner->name = $request->name;
        $owner->email = $request->email;
        // if ($request->filled('password')) {
        //     $owner->password = Hash::make($request->password);
        // }
        $owner->save();

        return redirect()
            ->route('admin.owners.account.index')
            ->with('message', 'オーナー情報を更新しました。');
    }

    public function destroy($id)
    {
        Owner::findOrFail($id)->delete();
        return redirect()
            ->route('admin.owners.account.index')
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
}
