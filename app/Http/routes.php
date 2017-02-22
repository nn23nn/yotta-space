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
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', ['middleware' => 'alog', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('/logout', 'Auth\AuthController@getLogout');

Route::get('login/getcaptcha/', 'Auth\AuthController@getCaptcha');
Route::get('captcha/getcaptcha/{tmp}', 'CaptchaController@getCaptcha');
Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/', 'IndexController@index');
    Route::get('/home', 'IndexController@home');
    Route::get('/message', 'IndexController@message');

    Route::group(['prefix' => 'system', 'namespace' => 'System'], function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', ['as' => 'user.list', 'uses' => 'UserController@index', 'middleware' => ['permission:LIST_ADMIN']]);
            Route::post('/save', ['as' => 'user.save', 'uses' => 'UserController@save', 'middleware' => ['permission:UP_ADMIN']]);
            Route::get('/destroy/{id}', ['as' => 'user.destroy', 'uses' => 'UserController@destroy', 'middleware' => ['permission:DEL_ADMIN']]);
            Route::get('/edit/{user}', ['as' => 'user.edit', 'uses' => 'UserController@edit', 'middleware' => ['permission:UP_ADMIN']]);
            Route::get('/create', ['as' => 'user.create', 'uses' => 'UserController@create', 'middleware' => ['permission:ADD_ADMIN']]);
            Route::get('/usermenu', 'UserController@menu');
        });

        Route::group(['prefix' => 'permission'], function () {
            Route::get('/', ['as' => 'permission.list', 'uses' => 'PermissionController@index']);

            Route::post('/saveGroupConfig', ['as' => 'permission.saveGroupConfig', 'uses' => 'PermissionController@saveGroupConfig']);
            Route::get('/destoryGroupConfig/{id}', ['as' => 'permission.destoryGroupConfig', 'uses' => 'PermissionController@destoryGroupConfig']);
            Route::get('/createGroupConfig', ['as' => 'permission.createGroupConfig', 'uses' => 'PermissionController@createGroupConfig']);
            Route::get('/editGroupConfig/{permissionGroupConfig}', ['as' => 'permission.editGroupConfig', 'uses' => 'PermissionController@editGroupConfig']);

            Route::get('/permissionList/{permissionGroupConfig}', ['as' => 'permission.permissionList', 'uses' => 'PermissionController@permissionList']);
            Route::get('/editPermission/{permission}', ['as' => 'permission.editPermission', 'uses' => 'PermissionController@editPermission']);
            Route::get('/createPermission', ['as' => 'permission.createPermission', 'uses' => 'PermissionController@createPermission']);
            Route::post('/savePermission', ['as' => 'permission.savePermission', 'uses' => 'PermissionController@savePermission']);
            Route::get('/destoryPermission/{id}', ['as' => 'permission.destoryPermission', 'uses' => 'PermissionController@destoryPermission']);
        });

        Route::group(['prefix' => 'role'], function () {
            Route::get('/', ['as' => 'role.list', 'uses' => 'RoleController@index']);
            Route::post('/save', ['as' => 'role.save', 'uses' => 'RoleController@save']);
            Route::get('/destroy/{id}', ['as' => 'role.destroy', 'uses' => 'RoleController@destroy']);
            Route::get('/edit/{role}', ['as' => 'role.edit', 'uses' => 'RoleController@edit']);
            Route::get('/create', ['as' => 'role.create', 'uses' => 'RoleController@create']);
            Route::get('/userList/{role}', ['as' => 'role.userList', 'uses' => 'RoleController@userList']);
            Route::post('/destoryUser/{role}', ['as' => 'role.destoryUser', 'uses' => 'RoleController@destoryUser']);
        });
    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', ['as' => 'category.list', 'uses' => 'CategoryController@index', 'middleware' => ['permission:LIST_CATEGORY']]);
        Route::post('/save', ['as' => 'category.save', 'uses' => 'CategoryController@save', 'middleware' => ['permission:UP_CATEGORY','alog']]);
        Route::post('/destroy', ['as' => 'category.destroy', 'uses' => 'CategoryController@destroy', 'middleware' => ['permission:DEL_CATEGORY']]);
        Route::get('/edit/{category}', ['as' => 'category.edit', 'uses' => 'CategoryController@edit', 'middleware' => ['permission:UP_CATEGORY']]);
        Route::get('/create', ['as' => 'category.create', 'uses' => 'CategoryController@create', 'middleware' => ['permission:ADD_CATEGORY']]);
        Route::get('/treeview', ['as' => 'category.tree', 'uses' => 'CategoryController@treeview', 'middleware' => ['permission:LIST_CATEGORY']]);
        Route::get('/treedata', ['as' => 'category.tree', 'uses' => 'CategoryController@treedata', 'middleware' => ['permission:LIST_CATEGORY']]);
    });
    Route::group(['prefix' => 'member'], function () {
        Route::get('/', ['as' => 'member.list', 'uses' => 'MemberController@index']);
        Route::post('/save', ['as' => 'member.save', 'uses' => 'MemberController@save']);
        Route::post('/destroy', ['as' => 'member.destroy', 'uses' => 'MemberController@destroy']);
        Route::get('/edit/{member}', ['as' => 'member.edit', 'uses' => 'MemberController@edit']);
        Route::get('/create', ['as' => 'member.create', 'uses' => 'MemberController@create']);
    });
});
    Route::get('/', ['uses' => 'Index\IndexController@index']);
    Route::get('index', ['uses' => 'Index\IndexController@index']);
    Route::group(['prefix' => 'index'], function () {

    Route::get('index', ['uses' => 'Index\IndexController@index']);
    Route::get('about', ['uses' => 'Index\IndexController@about']);
    Route::get('course', ['uses' => 'Index\IndexController@course']);
    Route::get('activity', ['uses' => 'Index\IndexController@activity']);
    Route::get('contact', ['uses' => 'Index\IndexController@contact']);
    Route::get('login', ['uses' => 'Index\IndexController@login']);
    Route::post('loginEnter', ['uses' => 'Index\IndexController@loginEnter']);
    Route::get('register', ['uses' => 'Index\IndexController@register']);
    Route::post('registerEnter', ['uses' => 'Index\IndexController@registerEnter']);
    Route::post('sendCode', ['uses' => 'Index\IndexController@sendCode']);
    Route::get('getback', ['uses' => 'Index\IndexController@getback']);
    Route::post('updatePassword', ['uses' => 'Index\IndexController@updatePassword']);
     Route::post('loginout', ['uses' => 'Index\IndexController@loginout']);
      Route::get('userCenter', ['uses' => 'Index\IndexController@userCenter']);

    });
