<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Flight;
use App\Http\Controllers\FlightController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/get', function () {
    return response()->json(['message' => 'GET request successful']);
});

// /get/1/2 -> first == 2, two == 1
Route::get('/get/{first}/{two}', function (string $two, string $first) {
    return response()->json(['message' => 'GET request successful', 'first' => $first, 'two' => $two]);
});

Route::post('/post', function (Request $request) {
    $body = $request->getContent();
    return response()->json(['message' => 'POST request successful', 'body' => $body]);
});

Route::put('/put', function (Request $request) {
    $body = $request->getContent();
    return response()->json(['message' => 'PUT request successful', 'body' => $body]);
});

Route::patch('/patch', function (Request $request) {
    $body = $request->getContent();
    return response()->json(['message' => 'PATCH request successful', 'body' => $body]);
});

Route::delete('/delete/{id}', function (Request $request, string $id) {
    return response()->json(['message' => 'delete request successful', 'id' => $id]);
})->where('id', '[0-9]+');

Route::get('/flights', [FlightController::class, 'getAll']);
Route::get('/flights/{id}', [FlightController::class, 'getById'])->where('id', '[0-9]+');
Route::get('/flights/name/{name}', [FlightController::class, 'getByName']);
Route::post('/flights', [FlightController::class, 'create']);
Route::put('/flights/{id}', [FlightController::class, 'update'])->where('id', '[0-9]+');
Route::delete('/flights/{id}', function (Request $request, $id) {
    return response()->json(FlightController::delete($id));
})->where('id', '[0-9]+');