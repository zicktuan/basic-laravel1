<?php

    namespace App\Exceptions\Category;

    use Illuminate\Support\Facades\DB;

    class RequestParams extends CategoryResAbs
    {
        private $table = 'categories';

        public function handelSort() {

            $sort = $this->getSort();

            $splitSort   = explode('/', $sort);

            $sortBy      = !empty(current($splitSort)) ? current($splitSort) : 'id';

            $orderBy     = !empty(count($splitSort) > 1) ? array_pop($splitSort) : 'desc';

            return [
                'sortBy' => $sortBy,
                'orderBy' => $orderBy
            ];
        }

        public function getAllRes() {
            $data = DB::table($this->table)->get();
            return $data;
        }

        public function handelTotalPage() {

            return ceil(count($this->getAllRes())/$this->getLimit());

        }

        public function handlePerRow() {
            return $this->getPage() * $this->getLimit() - $this->getLimit();
        }


        public function dataResult() {

            $sort = $this->handelSort();

            $data = DB::table($this->table)->orderBy($sort['sortBy'], $sort['orderBy'])->limit($this->limit)->get();

            return $data;

        }

    }
