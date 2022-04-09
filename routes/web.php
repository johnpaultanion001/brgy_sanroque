<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'LandingpageController@index')->name('landingpage');
Route::get('view/{announcement}', 'LandingpageController@view')->name('view');
Route::get('send-email', 'MailController@sendMail')->name('test');
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    // return what you want
});

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'resident', 'as' => 'resident.', 'namespace' => 'Resident', 'middleware' => ['auth', 'verified']], function () {
    // Home
    Route::get('home', 'HomeController@index')->name('home');

    // Brgy Certificate
    Route::resource('brgy_certificate', 'BrgyCertificateController');

    // Certificate Of Residency
    Route::resource('certificate_of_residency', 'CertificateOfResidencyController');

    // Business Permit Clearance
    Route::resource('business_permit_clearance', 'BusinessPermitClearanceController');

     // Appointments
     Route::resource('appointments', 'AppointmentController');

     //barangay_health_certificate
     Route::resource('barangay_health_certificate', 'BarangayHealthCertificateController');

     //Barangay Indigency
     Route::resource('barangay_indigency', 'BarangayIndigencyController');

    //User Update
    Route::get('update', 'UserController@updateshow')->name('updateshow');
    Route::put('update/{user}', 'UserController@update')->name('update');
    Route::put('changepassword/{user}', 'UserController@changepassword')->name('changepassword');

    //Notification
    Route::put('notification/{notif}', 'NotificationController@notification')->name('notification');

    // Borrow
     Route::resource('borrow', 'BorrowItemController');
    

});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Home
    Route::get('home', 'HomeController@index')->name('home');

    // Brgy Certificate
    Route::resource('brgy_certificate', 'BrgyCertificateController');

    // Certificate Of Residency
    Route::resource('certificate_of_residency', 'CertificateOfResidencyController');

    // Business Permit Clearance
    Route::resource('business_permit_clearance', 'BusinessPermitClearanceController');

     // Resident
     Route::get('resident_list', 'ResidentListController@index')->name('resident');
     Route::get('resident_list/{user}/edit', 'ResidentListController@edit')->name('resident.edit');
     Route::put('resident_list/{user}', 'ResidentListController@update')->name('resident.update');
     Route::put('resident_list/{user}/dpass', 'ResidentListController@defaultPassowrd')->name('resident.dpass');

     // Appointments
     Route::resource('appointments', 'AppointmentController');

     //barangay_health_certificate
     Route::resource('barangay_health_certificate', 'BarangayHealthCertificateController');

     //Barangay Indigency
     Route::resource('barangay_indigency', 'BarangayIndigencyController');

     // Appointments
     Route::resource('appointments', 'AppointmentController');

     // Announcements 
     Route::resource('announcements', 'AnnouncementsController');
     Route::post('announcements/update/{announcement}', 'AnnouncementsController@updateannouncement')->name('announcements.updateannouncement');

     // Borrow
     Route::resource('borrow', 'BorrowItemController');
});
