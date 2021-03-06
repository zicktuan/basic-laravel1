<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        $categories = DB::table('category_products')->where('cat_status', 1)->orderBy('cat_id', 'desc')->get();
        $brands = DB::table('brand_products')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $products = DB::table('products')->where('product_status', 1)->orderBy('product_id', 'desc')->limit(6)->get();
        return view('pages.home', compact('categories', 'brands', 'products'));
    }
}
