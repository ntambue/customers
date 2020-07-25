<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Departments
    Route::apiResource('departments', 'DepartmentApiController');

    // Divisions
    Route::apiResource('divisions', 'DivisionApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // States
    Route::apiResource('states', 'StateApiController');

    // Cities
    Route::apiResource('cities', 'CityApiController');

    // Customers
    Route::post('customers/media', 'CustomersApiController@storeMedia')->name('customers.storeMedia');
    Route::apiResource('customers', 'CustomersApiController');
});
