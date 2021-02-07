<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Basic Details
    Route::post('basic-details/media', 'BasicDetailsApiController@storeMedia')->name('basic-details.storeMedia');
    Route::apiResource('basic-details', 'BasicDetailsApiController');

    // Faq Categories
    Route::apiResource('faq-categories', 'FaqCategoryApiController');

    // Faq Questions
    Route::post('faq-questions/media', 'FaqQuestionApiController@storeMedia')->name('faq-questions.storeMedia');
    Route::apiResource('faq-questions', 'FaqQuestionApiController');

    // User Details
    Route::apiResource('user-details', 'UserDetailsApiController');
});
