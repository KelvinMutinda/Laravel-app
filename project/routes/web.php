<?php
use App\Http\Controllers\ChirpController2;
use Illuminate\Support\Facades\Route;

Route::get('/',[ChirpController2::class, 'index']);