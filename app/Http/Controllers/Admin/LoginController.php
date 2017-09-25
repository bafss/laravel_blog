<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

require_once '../resources/org/code/Code.class.php';
class LoginController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function login_post(){
        $inputs = Input::all();
        var_dump($inputs);
        $code = new \Code();
        $_code = $code->get();
        var_dump($_code);
        var_dump($inputs['code']);
        if($_code != strtoupper($inputs['code'])){
            return back()->with('msg','验证码错误');
        }
        echo "ok";
//        return view('admin.login');
    }
    public function code()
    {
//        session(['aa'=>'valuddde']);
        $code = new \Code;
        $code->make();
    }

    public function getcode()
    {
        $a = session('aa');
        var_dump($a);
        $code = new \Code;
        echo $code->get();
    }
}
