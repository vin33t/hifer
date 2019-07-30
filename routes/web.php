<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

});

Route::get('/vendors', 'VendorController@index')->name('vendors');
Route::get('/vendor/create', 'VendorController@create')->name('vendor.create');
Route::post('/vendor/store', 'VendorController@store')->name('vendor.store');
Route::get('/vendor/edit/{id}', 'VendorController@edit')->name('vendor.edit');
Route::post('/vendor/update/{id}', 'VendorController@update')->name('vendor.update');
Route::get('/vendor/view/{id}', 'VendorController@show')->name('vendor.view');
Route::get('/vendor/delete/{id}', 'VendorController@destroy')->name('vendor.delete');


Route::get('/clients', 'ClientController@index')->name('clients');
Route::get('/client/create', 'ClientController@create')->name('client.create');
Route::post('/client/store', 'ClientController@store')->name('client.store');
Route::get('/client/edit/{id}', 'ClientController@edit')->name('client.edit');
Route::post('/client/update/{id}', 'ClientController@update')->name('client.update');
Route::get('/client/view/{id}', 'ClientController@show')->name('client.view');
Route::get('/client/delete/{id}', 'ClientController@destroy')->name('client.delete');


Route::get('/employees', 'EmployeeController@index')->name('employees');
Route::get('/employee/create', 'EmployeeController@create')->name('employee.create');
Route::post('/employee/store', 'EmployeeController@store')->name('employee.store');
Route::get('/employee/edit/{id}', 'EmployeeController@edit')->name('employee.edit');
Route::post('/employee/update/{id}', 'EmployeeController@update')->name('employee.update');
Route::get('/employee/view/{id}', 'EmployeeController@show')->name('employee.view');
Route::get('/employee/delete/{id}', 'EmployeeController@destroy')->name('employee.delete');


Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/category/create', 'CategoryController@create')->name('category.create');
Route::post('/category/store', 'CategoryController@store')->name('category.store');
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
Route::get('/category/view/{id}', 'CategoryController@show')->name('category.view');
Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.delete');
Route::get('/category/products/{id}', 'CategoryController@products')->name('category.products');


Route::get('/products', 'ProductController@index')->name('products');
Route::get('/product/create', 'ProductController@create')->name('product.create');
Route::post('/product/store', 'ProductController@store')->name('product.store');
Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');
Route::post('/product/update/{id}', 'ProductController@update')->name('product.update');
Route::get('/product/view/{id}', 'ProductController@show')->name('product.view');
Route::get('/product/delete/{id}', 'ProductController@destroy')->name('product.delete');
Route::post('/product/save/{id}', 'ProductController@save')->name('product.save');