<?php

    namespace App\Exceptions\Page\HandleParamRequest;

    Abstract class HandleRequestParam {

        /**
         * @var string
         */
        protected $title;

        /**
         * @var string
         */
        protected $slug;

        /**
         * @var string
         */
        protected $content;

        /**
         * @var int
         */
        protected $id;

        /**
         * @param $title
         */
        public function setTitle($title) {
            $this->title = $title;
        }

        /**
         * @return string
         */
        public function getTitle() {
            return $this->title;
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
         * @param $content
         */
        public function setContent($content) {
            $this->content = $content;
        }

        /**
         * @return string
         */
        public function getContent() {
            return $this->content;
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