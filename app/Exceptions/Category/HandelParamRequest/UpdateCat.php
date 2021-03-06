<?php

    namespace App\Exceptions\Category\HandelParamRequest;


    use Illuminate\Support\Facades\DB;

    final class UpdateCat extends HandelParamRequest
    {
        public function handelUpdate() {
            $data = [
                'name' => $this->getName(),
                'slug' => $this->getSlug(),
                'parent_id' => $this->getParenId(),
                'description' => $this->getDescription()
            ];


            $result = DB::table('categories')->where('id', $this->getId())->update($data);

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
