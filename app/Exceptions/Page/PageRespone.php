<?php

    namespace App\Exceptions\Page;

    final class PageRespone extends PageResonseAbs
    {
        /**
         * @var integer
         */
        protected $total;

        /**
         * @var integer
         */
        protected $totalPage;

        /**
         * @var integer
         */
        protected $perRow;


        /**
         * @var array
         */
        protected $items;

        /**
         * @var string
         */
        protected $sort;


        /**
         * Set number of total item
         * @param $total
         */
        public function setTotal($total) {
            $this->total =  is_numeric($total) ? $total : 0;
        }


        /**
         * Get number total items
         * @return int
         */
        public function getTotal() {
            return $this->total;
        }

        /**
         * @param $totalPage
         */
        public function setTotalPage($totalPage) {
            $this->totalPage = is_numeric($totalPage) ? $totalPage : 0;
        }

        /**
         * @return int
         */
        public function getTotalPage() {
            return $this->totalPage;
        }


        /**
         * @param $perRow
         */
        public function setPerRow($perRow) {
            $this->perRow = $perRow;
        }

        /**
         * @return int
         */
        public function getPerRow() {
            return $this->perRow;
        }

        /**
         * @param $items
         */
        public function setItems(RequestParams $items) {
            $items->setSort($this->getSort());
            $items->setLimit($this->getLimit());
            $items->setPage($this->getPage());
            $this->setPerRow($items->handlePerRow());
            $this->setTotal(count($items->getAllRes()));
            $this->setTotalPage($items->handelTotalPage());

            $this->items = $items->dataResult();
        }

        /**
         * @return array
         */
        public function getItems() {
            return $this->items;
        }

    }
