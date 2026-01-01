<?php

use App\Http\Controllers\Activity;
use App\Http\Controllers\CompanySettingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\SquareConfigController;
use App\Http\Controllers\SquareWebhookController;
use App\Http\Controllers\TaxController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


//  Customer Routes
Route::resource('customers', CustomerController::class);
Route::resource('items', ItemsController::class);


Route::get('logs/activity', [Activity::class, 'activity'])->name('logs.activity');
Route::get('logs/errors', [Activity::class, 'errors'])->name('logs.errors');

// Square Configuration Routes
Route::get('config/square', [SquareConfigController::class, 'index'])->name('square.config.index');
Route::post('config/square', [SquareConfigController::class, 'store'])->name('square.config.store');


Route::post('/webhooks/square', [SquareWebhookController::class, 'handle']);

// Invoice Routes   
Route::resource('invoices', InvoiceController::class);
Route::get('invoices/sync/{invoice}', [InvoiceController::class, 'sync'])->name('invoices.sync');


// transaction routes
Route::get('/transactions', [InvoiceController::class, 'transaction'])->name('transactions.index');

Route::get('/invoices/{invoice}/receipt/download', [InvoiceController::class, 'downloadReceipt'])
    ->name('invoices.receipt.download');

Route::get('company/edit', [CompanySettingController::class, 'edit'])->name('company.edit');
Route::put('company/update', [CompanySettingController::class, 'update'])->name('company.update');

Route::get('/settings/taxes', [TaxController::class, 'index'])
    ->name('taxes.index');

// Store new tax
Route::post('/settings/taxes', [TaxController::class, 'store'])
    ->name('taxes.store');

// Update existing tax
Route::put('/settings/taxes/{tax}', [TaxController::class, 'update'])
    ->name('taxes.update');

// Enable / Disable tax
Route::get('/settings/taxes/{tax}/toggle', [TaxController::class, 'toggle'])
    ->name('taxes.toggle');



// Email Configuration Routes
Route::get('email/edit', [EmailController::class, 'edit'])->name('email.edit');
Route::put('email/update', [EmailController::class, 'update'])->name('email.update');

Route::get(
    'email-configurations/{id}/test',
    [EmailController::class, 'test']
)->name('email-configurations.test');





Route::get(
    'email-templates/{id}/edit',
    [EmailController::class, 'editTemplate']
)->name('email-templates.edit');

Route::put(
    'email-templates/{id}',
    [EmailController::class, 'updateTemplate']
)->name('email-templates.update');


Route::post(
    'email-templates',
    [EmailController::class, 'storeTemplate']
)->name('email-templates.store');
// Email Layout Routes
Route::get(
    'email-layouts/{id}/edit',
    [EmailController::class, 'editLayout']
)->name('email-layouts.edit');

Route::put(
    'email-layouts/{id}',
    [EmailController::class, 'updateLayout']
)->name('email-layouts.update');

Route::post(
    'email-layouts',
    [EmailController::class, 'storeLayout']
)->name('email-layouts.store');

Route::get('email-templates', [EmailController::class, 'listTemplates'])->name('email-templates.index');
Route::get('email-layouts', [EmailController::class, 'listLayouts'])->name('email-layouts.index');
Route::get('email/layout/create', [EmailController::class, 'createLayout'])->name('email-layouts.create');
Route::get('email/template/create', [EmailController::class, 'createTemplate'])->name('email-templates.create');


Route::delete('email-template/{template}', [EmailController::class, 'destroyTemplate'])
    ->name('email-templates.destroy');

Route::delete('email-layout/{layout}', [EmailController::class, 'destroyLayout'])
    ->name('email-layouts.destroy');
// TinyMCE API Key Routes
Route::get('email/tinymce/edit', [EmailController::class, 'editTinyMCE'])->name('email.tinymce.edit');
Route::put('email/tinymce/update', [EmailController::class, 'updateTinyMCE'])->name('email.tinymce.update');