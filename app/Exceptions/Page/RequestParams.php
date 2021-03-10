<?php

    namespace App\Exceptions\Page;


    use Illuminate\Support\Facades\DB;

    class RequestParams extends PageResonseAbs
    {
        private $table = 'pages';

        /**
         * @var string
         */
        protected $columns = '*';


        /**
         * @param $columns
         */
        public function setColumns( $columns ) {
            $this->columns = $columns;
        }

        /**
         * @return string
         */
        public function getColumns() {
            return $this->columns;
        }


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
