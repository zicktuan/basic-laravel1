<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class MenuController extends Controller
{
    public function manage() {
        $request = route('menu-api.getMenu');
        $data = Http::get($request)->json();

        foreach ($data['items'] as $item) {
            $dataCat = DB::table($item['menu_type'])->where('id', $item['object_id'])->get();
//            switch ($item['menu_type']) {
//                case 'categories':
//                    $table = 'pages';
//                    $dataCat = DB::table($table)->where('id', $item['object_id'])->get();
//                    break;
//            }
            dd($dataCat);
        }

        return view('admin.menus.manage', compact('data'));
    }

    public function create() {
        return view('admin.menus.add');
    }
}
