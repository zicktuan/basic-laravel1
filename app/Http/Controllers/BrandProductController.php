<?php

namespace App\Http\Controllers;

use App\Models\BrandProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BrandProductController extends Controller
{
    private $brandProduct;
    public function __construct(BrandProduct $brandProduct)
    {
        $this->brandProduct = $brandProduct;
    }

    public function index() {
        $brandProducts = $this->brandProduct->latest()->paginate(10);
        return view('admin.brand-product.index', compact('brandProducts'));
    }

    public function create() {
        return view('admin.brand-product.add');
    }

    public function store(Request $request) {
        $rules = [
            'brand_product_name' => 'required',
        ];

        $messages = [
            'brand_product_name.required' => 'Thương hiệu sản phẩm không được để trống!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('brand-product.create')->withErrors($messages)->withInput();
        } else {
            $this->brandProduct->create([
                'brand_name' => $request->brand_product_name,
                'brand_desc' => !empty($request->brand_product_desc) ? $request->brand_product_desc : '',
                'brand_status' => $request->brand_product_status,
                'brand_slug' => Str::slug($request->brand_product_name)
            ]);
            return redirect()->route('brand-product.index');
        }
    }

    public function edit($id) {
        $brandProduct = $this->brandProduct->where('brand_id',$id)->first();
        return view('admin.brand-product.edit', compact('brandProduct'));
    }

    public function update($id, Request $request) {
        $this->brandProduct->where('brand_id', $id)->update([
            'brand_name' => $request->brand_product_name,
            'brand_desc' => !empty($request->brand_product_desc) ? $request->brand_product_desc : '',
            'brand_slug' => Str::slug($request->brand_product_name)
        ]);

        return redirect()->route('brand-product.index');
    }

    public function delete($id) {
        $this->brandProduct->where('brand_id', $id)->delete();
        return redirect()->route('brand-product.index');
    }



    public function unactive($id) {
        DB::table('brand_products')->where('brand_id', $id)->update(['brand_status' => 0]);
        return redirect()->route('brand-product.index');
    }

    public function active($id) {
        DB::table('brand_products')->where('brand_id', $id)->update(['brand_status' => 1]);
        return redirect()->route('brand-product.index');
    }
}
