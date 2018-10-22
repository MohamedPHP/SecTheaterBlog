<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'FrontendManagerController@index');

// View Post
Route::get('/post/{id}/{title?}', 'FrontendManagerController@single');

// Add Comment
Route::post('/addComment/{post_id}', 'FrontendManagerController@addComment')->name('comments.add');

// Remove Comment
Route::get('/removeComment/{comment_id}/', 'FrontendManagerController@removeComment')->name('comment.remove');

// Add Like
Route::get('/addLike/{post_id}', 'FrontendManagerController@addLike')->name('likes.add');

// Remove Likes
Route::get('/removeLike/{post_id}', 'FrontendManagerController@removeLike')->name('likes.remove');

Auth::routes();
