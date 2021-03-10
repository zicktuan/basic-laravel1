<?php

    namespace App\Exceptions\Page\HandleParamRequest;


    use Illuminate\Support\Facades\DB;

    final class CreatePage extends HandleRequestParam
    {

        public function dataCreate() {
            $data = [
                'title' => $this->getTitle(),
                'slug' => $this->getSlug(),
                'content' => $this->getContent()
            ];


            $result = DB::table('pages')->insertGetId($data);

            if ($result) {

                $this->setId($result);

            }

            return $data;

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
