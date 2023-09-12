<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
use App\Models\SecondaryCategory;
use App\Models\PrimaryCategory;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'name',
        'information',
        'price',
        'is_selling',
        'sort_order',
        'secondary_category_id',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function category()
    {
        return $this->belongsTo(SecondaryCategory::class, 'secondary_category_id');
    }
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
    public function users()
    { {
            return $this->belongsToMany(User::class, 'carts')
                ->withPivot('id', 'quantity');
        }
    }
    public function scopeAvailableItems($query)
    {
        $stock = DB::table('t_stocks')
            ->select(
                'product_id',
                DB::raw('sum(quantity) as quantity')
            )
            ->groupBy('product_id')
            ->having('quantity', '>=', 1);
        return $query->joinSub($stock, 'stock', function ($join) {
            $join->on('products.id', '=', 'stock.product_id');
        })
            ->join('companies', 'products.company_id', '=', 'companies.id')
            ->join('secondary_categories', 'products.secondary_category_id', '=', 'secondary_categories.id')
            ->where('products.is_selling', true)
            ->select(
                'products.id as id',
                'products.name as name',
                'products.price as price',
                'products.information as information',
                'secondary_categories.name as secondary_category_name',
                'companies.name as company_name',
                'companies.id as company_id',
                'stock.quantity as quantity'
            );
        // ->get();
    }
    public function scopeSelectCategory($query, $categoryId)
    {
        if ($categoryId !== '0') {
            return $query->where('secondary_categories_id', $categoryId);
        } else {
            return;
        }
    }
}
