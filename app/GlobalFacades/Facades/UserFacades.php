<?php

namespace app\GlobalFacades\Facades;

use Illuminate\Support\Facades\Facade;

class UserFacades extends Facade {
   protected static function getFacadeAccessor() { return 'user'; }
}