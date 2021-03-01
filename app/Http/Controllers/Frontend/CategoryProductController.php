<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryProductController extends Controller
{
    public function __construct()
    {
    }

    public function index($catId) {
        $categories = DB::table('category_products')->where('cat_status', 1)->orderBy('cat_id', 'desc')->get();
        $brands = DB::table('brand_products')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();

        $products = DB::table('products')
            ->join('category_products', 'category_products.cat_id', '=', 'products.cat_id')
            ->where('product_status', 1)
            ->where('products.cat_id', $catId)
            ->get();

        $catName = DB::table('category_products')->where('cat_id', $catId)->first();

        return view('pages.categories.index', compact('categories', 'brands', 'products', 'catName'));
    }
}
