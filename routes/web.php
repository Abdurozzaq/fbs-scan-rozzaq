<?php

use App\Http\Controllers\ListDataController;
use App\Http\Controllers\PdfReportController;
use App\Http\Controllers\SubmitScanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Scan Standby Page
Route::get('/scan-standby', function () {
    return view('scan-standby');
});

// Scan Manual Trigger Page
Route::get('/scan-manual', function () {
    return view('scan-manual');
});

// Submit Code Route
Route::post('/insert-scanned-data', [SubmitScanController::class, 'insert'])->name('submit-scanned-data');

// Route Get List Form Page
Route::get('/get-list-data-form', function () {
    return view('get-list-data-form');
});

// Route Get List Data Page
Route::post('/get-list-data', [ListDataController::class, 'getListData'])->name('get-list-data');


// Route Export PDF Form Page
Route::get('/export-pdf-form', function () {
    return view('export-pdf-form');
});

// Route Export Data To PDF
Route::post('/export-pdf', [PdfReportController::class, 'generatePDF'])->name('export-pdf');
