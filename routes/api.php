<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Response;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/slides', [\App\Http\Controllers\SlideAction::class, 'index']);
Route::post('/slides', [\App\Http\Controllers\SlideAction::class, 'create']);



Route::get('customers', [ApiController::class, 'getCustomers']);
Route::post('customers', [ApiController::class, 'postCustomers']);
Route::get('customers/{customer_id}', function($customer_id) {
    return response()->json(\App\Models\Customer::query()->select(['id', 'name'])->find($customer_id));
});
Route::put('customers/{customer_id}', function(Request $request, $customer_id) {
    if(!$request->json('name')){
        return response()
            ->make('', Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    if (!\App\Models\Customer::query()->where('id', '=', $customer_id)->exists()) {
        abort(Response::HTTP_NOT_FOUND);
    }
    $customer = \App\Models\Customer::query()->select(['id', 'name'])->find($customer_id);
    $customer->name = $request->json('name');
    $customer->save();
    return response()->json($customer);
});
Route::delete('customers/{customer_id}', function() {});
Route::get('reports', function() {});
Route::post('reports', function() {});
Route::get('reports/{report_id}', function() {});
Route::put('reports/{report_id}', function() {});
Route::delete('reports/{report_id}', function() {});

