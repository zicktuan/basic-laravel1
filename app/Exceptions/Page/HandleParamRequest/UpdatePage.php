<?php

    namespace App\Exceptions\Page\HandleParamRequest;


    use Illuminate\Support\Facades\DB;

    final class UpdatePage extends HandleRequestParam
    {
        public function handelUpdate() {
            $data = [
                'title' => $this->getTitle(),
                'slug' => $this->getSlug(),
                'content' => $this->getContent()
            ];


            $result = DB::table('pages')->where('id', $this->getId())->update($data);

            if ($result) {

                return $data;

            }


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
