<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use Illuminate\Http\Request;
use function foo\func;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index1'])->name('index1');
Route::get('/main', [HomeController::class, 'index'])->name('index');
Route::get('/gethotels/{type}', [HomeController::class, 'gethotels'])->name('gethotels');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');


Route::get('/pdf/{data}', function (Request $request){
    dd($request->data);
})->name('pdf');


Route::get('/formrule', function(Request $request)
{

//    $pdf->download('Umrah Quotation.pdf');


    $pdf = PDF::loadView('frontend.CaculatedAmount', ['request'=>$request,'buttoncheck'=>0]);
    $pdf->save(public_path('Umrah Quotation.pdf'));

    return view('frontend.CaculatedAmount')->with('request',$request)->with('buttoncheck',1);

//    dd(request()->all());

//    $filename = 'retirement-'.rand(1000,9999).'.pdf';
//    $pdf = \Barryvdh\DomPDF\Facade::loadView('frontend.CaculatedAmount',compact('request'));
//    $pdf->save($this->files_path.$filename);



})->name('formrule');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});
