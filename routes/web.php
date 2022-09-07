<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Cms\RoleController;
use App\Http\Controllers\Ums\AdminToolsController;
use App\Http\Controllers\Cms\ThemeController;
use App\Http\Controllers\Ums\StudentToolsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/generate-role', [RoleController::class, 'generate_role'])->name('generate.role');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::post('/save-theme', [ThemeController::class, 'select_theme'])->name('select.theme');
		
	Route::group(['prefix' => 'administrator'], function(){
		Route::get('/dashboard', [AdminToolsController::class, 'dashboard'])->name('administrator.dashboard');
		Route::get('/add-residential-student', [AdminToolsController::class, 'add_student'])->name('add.student');
		Route::post('/store-residential-student', [AdminToolsController::class, 'store_student'])->name('store.student');
		Route::get('/{date}/lunch', [AdminToolsController::class, 'lunch_tokens'])->name('lunch.tokens');
		Route::get('/{date}/dinner', [AdminToolsController::class, 'dinner_tokens'])->name('dinner.tokens');
		Route::get('/date-wise-tokens', [AdminToolsController::class, 'date_wise_token'])->name('date.wise.token');
	});

	Route::group(['prefix' => 'student'], function(){
		Route::get('/dashboard', [StudentToolsController::class, 'student_dashboard'])->name('student.dashboard');
		Route::get('/buy-token', [StudentToolsController::class, 'buy_token'])->name('buy.token');
		Route::post('/store-token', [StudentToolsController::class, 'store_token'])->name('store.token');
		Route::post('/update-token', [StudentToolsController::class, 'update_token'])->name('update.token');
		Route::get('/today-token', [StudentToolsController::class, 'today_token'])->name('today.token');
	});

});
