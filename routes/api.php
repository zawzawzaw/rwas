<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'cruise'], function(){
    Route::get('get_valid_search_parameters', 'CruiseController@get_valid_search_parameters');
    Route::get('get_home_itineraries', 'CruiseController@get_home_itineraries');
    Route::get('get_itineraries', 'CruiseController@get_itineraries');
});

Route::group(['prefix' => 'user'], function(){
    Route::get('get', 'V1\\Api\\UserController@get_user');
    Route::post('login_ajax', 'V1\\Api\\UserController@login');
    Route::post('login_ajax_json', 'V1\\Api\\UserController@login_json_output');
    Route::post('register', 'V1\\Api\\UserController@register');
    Route::group(['middleware' => ['encryptCookies', 'sessionMiddleware']], function(){
        Route::any('update-profile', 'V1\\Api\\UserController@update');
    });
});

Route::group(['prefix' => 'seaware/test'], function(){
    Route::get('merchentlogin', 'Test\\SeawareApiTest@merchantLogin');
    Route::get('merchentsession', 'Test\\SeawareApiTest@retriveMerchent');
    Route::get('OTA_CruiseSailAvailRQ', 'Test\\SeawareApiTest@otaCruiseSailAvail');
    Route::get('OTA_CruiseFareAvailRQ', 'Test\\SeawareApiTest@otaCruiseFareAvail');
    Route::get('OTA_CruiseCategoryAvailRQ', 'Test\\SeawareApiTest@otaCruiseCategoryAvail');
    Route::get('OTA_CruiseCabinAvailRQ', 'Test\\SeawareApiTest@otaCruiseCabinAvailRQ');
    Route::get('OTA_CruisePriceBookingRQ', 'Test\\SeawareApiTest@otaCruisePriceBookingRQ');
    Route::get('OTA_CruiseBookRQ', 'Test\\SeawareApiTest@otaCruiseBookRQ');
    Route::get('OTA_CruiseBookingDocumentRQ', 'Test\\SeawareApiTest@otaCruiseBookingDocumentRQ');
});

Route::group(['prefix' => 'drs/test'], function() {
    Route::get('API_AutoUA_APA_Currency_OvrTooMuchFlag', 'Test\\DrsApiTestController@acnillaryPointAdjustment');
    Route::get('API_AutoUA_COMP_V2 ', 'Test\\DrsApiTestController@apiAutoUACompV2');
    Route::get('API_AutoUA_GetPF', 'Test\\DrsApiTestController@apiAutoUAGetPF');
    Route::get('API_AutoUA_GetSelectedPF', 'Test\\DrsApiTestController@apiAutoUAGetSelectedPF');
    Route::get('API_AutoUA_Get_CustomerProfile_Format_Long', 'Test\\DrsApiTestController@apiAutoUAGetCustomerProfileFormatLong');
    Route::get('API_AutoUA_PINChange', 'Test\\DrsApiTestController@apiAutoUAPinChange');
    Route::get('API_AutoUA_PINCreate', 'Test\\DrsApiTestController@apiAutoUAPinCreate');
    Route::get('API_AutoUA_PINVerify', 'Test\\DrsApiTestController@apiAutoUAPinVerify');
    Route::get('API_AutoUA_SetPF', 'Test\\DrsApiTestController@apiAutoUASetPF');
    Route::get('API_EditCustomerV2', 'Test\\DrsApiTestController@apiEditCustomerV2');
    Route::get('API_NewCustomer_V3', 'Test\\DrsApiTestController@apiNewCustomerV1');
    Route::get('API_Report_CSR', 'Test\\DrsApiTestController@apiReportCsrV2');
    Route::get('API_Report_CTSv2', 'Test\\DrsApiTestController@apiReportCtsV2');
});