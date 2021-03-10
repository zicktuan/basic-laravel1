<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class PageController extends Controller
{
    public function create() {
        return view('admin.pages.form');
    }

    public function edit($id) {
        $page = DB::table('pages')->where('id', $id)->first();
        return view('admin.pages.form', compact('page'));
    }

    public function manage() {
        $request = route('page-api.getPage');
        $data = Http::get($request)->json();
        return view('admin.pages.manage', compact('data'));
    }
}
