<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\MemberController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\ProductRecommendationController;


//require __DIR__.'/auth.php';

Route::get('/xx', function () {
    return "jgjhgjhgh";
});



// Member routes
Route::post('/members/register', [MemberController::class, 'register']);
Route::post('/members/fcm-token', [App\Http\Controllers\Api\FCMController::class, 'updateToken']);
Route::get('/members/team-structure', [MemberController::class, 'getTeamStructure']);

// Commission routes
Route::post('/commissions/calculate', [CommissionController::class, 'calculateCommissions']);
Route::get('/commissions/history', [CommissionController::class, 'getCommissionHistory']);

// Order routes
Route::post('/orders/complete', [OrderController::class, 'completeOrder']);

// Product View Routes
Route::prefix('products')->group(function () {
    Route::post('{product}/view', [ProductViewController::class, 'trackView']);
    Route::get('popular', [ProductViewController::class, 'getPopularProducts']);
    Route::get('trending', [ProductViewController::class, 'getTrendingProducts']);
    Route::get('{product}/stats', [ProductViewController::class, 'getProductStats']);
});

// Product recommendation routes
Route::get('/products/recommendations', [ProductRecommendationController::class, 'getPersonalizedRecommendations']);
Route::get('/products/trending', [ProductRecommendationController::class, 'getTrendingProducts']);
Route::get('/products/category/{categoryId}/popular', [ProductRecommendationController::class, 'getPopularProductsByCategory']);
Route::get('/products/{productId}/similar', [ProductRecommendationController::class, 'getSimilarProducts']);

// Auth routes
Route::post('/check-phone', [App\Http\Controllers\Api\AuthController::class, 'checkPhone']);
