<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function detail($productId) {
        $categories = DB::table('category_products')->where('cat_status', 1)->orderBy('cat_id', 'desc')->get();
        $brands = DB::table('brand_products')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();

        $productDetail = DB::table('products')
            ->join('category_products', 'category_products.cat_id', '=', 'products.cat_id')
            ->join('brand_products', 'brand_products.brand_id', '=', 'products.brand_id')
            ->where('product_status', 1)
            ->where('product_id', $productId)
            ->first();

        $catId = $productDetail->cat_id;

        $recommendedItems = DB::table('products')
            ->join('category_products', 'category_products.cat_id', '=', 'products.cat_id')
            ->join('brand_products', 'brand_products.brand_id', '=', 'products.brand_id')
            ->where('product_status', 1)
            ->where('products.cat_id', $catId)
            ->whereNotIn('products.product_id', [$productId])
            ->get();


        return view('pages.products.detail', compact('categories', 'brands', 'productDetail', 'recommendedItems'));
    }
}
