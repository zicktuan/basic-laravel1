<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index() {
        $categories = DB::table('category_products')->where('cat_status', 1)->orderBy('cat_id', 'desc')->get();
        $brands = DB::table('brand_products')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();

        return view('pages.cart.index', compact('categories', 'brands'));
    }

    public function save(Request $request) {

        $productId = $request->product_id_hidden;

        $productInfo = DB::table('products')->where('product_id', $productId)->first();

        $data['id'] = $productId;
        $data['name'] = $productInfo->product_name;
        $data['price'] = $productInfo->product_price;
        $data['qty'] = $request->quantity;
        $data['weight'] = !empty($request->weight) ? $request->weight : 123;
        $data['options']['image'] = $productInfo->product_image;

        Cart::add($data);

        return redirect()->route('cart.index');

    }

    public function update($rowId, Request $request) {
        Cart::update($rowId, $request->quantity);
        return redirect()->route('cart.index');
    }

    public function delete($rowId) {
        Cart::remove($rowId);
        return redirect()->route('cart.index');
    }

}
