
<?php
// app/helpers.php

use App\Models\Users_model;


function AuthUser()
{
    // Your custom logic here
    // return 'Hello, this is a global function!';
    // if (session()->has('admin_token')) {
    // return Users_model::where('token',\Session::get('admin_token'))->first();
    // }
        return Users_model::where('token',session('admin_token'))->first();
}

?>
