<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exceptions\Category\HandelParamRequest\CreateCategory;
use Illuminate\Support\Str;
use App\Exceptions\Category\CategoryRes;
use App\Exceptions\Category\RequestParams;
use App\Exceptions\Category\HandelParamRequest\UpdateCat;

class CategoryController extends Controller
{
    protected $table = 'categories';

    public function getCat() {

        $response = new CategoryRes();

        $response->setSort(isset($_GET['sort']) ? $_GET['sort'] : '');
        $response->setLimit(isset($_GET['limit']) ? $_GET['limit'] : 30);
        $response->setPage(isset($_GET['page']) ? $_GET['page'] : 1);

        $response->setItems(new RequestParams());

        return response()->json($response->toArray());
    }

    public function create(Request $request) {
        $data = new CreateCategory();

        $data->setName($request->cat_name);
        $data->setSlug(!empty($request->cat_slug) ? $request->cat_slug : Str::slug($request->cat_name));
        $data->setParenId($request->parent_id);
        $data->setDescription($request->cat_desc);
        $data->dataCreate();
        return response()->json([
            'code' => 200,
            'massage' => 'success',
            'item' => $data->toArray()
        ]);

    }

    public function getDetail($id) {
        $data = DB::table($this->table)->find($id);
        return response()->json($data);
    }

    public function update($id, Request $request) {

        $data = new UpdateCat();
        $data->setName($request->cat_name);
        $data->setSlug(!empty($request->cat_slug) ? $request->cat_slug : Str::slug($request->cat_name));
        $data->setParenId($request->parent_id);
        $data->setDescription($request->cat_desc);
        $data->setId($id);

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
