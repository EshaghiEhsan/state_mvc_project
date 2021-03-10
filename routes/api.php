<?php

use System\Router\Api\Route;

Route::get("","HomeController@index","index");
Route::get("create","HomeController@ceate","create");
Route::post("store","HomeController@store","store");
Route::get("edit/{id}","HomeController@edit","edit");