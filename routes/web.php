<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'changelog.',
    'prefix' => 'changelog',
    'middleware' => ['web', 'auth.basic']
], function()
{
    # Index
    Route::get('/',                     ['as' => 'index',               'uses' => 'Webbundels\Changelog\Http\Controllers\ChangelogController@index']);

    # Create
    Route::get('create',               ['as' => 'create',              'uses' => 'Webbundels\Changelog\Http\Controllers\ChangelogController@create']);
    Route::post('create',              ['as' => 'store',               'uses' => 'Webbundels\Changelog\Http\Controllers\ChangelogController@store']);

    # Edit
    Route::get('{id}',                  ['as' => 'edit',                'uses' => 'Webbundels\Changelog\Http\Controllers\ChangelogController@edit']);
    Route::post('{id}',                 ['as' => 'update',              'uses' => 'Webbundels\Changelog\Http\Controllers\ChangelogController@update']);

    Route::get('{id}/delete',           ['as' => 'delete',              'uses' => 'Webbundels\Changelog\Http\Controllers\ChangelogController@delete']);
});
