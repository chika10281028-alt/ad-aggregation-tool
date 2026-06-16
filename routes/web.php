<?php

use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\AdAggregationController;
use App\Http\Controllers\MediaRegisterController;
use App\Http\Controllers\MediaUpdateController;
use App\Http\Controllers\CampaignRegisterController;
use App\Http\Controllers\CampaignUpdateController;
use App\Http\Controllers\AddataRegisterController;
use App\Http\Controllers\AddataUpdateController;

use Illuminate\Support\Facades\Route;

Route::get('/', [AdAggregationController::class, 'getAddatas']);

Route::get('/getAddatas', [AdAggregationController::class, 'getAddatas']);

Route::get('/media_register', [MediaRegisterController::class, 'getMedias'])->name('media_register');
Route::post('/insertMedia', [MediaRegisterController::class, 'insertMedia']);
Route::get('/media_update/{id}', [MediaUpdateController::class, 'getMedia'])->name('media_update');
Route::put('/media_update/{id}', [MediaUpdateController::class, 'updateMedia']);
Route::get('/media_updateComplete', function () {
    return view('media_updateComplete');
});

Route::get('/campaign_register', [CampaignRegisterController::class, 'getCampaigns'])->name('campaign_register');
Route::post('/insertCampaign', [CampaignRegisterController::class, 'insertCampaign']);
Route::get('/campaign_update/{id}', [CampaignUpdateController::class, 'getCampaign'])->name('campaign_update');
Route::put('/campaign_update/{id}', [CampaignUpdateController::class, 'updateCampaign']);
Route::get('/campaign_updateComplete', function () {
    return view('campaign_updateComplete');
});

Route::get('/addata_register', [AddataRegisterController::class, 'getAddatas'])->name('addata_register');
Route::post('/insertAddata', [AddataRegisterController::class, 'insertAddata']);
Route::get('/addata_update/{id}', [AddataUpdateController::class, 'getAddata'])->name('addata_update');
Route::put('/addata_update/{id}', [AddataUpdateController::class, 'updateAddata']);
Route::get('/addata_updateComplete', function () {
    return view('addata_updateComplete');
});
