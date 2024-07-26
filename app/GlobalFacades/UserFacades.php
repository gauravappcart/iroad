<?php
   namespace App\GlobalFacades;
   use App\Models\Material_model;

   class UserFacades{
      public function get_user() {

        $user_data=Material_model::get()->toArray();
         return $user_data;
      }
   }
?>