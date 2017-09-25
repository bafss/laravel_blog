<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Model\User;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        echo config('app.personal_key');
//        $pdo = DB::connection()->getPdo();
//        var_dump($pdo);
        $users = DB::table('user')->where('user_id',1)->get();
        var_dump($users);
        $users = DB::table('user')->where('user_id','>',1)->get();
        var_dump($users);
        $users = User::where('user_id',1)->get();
        var_dump($users);
        $user = User::find(2);
        var_dump($user);
        $user->user_name = 'lyz';
        $user->update();
        $name = "首页";
        $data = [
            'name' => $name,
        ];
//        return view("index")->with($data);
        return view("index",compact('data','name'));
    }
}
