<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function login() {
        $categories = DB::table('category_products')->where('cat_status', 1)->orderBy('cat_id', 'desc')->get();
        $brands = DB::table('brand_products')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();

        return view('pages.checkout.login-checkout', compact('categories', 'brands'));
    }

    public function addCustomer(Request $request) {

    }
}
