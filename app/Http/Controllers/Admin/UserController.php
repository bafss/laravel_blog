<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function hello(){
        session(['name'=>'llz']);
        var_dump(session('name'));
        return "hello";
    }
}
