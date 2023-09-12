<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\SecondaryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function industryCreate()
    {
        return view('admin.industry.create');
    }
    public function industryMake(Request $request,)
    {
        // $categoryName = $request->all(); //入力値を受け取り

        // unset($categoryName['_token']); //不要な「_token」の削除
        // $categoryName['primary_category_id'] = 1; //primary_category_idを1に設定
        // SecondaryCategory::create($categoryName); //DBに保存

        $category = new SecondaryCategory;
        $category->primary_category_id = 1;
        $category->sort_order = 100000;
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.industry.index');
    }
    public function industryIndex()
    {
        $secondaryCategories = SecondaryCategory::all();
        return view('admin.industry.index', compact('secondaryCategories'));
    }
    public function industryEdit($id)
    {
        $category = SecondaryCategory::find($id);
        return view('admin.industry.edit', compact('category'));
    }
    public function industryUpdate(Request $request, $id)
    {
        //入力値を受け取り
        $post = $request->all();

        unset($post['_token']);
        unset($post['_method']);
        SecondaryCategory::where(['id' => $id])->update($post);

        return redirect()->route('admin.industry.index');
    }
    public function industryDelete($id)
    {
        $category = SecondaryCategory::find($id);
        $category->delete();
        return redirect()->route('admin.industry.index');
    }
    //
    public function featureCreate()
    {
        return view('admin.feature.create');
    }
    public function featureMake(Request $request,)
    {
        $category = new Feature;
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.feature.index');
    }
    public function featureIndex()
    {
        $secondaryCategories = Feature::all();
        return view('admin.feature.index', compact('secondaryCategories'));
    }
    public function featureEdit($id)
    {
        $category = Feature::find($id);
        return view('admin.feature.edit', compact('category'));
    }
    public function featureUpdate(Request $request, $id)
    {
        //入力値を受け取り
        $post = $request->all();

        unset($post['_token']);
        unset($post['_method']);
        Feature::where(['id' => $id])->update($post);

        return redirect()->route('admin.feature.index');
    }
    public function featureDelete($id)
    {
        $category = Feature::find($id);
        $category->delete();
        return redirect()->route('admin.feature.index');
    }
}
