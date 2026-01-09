<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Device\DeviceController;
use App\Http\Controllers\Log\ActionLogController;
use App\Http\Controllers\UserMaster\UserMasterController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Phonebook\PhonebookController;
use App\Http\Controllers\Template\TemplateController;
use App\Http\Controllers\SendMessage\SendMessageController;


##########################
use Illuminate\Support\Facades\Auth;

##########################

use App\Http\Middleware\checklogin;
use App\Http\Middleware\CheckLoginPermission;

###########################
Route::get('/login', function () {
    return view('login');
});


Route::get("/",                                      [LoginController::class, 'index'])->name("/");
Route::get("logout",                                 [LoginController::class, 'logout'])->name("logout");
route::any("CheckLogin",                             [LoginController::class, "CheckLogin"]);


Auth::routes();

Route::middleware([Checklogin::class])->group(function () {

    // Route::middleware([CheckLoginPermission::class])->group(function () {
    // Dashboard Modal
    Route::get('/dashboard',                         [DashboardController::class, 'dashboard']);

    // Action Log
    Route::get('/actionlog',                         [ActionLogController::class, 'index']);

    // UserMaster
    Route::get('/usermaster',                        [UserMasterController::class, 'index']);
    // });


    // Dashboard Modal
    // Route::get('/dashboard',                         [DashboardController::class, 'dashboard']);
    Route::post('/dashboard/table',                  [DashboardController::class, 'loadTable']);

    //device
    Route::get('/device',                            [DeviceController::class, 'index']);
    Route::post('/device/data',                      [DeviceController::class, 'getData']);
    Route::post('/device/addDevice',                 [DeviceController::class, 'addDevice']);
    Route::post('/device/scanDevice',                [DeviceController::class, 'scanDevice']);
    Route::post('/device/checkStatus',               [DeviceController::class, 'checkStatus']);
    Route::post('/device/logout',                    [DeviceController::class, 'logout']);


    // phonebook
    Route::get('/phonebook',                         [PhonebookController::class, 'index']);
    Route::post('/phonebook/data',                   [PhonebookController::class, 'getData']);
    Route::post('/phonebook/add',                    [PhonebookController::class, 'add']);
    Route::post('/phonebook/view',                   [PhonebookController::class, 'view']);
    Route::post('/phonebook/delete',                 [PhonebookController::class, 'delete']);
    Route::post('/phonebook/edit',                   [PhonebookController::class, 'edit']);
    Route::post('/phonebook/update',                 [PhonebookController::class, 'update']);

    // TemplateController
    Route::get('/templates',                         [TemplateController::class, 'index']);
    Route::post('/templates/data',                   [TemplateController::class, 'getData']);
    Route::post('/templates/add',                    [TemplateController::class, 'add']);
    Route::post('/templates/edit',                   [TemplateController::class, 'edit']);
    Route::post('/templates/update',                 [TemplateController::class, 'update']);
    Route::post('/templates/delete',                 [TemplateController::class, 'delete']);


    Route::get('/sendmessage',                       [SendMessageController::class, 'index']);
    Route::post('/sendmessage/send',                 [SendMessageController::class, 'send']);


    // Action Log
    // Route::get('/actionlog',                         [ActionLogController::class, 'index']);
    Route::post('/actionlog/data',                   [ActionLogController::class, 'getData']);


    // UserMaster Controller
    // Route::get('/usermaster',                        [UserMasterController::class, 'index']);
    Route::post('/usermaster/data',                  [UserMasterController::class, 'getData']);
    Route::post('/usermaster/givepermission',        [UserMasterController::class, 'givepermission']);
    Route::post('/usermaster/addNewUser',            [UserMasterController::class, 'addNewUser']);










    //Profile
    Route::get('/profile',                           [ProfileController::class, 'index']);
    Route::post('/profile/update',                    [ProfileController::class, 'update']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
