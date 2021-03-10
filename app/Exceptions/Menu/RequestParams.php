<?php

    namespace App\Exceptions\Menu;

    use App\Exceptions\Menu\MenuResAbs;
    use Illuminate\Support\Facades\DB;

    class RequestParams extends MenuResAbs
    {
        private $table = 'menus';


        public function dataResult() {

            $data = DB::table($this->table)->get();

            return $data;

        }

    }
