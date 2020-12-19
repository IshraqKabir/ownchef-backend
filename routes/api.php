<?php

use App\Http\Controllers\API\ImageController;
use App\Http\Controllers\API\ItemCategoryController;
use App\Http\Controllers\API\ItemController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// image
Route::post('image/store', [ImageController::class, 'store']);
Route::delete('image/{image}/delete', [ImageController::class, 'delete']);

// product
Route::get('product/all', [ProductController::class, 'index']);
Route::post('product/create', [ProductController::class, 'create']);
Route::get('product/{product}/read', [ProductController::class, 'read']);
Route::post('product/{product}/update', [ProductController::class, 'update']);
Route::delete('product/{product}/delete', [ProductController::class, 'delete']);
Route::get('product/{product}/item-categories', [ProductController::class, 'get_item_categories']);

// item category
Route::get('item-category/all', [ItemCategoryController::class, 'index']);
Route::post('item-category/create', [ItemCategoryController::class, 'create']);
Route::get('item-category/{itemCategory}/read', [ItemCategoryController::class, 'read']);
Route::post('item-category/{itemCategory}/update', [ItemCategoryController::class, 'update']);
Route::delete('item-category/{itemCategory}/delete', [ItemCategoryController::class, 'delete']);
Route::get('item-category/{itemCategory}/items', [ItemCategoryController::class, 'get_items']);

// item
Route::get('item/all', [ItemController::class, 'index']);
Route::post('item/create', [ItemController::class, 'create']);
Route::get('item/{item}/read', [ItemController::class, 'read']);
Route::post('item/{item}/update', [ItemController::class, 'update']);
Route::delete('item/{item}/delete', [ItemController::class, 'delete']);

// order
Route::get('order/all', [OrderController::class, 'index']);
Route::post('order/create', [OrderController::class, 'create']);
Route::get('order/{order}/read', [OrderController::class, 'read']);
Route::post('order/{order}/update', [OrderController::class, 'update']);
Route::delete('order/{order}/delete', [OrderController::class, 'delete']);
