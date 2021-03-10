<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Exceptions\Page\HandleParamRequest\CreatePage;
use Illuminate\Http\Request;
use App\Exceptions\Page\HandleParamRequest\UpdatePage;
use App\Exceptions\Page\RequestParams;
use App\Exceptions\Page\PageRespone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageController extends Controller
{
    protected $table = 'pages';

    public function getPage() {

        $response = new PageRespone();

        $response->setSort(isset($_GET['sort']) ? $_GET['sort'] : '');
        $response->setLimit(isset($_GET['limit']) ? $_GET['limit'] : 30);
        $response->setPage(isset($_GET['page']) ? $_GET['page'] : 1);

        $response->setItems(new RequestParams());

        return response()->json($response->toArray());

    }

    public function create(Request $request) {
        $data = new CreatePage();

        $data->setTitle($request->page_title);
        $data->setSlug(!empty($request->page_slug) ? $request->page_slug : Str::slug($request->page_title));
        $data->setContent($request->page_content);
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

        $data = new UpdatePage();
        $data->setTitle($request->page_title);
        $data->setSlug(!empty($request->page_slug) ? $request->page_slug : Str::slug($request->page_title));
        $data->setContent($request->page_content);
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
