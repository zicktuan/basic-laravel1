<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandProductController extends Controller
{
    public function index($brandId) {
        $categories = DB::table('category_products')->where('cat_status', 1)->orderBy('cat_id', 'desc')->get();
        $brands = DB::table('brand_products')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();

        $products = DB::table('products')
            ->join('brand_products', 'products.brand_id', '=', 'brand_products.brand_id')
            ->where('product_status', 1)
            ->where('products.brand_id', $brandId)
            ->get();

        $brandName = DB::table('brand_products')->where('brand_id', $brandId)->first();
        return view('pages.brands.index', compact('categories', 'brands', 'products', 'brandName'));
    }
}
