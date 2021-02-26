<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;

class CategoryProductController extends Controller
{
    private $categoryProduct;

    public function __construct(CategoryProduct $categoryProduct)
    {
        $this->categoryProduct = $categoryProduct;
    }

    public function index() {
        $catProducts = $this->categoryProduct->latest()->paginate(10);
        return view('admin.categories-product.index', compact('catProducts'));
    }

    public function create() {
        return view('admin.categories-product.add');
    }

    public function store(Request $request) {
        $this->categoryProduct->create([
            'cat_name' => $request->category_product_name,
            'cat_desc' => $request->category_product_desc,
            'cat_status' => $request->category_product_status,
        ]);

        return redirect()->route('categories-product.index');
    }

    public function edit($id) {
        $catProduct = $this->categoryProduct->where('cat_id', $id)->first();
        return view('admin.categories-product.edit', compact('catProduct'));
    }

    public function update($id, Request $request) {
        $this->categoryProduct->where('cat_id', $id)->update([
            'cat_name' => $request->category_product_name,
            'cat_desc' => $request->category_product_desc
        ]);

        return redirect()->route('categories-product.index');
    }

    public function delete($id) {
        $this->categoryProduct->where('cat_id', $id)->delete();
        return redirect()->route('categories-product.index');
    }



    public function unactive($id) {
        $this->categoryProduct->where('cat_id', $id)->update(['cat_status' => 0]);
        return redirect()->route('categories-product.index');
    }

    public function active($id) {
        $this->categoryProduct->where('cat_id', $id)->update(['cat_status' => 1]);
        return redirect()->route('categories-product.index');
    }
}
