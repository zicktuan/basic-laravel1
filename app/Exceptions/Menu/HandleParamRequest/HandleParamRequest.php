<?php

    namespace App\Exceptions\Menu\HandleParamRequest;

    abstract class HandleParamRequest {
        /**
         * @var string
         */
        protected $name;

        /**
         * @var string
         */
        protected $slug;

        /**
         * @var string
         */
        protected $url;


        /**
         * @var string
         */
        protected $description;

        /**
         * @var string
         */
        protected $menuType;

        /**
         * @var object
         */
        protected $objectId;

        /**
         * @var int
         */
        protected $id;


        /**
         * @param $name
         */
        public function setName($name) {
            $this->name = !empty($name) ? $name : '';
        }

        /**
         * @return string
         */
        public function getName() {
            return $this->name;
        }

        /**
         * @param $slug
         */
        public function setSlug($slug) {
            $this->slug = !empty($slug) ? $slug : '';
        }

        /**
         * @return int
         */
        public function getSlug() {
            return $this->slug;
        }

        /**
         * @param $description
         */
        public function setDescription($description) {
            $this->description = !empty($description) ? $description : '';
        }

        /**
         * @return string
         */
        public function getDescription() {
            return $this->description;
        }

        /**
         * @param $url
         */
        public function setUrl($url) {
            $this->url = !empty($url) ? $url : '';
        }

        /**
         * @return string
         */
        public function getUrl() {
            return $this->url;
        }

        /**
         * @param $menuType
         */
        public function setMenuType($menuType) {
            $this->menuType = $menuType;
        }

        /**
         * @return string
         */
        public function getMenuType() {
            return $this->menuType;
        }

        /**
         * @param $objectId
         */
        public function setObjectId($objectId) {
            $this->objectId = $objectId;
        }

        public function getObjectId() {
            return $this->objectId;
        }

        /**
         * @return string
         */
        public function setId($id) {
            $this->id = $id;
        }

        /**
         * @param $content
         */
        public function getId() {
            return $this->id;
        }
    }