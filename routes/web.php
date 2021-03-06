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

//Pages Routes...
Route::get('/','PagesController@home')->name('pages.home');
Route::get('quienes-somos','PagesController@about')->name('pages.about');
Route::get('archivo','PagesController@archive')->name('pages.archive');
Route::get('contacto','PagesController@contact')->name('pages.contact');





Route::get('blog/{post}','PostsController@show')->name('posts.show');
Route::get('categorias/{category}','CategoriesController@show')->name('categories.show');
Route::get('tags/{tag}','TagsController@show')->name('tags.show');

Route::group(['prefix' => 'admin', 
		    'namespace' => 'Admin', 
		    'middleware' => 'auth'], 
    function() {
    //Admin Routes...

    Route::get('/','AdminController@index')->name('dashboard');
    //Posts
    Route::resource('posts','PostsController',[ 'except' => 'show', 'as' => 'admin' ]);

    //Users
    Route::resource('users','UsersController',[ 'as' => 'admin' ]);

    //Roles
    Route::resource('roles','RolesController',[ 'except' => 'show', 'as' => 'admin']);

    //Permissions
    Route::resource('permissions','PermissionsController',[ 'only' => ['index','edit','update'], 'as' => 'admin']);

    //UsersRoles
    Route::middleware('role:Admin')
        ->put('admin/{user}/roles','UsersRolesController@update')
        ->name('admin.users.roles.update');

    //UsersPermissions
    Route::middleware('role:Admin')
        ->put('admin/{user}/permissions','UsersPermissionsController@update')
        ->name('admin.users.permissions.update');

    //Photos
	Route::post('posts/{post}/photos','PhotosController@store')->name('admin.posts.photos.store');

	Route::delete('posts/{photo}','PhotosController@destroy')->name('admin.photos.destroy');
});


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');



// Registration Routes...
 //Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');
