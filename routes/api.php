<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//vullage controller

Route::post('/village/attack', [
    'uses' => 'VillageController@villageAttack',
    'middleware' => 'jwt.auth'
]);

Route::get('/village/info', [
    'uses' => 'VillageController@getVillageInfo',
    'middleware' => 'jwt.auth'
]);

//market controller

Route::get('/market/info', [
    'uses' => 'MarketController@getMarketInfo',
    'middleware' => 'jwt.auth'
]);

Route::post('/market/buy', [
    'uses' => 'MarketController@buyResources',
    'middleware' => 'jwt.auth'
]);

//army controller

Route::get('/army/fights', [
    'uses' => 'ArmyController@getFights',
    'middleware' => 'jwt.auth'
]);

Route::get('/army/villages', [
    'uses' => 'ArmyController@getVillagesInfo',
    'middleware' => 'jwt.auth'
]);


//workers controller

Route::get('/workers/stats', [
    'uses' => 'WorkerController@getStats',
    'middleware' => 'jwt.auth'
]);


Route::post('/workers/assign', [
    'uses' => 'WorkerController@assignWorkers',
    'middleware' => 'jwt.auth'
]);


//villages controller

Route::get('/villages/info', [
    'uses' => 'VillagesController@getVillagesInfo',
    'middleware' => 'jwt.auth'
]);

//settings contoller

Route::get('/settings/info', [
    'uses' => 'SettingsController@getSettings',
    'middleware' => 'jwt.auth'
]);

Route::post('/settings/village/name', [
    'uses' => 'SettingsController@setVillageName',
    'middleware' => 'jwt.auth'
]);

Route::post('/settings/village/password', [
    'uses' => 'SettingsController@setPassword',
    'middleware' => 'jwt.auth'
]);

//user controller

Route::post('/user', [
    'uses' => 'UserController@signup',
]);

Route::post('/user/signin', [
    'uses' => 'UserController@signin'
]);

Route::post('/user/signout', [
    'uses' => 'UserController@signout',
    'middleware' => 'jwt.auth'
]);