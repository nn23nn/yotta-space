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
            Route::get('/', ['as' => 'permission.list', 'uses' => 'PermissionController@index', 'middleware' => ['permission:LIST_PERMISSION']]);

            Route::post('/saveGroupConfig', ['as' => 'permission.saveGroupConfig', 'uses' => 'PermissionController@saveGroupConfig', 'middleware' => ['permission:UP_PERM_GROUP']]);
            Route::get('/destoryGroupConfig/{id}', ['as' => 'permission.destoryGroupConfig', 'uses' => 'PermissionController@destoryGroupConfig', 'middleware' => ['permission:DEL_PERM_GROUP']]);
            Route::get('/createGroupConfig', ['as' => 'permission.createGroupConfig', 'uses' => 'PermissionController@createGroupConfig', 'middleware' => ['permission:ADD_PERM_GROUP']]);
            Route::get('/editGroupConfig/{permissionGroupConfig}', ['as' => 'permission.editGroupConfig', 'uses' => 'PermissionController@editGroupConfig', 'middleware' => ['permission:UP_PERM_GROUP']]);

            Route::get('/permissionList/{permissionGroupConfig}', ['as' => 'permission.permissionList', 'uses' => 'PermissionController@permissionList', 'middleware' => ['permission:LIST_PERMISSION']]);
            Route::get('/editPermission/{permission}', ['as' => 'permission.editPermission', 'uses' => 'PermissionController@editPermission', 'middleware' => ['permission:UP_PERMISSION']]);
            Route::get('/createPermission', ['as' => 'permission.createPermission', 'uses' => 'PermissionController@createPermission', 'middleware' => ['permission:ADD_PERMISSION']]);
            Route::post('/savePermission', ['as' => 'permission.savePermission', 'uses' => 'PermissionController@savePermission', 'middleware' => ['permission:UP_PERMISSION']]);
            Route::post('/destoryPermission', ['as' => 'permission.destoryPermission', 'uses' => 'PermissionController@destoryPermission', 'middleware' => ['permission:DEL_PERMISSION']]);
        });

        Route::group(['prefix' => 'role'], function () {
            Route::get('/', ['as' => 'role.list', 'uses' => 'RoleController@index', 'middleware' => ['permission:LIST_ROLE']]);
            Route::post('/save', ['as' => 'role.save', 'uses' => 'RoleController@save', 'middleware' => ['permission:UP_ROLE']]);
            Route::get('/destroy/{id}', ['as' => 'role.destroy', 'uses' => 'RoleController@destroy', 'middleware' => ['permission:DEL_ROLE']]);
            Route::get('/edit/{role}', ['as' => 'role.edit', 'uses' => 'RoleController@edit', 'middleware' => ['permission:UP_ROLE']]);
            Route::get('/create', ['as' => 'role.create', 'uses' => 'RoleController@create', 'middleware' => ['permission:ADD_ROLE']]);
            Route::get('/userList/{role}', ['as' => 'role.userList', 'uses' => 'RoleController@userList', 'middleware' => ['permission:VIEW_USER_ROLE']]);
            Route::post('/destoryUser/{role}', ['as' => 'role.destoryUser', 'uses' => 'RoleController@destoryUser', 'middleware' => ['permission:DEL_USER_ROLE']]);
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
});
