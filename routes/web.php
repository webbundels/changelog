<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'changelog.',
    'prefix' => 'changelog',
    'middleware' => ['web', 'auth.basic']
], function()
{
    # Index
    Route::get('/',                     ['as' => 'index',               'uses' => 'webbundels\changelog\Http\Controllers\ChangelogController@index']);

    # Create
    Route::get('create',               ['as' => 'create',              'uses' => 'webbundels\changelog\Http\Controllers\ChangelogController@create']);
    Route::post('create',              ['as' => 'store',               'uses' => 'webbundels\changelog\Http\Controllers\ChangelogController@store']);

    # Edit
    Route::get('{id}',                  ['as' => 'edit',                'uses' => 'webbundels\changelog\Http\Controllers\ChangelogController@edit']);
    Route::post('{id}',                 ['as' => 'update',              'uses' => 'webbundels\changelog\Http\Controllers\ChangelogController@update']);

    Route::get('{id}/delete',           ['as' => 'delete',              'uses' => 'webbundels\changelog\Http\Controllers\ChangelogController@delete']);
});
