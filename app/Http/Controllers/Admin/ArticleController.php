<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class ArticleController extends Controller
{
    public function hello(){
        session(['name'=>'llz']);
        var_dump(session('name'));
        return "hello";
    }
}
