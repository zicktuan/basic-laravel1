<?php

    namespace App\Exceptions\Category\HandelParamRequest;

    Abstract class HandelParamRequest {

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
        protected $parentId;

        /**
         * @var int
         */
        protected $id;

        /**
         * @var string
         */
        protected $description;

        /**
         * @param $title
         */
        public function setName($name) {
            $this->name = $name;
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
            $this->slug = $slug;
        }

        /**
         * @return string
         */
        public function getSlug() {
            return $this->slug;
        }

        /**
         * @param $parenId
         */
        public function setParenId($parenId) {
            $this->parentId = $parenId;
        }

        /**
         * @return string
         */
        public function getParenId() {
            return $this->parentId;
        }

        /**
         * @param $description
         */
        public function setDescription($description) {
            $this->description = $description;
        }

        /**
         * @return string
         */
        public function getDescription() {
            return $this->description;
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