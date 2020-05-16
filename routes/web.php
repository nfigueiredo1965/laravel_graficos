<?php

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Arr;

$this->group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    $this->any('users/search', 'UserController@search')->name('users.search');
    $this->resource('users', 'UserController');

    $this->any('products/search', 'ProductController@search')->name('products.search');
    $this->resource('products', 'ProductController');

    $this->any('categories/search', 'CategoryController@search')->name('categories.search');
    $this->resource('categories', 'CategoryController');

    $this->get('/', 'DashboardController@index')->name('admin');

    $this->get('charts', 'ChartController@months')->name('chats.months');
    $this->get('charts/year', 'ChartController@years')->name('chats.years');
    $this->get('charts/vue', 'ChartController@vue')->name('chats.vue');
    $this->get('charts/vue/months', 'ReportsApiController@Months')->name('chats.months.vue');
});

Auth::routes(['register' => false]);
Route::get('logout','Auth\LoginController@logout');

Route::get('/', 'SiteController@index');

Route::get('teste', function(){
    $mes = ['jan','fev','nov','dez','mar','abr'];
    $primeiro = Arr::first($mes);
    $ultimo = Arr::last($mes);
    $sorted = rsort($mes);
    
    dd($sorted);
});


