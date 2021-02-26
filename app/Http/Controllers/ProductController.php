<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index() {
        $products = DB::table('products')
            ->join('category_products', 'products.cat_id', '=', 'category_products.cat_id')
            ->join('brand_products', 'products.brand_id', '=', 'brand_products.brand_id')
            ->orderBy('product_id', 'desc')
            ->paginate(5);

        return view('admin.product.index', compact('products'));
    }

    public function create() {
        $categories = DB::table('category_products')->get();
        $brands = DB::table('brand_products')->get();
        return view('admin.product.add', compact('categories', 'brands'));
    }

    public function store(Request $request) {
        $rules = [
            'product_name' => 'required',
            'product_price' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->to('products/create');
        } else {
            $getImage = $request->file('product_image');
            if ($getImage) {
                $getNameImage = $getImage->getClientOriginalName();
                $nameImage    = current(explode('.'.$getImage->getClientOriginalExtension(), $getNameImage));

                $newImage = $nameImage.rand(0, 99).'.'.$getImage->getClientOriginalExtension();
                $getImage->move('public/uploads/products', $newImage);
            }

            $this->product->create([
                'product_name' => $request->product_name,
                'product_status' => $request->product_status,
                'product_desc' => !empty($request->product_desc) ? $request->product_desc : '',
                'product_content' => !empty($request->product_content) ? $request->product_content : '',
                'product_price' => !empty($request->product_price) ? $request->product_price : '',
                'cat_id' => $request->product_cat,
                'brand_id' => $request->product_brand,
                'product_image' => $newImage ? $newImage : '',
            ]);

            return redirect()->route('products.index');
        }
    }


    public function edit($id) {
        $product = DB::table('products')->where('product_id', $id)->first();
        $categories = DB::table('category_products')->get();
        $brands = DB::table('brand_products')->get();
        return view('admin.product.edit', compact('product', 'categories', 'brands'));
    }

    public function update($id, Request $request) {
        $getImage = $request->file('product_image');

        if ($getImage) {
            $getNameImage = $getImage->getClientOriginalName();
            $nameImage = current(explode('.'.$getImage->getClientOriginalExtension(), $getNameImage));
            $newImage = $nameImage.rand(0,99).'.'.$getImage->getClientOriginalExtension();
            $getImage->move('public/uploads/products', $newImage);
        }

        DB::table('products')->where('product_id', $id)->update([
            'product_name' => $request->product_name,
            'product_desc' => !empty($request->product_desc) ? $request->product_desc : '',
            'product_content' => !empty($request->product_content) ? $request->product_content : '',
            'product_price' => !empty($request->product_price) ? $request->product_price : '',
            'cat_id' => $request->product_cat,
            'brand_id' => $request->product_brand,
            'product_image' => !empty($newImage) ? $newImage : '',
        ]);
        return redirect()->route('products.index');
    }


    public function delete($id) {
    }




    public function unactive($id) {
        $this->product->where('product_id', $id)->update(['product_status' => 0]);
        return redirect()->route('products.index');
    }

    public function active($id) {
        $this->product->where('product_id', $id)->update(['product_status' => 1]);
        return redirect()->route('products.index');
    }
}
