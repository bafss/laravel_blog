<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']],function(){
    Route::get('/', 'Home\IndexController@index');
    Route::get('hello', 'Admin\UserController@hello');
});

Route::group(['middleware'=>'test'],function(){
    Route::get('/write',function(){

    });
});
Route::get('/refuse',['as'=>'refuse',function(){
    var_dump(route('refuse'));
    var_dump(route('admin::write'));
    return "少年禁止入内";
}]);

Route::group(['prefix'=>'admin','namespace'=>'Admin','as'=>'admin::'],function(){
    Route::group(['middleware'=>['test']],function(){
        Route::get('/','IndexController@index');
        Route::get('/login','LoginController@login');
        Route::post('/login','LoginController@login_post');
        Route::get('/code','LoginController@code');
        Route::get('/getcode','LoginController@getcode');
        Route::get('/write/{age?}',['as'=>'write','uses'=>'UserController@hello'])->where(['age'=>'[12]']);
    });
});

Route::get('testCsrf',function(){
    $csrf_field = csrf_field();
    $html = <<<GET
        <form method="POST" action="/testCsrf">
            {$csrf_field}
            <input type="submit" value="Test"/>
        </form>
GET;
    return $html;
});

Route::post('testCsrf',function(){
    return 'Success!';
});