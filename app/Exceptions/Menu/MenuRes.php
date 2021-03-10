<?php

    namespace App\Exceptions\Menu;

    final class MenuRes extends MenuResAbs
    {

        /**
         * @var array
         */
        protected $items;

        /**
         * @param $items
         */
        public function setItems(RequestParams $items) {

            $this->items = $items->dataResult();
        }

        /**
         * @return array
         */
        public function getItems() {
            return $this->items;
        }


    }
