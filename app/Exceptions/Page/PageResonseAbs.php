<?php

    namespace App\Exceptions\Page;

    Abstract class PageResonseAbs
    {
        protected $page;

        /**
         * @var integer
         */
        protected $limit;

        protected $sort;


        public function getPage(){
            return $this->page;
        }

        /**
         * @param $page
         */
        public function setPage($page) {
            $this->page = is_numeric($page) ? $page : 1;
        }


        public function getLimit(){
            return $this->limit;
        }

        /**
         * @param $itemPerPage
         */
        public function setLimit($limit) {
            $this->limit = is_numeric($limit) ? $limit : 10;
        }

        /**
         * @param $sort
         */
        public function setSort($sort) {
            $this->sort = $sort;
        }

        /**
         * @return string
         */
        public function getSort() {
            return $this->sort;
        }


        /**
         * Convert object to array
         * @return array
         */
        public function toArray(){

            $vars = get_object_vars ( $this );
            $array = array ();
            foreach ( $vars as $key => $value ) {
                $array [ltrim ( $key, '_' )] = $value;
            }
            return $array;
        }

    }
