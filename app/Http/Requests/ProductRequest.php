<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;
use App\Models\Stock;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            // 'description' => 'required|string',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function update(ProductRequest $request)
    {
        $product = Product::findOrFail($request->id);
        $quantity = Stock::where('product_id', $product->id)->sum(('quantity'));
        if ($request->current_quantity !== $quantity) {
            $id = $request->route()->parameter('product');
            return redirect()->route('owner.products.edit', ['product' => $id])
                ->with('message', '在庫数が変更されています。再度入力してください。');
        }
    }
}
