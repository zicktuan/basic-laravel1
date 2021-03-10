<?php

    namespace App\Exceptions\Menu\HandleParamRequest;

    use Illuminate\Support\Facades\DB;

    final class UpdateMenu extends HandleParamRequest
    {
        public function handelUpdate() {
            echo $this->getId();
            $data = [
                'name' => $this->getName(),
                'slug' => $this->getSlug(),
                'url' => $this->getUrl(),
                'description' => $this->getDescription(),
                'menu_type' => $this->getMenuType(),
                'object_id' => $this->getObjectId(),
            ];

            $result = DB::table('menus')->where('id', $this->getId())->update($data);

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
