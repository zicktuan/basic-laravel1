<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Menu\HandleParamRequest\CreateMenu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\Menu\MenuRes;
use App\Exceptions\Menu\RequestParams;
use App\Exceptions\Menu\HandleParamRequest\UpdateMenu;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    protected $table = 'menus';

    public function getMenu() {
        $response = new MenuRes();

        $response->setItems(new RequestParams());

        return response()->json($response->toArray());

    }

    public function create(Request $request) {

        $data = new CreateMenu();

        $data->setName($request->name);
        $data->setSlug($request->slug);
        $data->setUrl($request->url);
        $data->setDescription($request->description);
        $data->setMenuType($request->menu_type);
        $data->setObjectId($request->object_id);
        $data->dataCreate();
        return response()->json($data->toArray());

    }

    public function update($id, Request $request) {
        $data = new UpdateMenu();
        $data->setId($id);
        $data->setName($request->name);
        $data->setSlug($request->slug);
        $data->setUrl($request->url);
        $data->setDescription($request->description);
        $data->setMenuType($request->menu_type);
        $data->setObjectId($request->object_id);

        $data->handelUpdate();

        return response()->json([
            'code' => 200,
            'massage' => 'success',
            'item' => $data->toArray()
        ]);
    }

    public function delete($id) {
        $query = DB::table($this->table)->where('id', $id)->delete();
        if ($query) {
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ]);
        } else {
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ]);
        }
    }
}
