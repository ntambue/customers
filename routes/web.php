<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Departments
    Route::delete('departments/destroy', 'DepartmentController@massDestroy')->name('departments.massDestroy');
    Route::resource('departments', 'DepartmentController');

    // Divisions
    Route::delete('divisions/destroy', 'DivisionController@massDestroy')->name('divisions.massDestroy');
    Route::resource('divisions', 'DivisionController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // States
    Route::delete('states/destroy', 'StateController@massDestroy')->name('states.massDestroy');
    Route::resource('states', 'StateController');

    // Cities
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Customers
    Route::delete('customers/destroy', 'CustomersController@massDestroy')->name('customers.massDestroy');
    Route::post('customers/media', 'CustomersController@storeMedia')->name('customers.storeMedia');
    Route::post('customers/ckmedia', 'CustomersController@storeCKEditorImages')->name('customers.storeCKEditorImages');
    Route::resource('customers', 'CustomersController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});
