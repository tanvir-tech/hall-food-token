<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Cms\RoleController;
use App\Http\Controllers\Ums\AdminToolsController;
use App\Http\Controllers\Cms\ThemeController;
use App\Http\Controllers\Ums\StudentToolsController;
use App\Http\Controllers\Ums\ProfileController;


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

// Route::get('/generate-role', [RoleController::class, 'generate_role'])->name('generate.role');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::post('/save-theme', [ThemeController::class, 'select_theme'])->name('select.theme');

	Route::post('/save/basic-info', [ProfileController::class, 'save_basic_info'])->name('save.basic.info');
	Route::post('/save/change-password', [ProfileController::class, 'change_auth_password'])->name('change.auth.password');
		
	Route::group(['prefix' => 'administrator'], function(){
		Route::get('/dashboard', [AdminToolsController::class, 'dashboard'])->name('administrator.dashboard');
		Route::get('/add-residential-student', [AdminToolsController::class, 'add_student'])->name('add.student');
		Route::post('/store-residential-student', [AdminToolsController::class, 'store_student'])->name('store.student');
		Route::get('/{date}/lunch', [AdminToolsController::class, 'lunch_tokens'])->name('lunch.tokens');
		Route::get('/{date}/dinner', [AdminToolsController::class, 'dinner_tokens'])->name('dinner.tokens');
		Route::get('/date-wise-tokens', [AdminToolsController::class, 'date_wise_token'])->name('date.wise.token');
		Route::get('/all-reviews', [AdminToolsController::class, 'all_reviews'])->name('all.reviews');

		Route::get('/students-list', [AdminToolsController::class, 'students_list'])->name('students.list');
		Route::get('/approval-list', [AdminToolsController::class, 'approval_list'])->name('approval.list');
		Route::post('/approve-student', [AdminToolsController::class, 'approve_student'])->name('approve.student');
		Route::post('/decline-student', [AdminToolsController::class, 'decline_student'])->name('decline.student');
		
		Route::get('/roomlist', [AdminToolsController::class, 'room_list'])->name('room.list');
		Route::get('/roomsearch', [AdminToolsController::class, 'room_search'])->name('room.search');
		Route::get('/notice/create', [AdminToolsController::class, 'notice_create'])->name('notice.create');
		Route::post('/notice/store', [AdminToolsController::class, 'notice_store'])->name('notice.store');
		Route::get('/complainlist', [AdminToolsController::class, 'complain_list'])->name('complain.list');

		Route::get('/complain/detail', [AdminToolsController::class, 'complain_detail'])->name('complain.detail');

	});

	Route::group(['prefix' => 'student'], function(){
		Route::get('/wait-for-approval', [StudentToolsController::class, 'wait_approval'])->name('wait.approval');

		Route::middleware(['approved'])->group(function () {
			Route::middleware(['procompl'])->group(function () {
				Route::get('/dashboard', [StudentToolsController::class, 'student_dashboard'])->name('student.dashboard');
				Route::get('/buy-token', [StudentToolsController::class, 'buy_token'])->name('buy.token');
				Route::post('/store-token', [StudentToolsController::class, 'store_token'])->name('store.token');
				Route::post('/update-token', [StudentToolsController::class, 'update_token'])->name('update.token');
				Route::get('/today-token', [StudentToolsController::class, 'today_token'])->name('today.token');
				Route::get('/give-review', [StudentToolsController::class, 'give_review'])->name('give.review');
				Route::post('/store-review', [StudentToolsController::class, 'store_review'])->name('store.review');
				
				Route::get('/complain/create', [StudentToolsController::class, 'complain_create'])->name('complain.create');
				Route::post('/complain/store', [StudentToolsController::class, 'complain_store'])->name('complain.store');

			});
		});
	});

});
