<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChilexpressController;




Route::get('/chilexpress-rates', [ChilexpressController::class, 'getRates']);
