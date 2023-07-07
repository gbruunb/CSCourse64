<?php

use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/course', function () {
        $subjects = DB::table('subjects')->get();
        $user = Auth::user();
        $check_subject = DB::table('check_subjects')->get();
        return view('course',compact('subjects','user','check_subject'));
    })->name('course');

    Route::post('/course/addCheckSubject',[SubjectController::class,'addCheckSubject'])->name('addCheckSubject');
    Route::post('/course/addSubjectToDB',[SubjectController::class,'addSubjectToDB'])->name('addSubjectToDB');


    Route::get('/addSubjectToCourse', function () {
        $subjects = DB::table('subjects')->get();
        $user = Auth::user();
        $check_subject = DB::table('check_subjects')->get();
        if(Auth::user()->isAdmin == 1){
            return view('addSubjectToCourse',compact('subjects','user','check_subject'));
        }
        return view('accessDenied',compact('subjects','user','check_subject'));
    })->name('addSubjectToCourse');
});
