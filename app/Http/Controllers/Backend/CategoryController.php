<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    private $htmlOption;

    public function __construct()
    {
        $this->htmlOption = '';
    }

    public function manage() {
        $request = route('cat-api.getCat');
        $data = Http::get($request)->json();
        return view('admin.categories.manage', compact('data'));
    }

    public function create() {
        $htmlOption = $this->catRecursive(0);
        return view('admin.categories.form', compact('htmlOption'));
    }

    public function edit($id) {
        $cat = DB::table('categories')->where('id', $id)->first();
        return view('admin.categories.form', compact('cat'));
    }


    public function catRecursive($id, $text = '') {
        $data = Category::all();
        foreach ($data as $value) {
            if ($value->parent_id == $id) {
                $this->htmlOption .= '<option>'. $text. $value->name.'</option>';
                $this->catRecursive($value->id, $text . '--');
            }
        }
        return $this->htmlOption;
    }
}
