<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventBootcampController;
    
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', 'kuisioner'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::middleware(['role:user', 'kuisioner'])->name('user.')->group(function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('index');
        Route::post('/dashboard', [UserController::class, 'index'])->name('indexQuery');

        Route::get('/course', [UserController::class, 'course'])->name('course');
        Route::get('/course/{id}', [UserController::class, 'courseModul'])->name('courseModul');
        
        Route::get('/course/activities/{id}', [UserController::class, 'activities'])->name('activities');
        Route::post('/course/activities/progress/{id}', [UserController::class, 'activitiesProgress'])->name('activitiesProgress');
        
        Route::get('/bootcamp-event', [UserController::class, 'bootcampEvent'])->name('bootcampEvent');
        Route::post('/bootcamp/register', [UserController::class, 'bootcampRegister'])->name('bootcamp.register');
        Route::post('/event/register', [UserController::class, 'eventRegister'])->name('event.register');

        Route::get('/kuisioner/sessionOne', [UserController::class, 'kuisionerSessionOne'])->name('kuisionerSessionOne');
        Route::post('/kuisioner/sessionOneStore', [UserController::class, 'kuisionerSessionOneStore'])->name('kuisionerSessionOneStore');
        Route::get('/kuisioner/sessionTwo', [UserController::class, 'kuisionersessionTwo'])->name('kuisionerSessionTwo');
        Route::post('/kuisioner/sessionTwoStore', [UserController::class, 'kuisionerSessionTwoStore'])->name('kuisionerSessionTwoStore');
        Route::get('/kuisioner/sessionThree', [UserController::class, 'kuisionersessionThree'])->name('kuisionerSessionThree');
        Route::post('/kuisioner/sessionThreeStore', [UserController::class, 'kuisionerSessionThreeStore'])->name('kuisionerSessionThreeStore');
        Route::get('/kuisioner/sessionFour', [UserController::class, 'kuisionersessionFour'])->name('kuisionerSessionFour');
        Route::post('/kuisioner/sessionFourStore', [UserController::class, 'kuisionerSessionFourStore'])->name('kuisionerSessionFourStore');
    });
    
    Route::middleware(['role:admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboardAdmin');

        Route::get('/course', [CourseController::class, 'index'])->name('course');
        Route::get('/course/{idCourseCategory}', [CourseController::class, 'detail'])->name('course.detail');
        Route::get('/course/detail/{courseId}', [CourseController::class, 'detailCourse'])->name('course.detailCourse');
        Route::get('/course/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
        Route::patch('/course/update/{id}', [CourseController::class, 'update'])->name('course.update');
        Route::delete('/course/delete/{id}', [CourseController::class, 'destroy'])->name('course.delete');
        Route::get('/course/create/{idCourseCategory}', [CourseController::class, 'create'])->name('course.create');
        Route::post('/course/store', [CourseController::class, 'store'])->name('course.store');
        
        Route::get('/course/modul/create/{id}', [ModulController::class, 'create'])->name('modul.create');
        Route::post('/course/modul/store', [ModulController::class, 'store'])->name('modul.store');
        Route::post('/course/modul/update/{id}', [ModulController::class, 'update'])->name('modul.update');
        Route::delete('/course/modul/delete/{id}', [ModulController::class, 'destroy'])->name('modul.delete');
       
        Route::get('/course/modul/question/create/{id}', [ModulController::class, 'questionCreate'])->name('modul.question.create');
        Route::post('/course/modul/question/store', [ModulController::class, 'questionStore'])->name('modul.question.store');
        Route::get('/course/modul/question/edit/{id}', [ModulController::class, 'questionEdit'])->name('modul.question.edit');
        Route::patch('/course/modul/question/update/{id}', [ModulController::class, 'questionUpdate'])->name('modul.question.update');
        Route::delete('/course/modul/question/delete/{id}', [ModulController::class, 'questionDestroy'])->name('modul.question.delete');

        Route::get('/event-bootcamp', [EventBootcampController::class, 'index'])->name('eventBootcamp');
        Route::get('/event-bootcamp/{category}', [EventBootcampController::class, 'detail'])->name('eventBootcamp.detail');

        Route::get('/event-create/{category}', [EventBootcampController::class, 'eventCreate'])->name('event.create');
        Route::post('/event-store', [EventBootcampController::class, 'eventStore'])->name('event.store');
        Route::get('/event/{id}', [EventBootcampController::class, 'eventDetail'])->name('event.read');
        Route::get('/event/edit/{id}', [EventBootcampController::class, 'eventEdit'])->name('event.edit');
        Route::post('/event/update/{id}', [EventBootcampController::class, 'eventUpdate'])->name('event.update');
        Route::delete('/event/delete/{id}', [EventBootcampController::class, 'eventDestroy'])->name('event.destroy');
        
        Route::get('/bootcamp-create/{category}', [EventBootcampController::class, 'bootcampCreate'])->name('bootcamp.create');
        Route::post('/bootcamp-store', [EventBootcampController::class, 'bootcampStore'])->name('bootcamp.store');
        Route::get('/bootcamp/{id}', [EventBootcampController::class, 'bootcampDetail'])->name('bootcamp.read');
        Route::get('/bootcamp/edit/{id}', [EventBootcampController::class, 'bootcampEdit'])->name('bootcamp.edit');
        Route::post('/bootcamp/update/{id}', [EventBootcampController::class, 'bootcampUpdate'])->name('bootcamp.update');
        Route::delete('/bootcamp/delete/{id}', [EventBootcampController::class, 'bootcampDestroy'])->name('bootcamp.destroy');

        Route::get('/kuisioner', [AdminController::class, 'kuisioner'])->name('kuisioner');
        Route::post('/kuisioner/add/{type}', [AdminController::class, 'addKuisioner'])->name('kuisionerAdd');
        Route::patch('/kuisioner/edit/{id}', [AdminController::class, 'editKuisioner'])->name('kuisionerEdit');
        Route::delete('/kuisioner/delete/{id}', [AdminController::class, 'deleteKuisioner'])->name('kuisionerDelete');
        Route::patch('/kuisionerType/edit/{type}', [AdminController::class, 'editKuisionerType'])->name('kuisionerTypeEdit');

        Route::get('/umkm-list', [AdminController::class, 'umkmList'])->name('umkmlist');
    });
});

require __DIR__.'/auth.php';
