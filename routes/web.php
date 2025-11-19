<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompanyDetailController;
use App\Http\Controllers\OngoingActivityController;
use App\Http\Controllers\OurClientController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\SingleUpdateController;
use App\Http\Controllers\AppreciationController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AboutInfoController;
use App\Http\Controllers\CoreTeamController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ServiceCoverAreaController;
use App\Http\Controllers\AboutInfoLandingPageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageTopConfigurationController;

use App\Http\Controllers\PortalController;

use App\Http\Controllers\PortalControllerNewVersion;

use App\Http\Controllers\MailController;

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

Route::get('system-login', 'Auth\LoginController@showLoginForm');
// post credential to the login method
Route::post('system-login', 'Auth\LoginController@login')->name('system-login');


Route::get('/system-login', function () {
    return view('auth/login');
});


Route::get('', [App\Http\Controllers\PortalController::class, 'index']);
Route::get('visitor-managemnet', [App\Http\Controllers\PortalController::class, 'visitorManagement']);

Route::get('get-practice-area-based-on-services/{serviceId}', [App\Http\Controllers\PortalController::class, 'ajaxfindPracticeAreaBesedOnServices']);
Route::get('portal-practice-area/{serviceAreaId}', [App\Http\Controllers\PortalController::class, 'ajaxPracticeAreaTab']);

Route::get('portal-ongoing-act', [App\Http\Controllers\PortalController::class, 'ongoingActivity']);

Route::get('portal-ongoing-act-single/{id}', [App\Http\Controllers\PortalController::class, 'ongoingSingle']);

Route::get('portal-completed-project-list', [App\Http\Controllers\PortalController::class, 'completedProject']);

Route::get('portal-completed-project-single/{id}', [App\Http\Controllers\PortalController::class, 'completedProjectSingle']);

Route::get('ongoing-com-news-details/{id}', [App\Http\Controllers\PortalController::class, 'ongoingCompletedNewsDetails']);

Route::get('news-event-details/{id}', [App\Http\Controllers\PortalController::class, 'singleUpdateDetails']);

//Route::get('portal-clients', [App\Http\Controllers\PortalController::class, 'ourClient']);


Route::get('/cap-buil-kase-dev', [App\Http\Controllers\PortalController::class, 'index']);
Route::get('/foreign-training-study-tour', [App\Http\Controllers\PortalController::class, 'index']);
Route::get('/research', [App\Http\Controllers\PortalController::class, 'index'])->name('index');
Route::get('/local-international-consultancy', [App\Http\Controllers\PortalController::class, 'index']);



// Start Portal Ajax

Route::get('portal-clients-f', [App\Http\Controllers\PortalController::class, 'ourClientInner']);
Route::get('portal-ongoing-projects-f', [App\Http\Controllers\PortalController::class, 'ongoingProjectInner']);
Route::get('portal-completed-projects-f', [App\Http\Controllers\PortalController::class, 'completedProjectInner']);

Route::post('send-public-query', [App\Http\Controllers\PortalController::class, 'sendPublicContactQuery']);
Route::post('job-apply', [App\Http\Controllers\PortalController::class, 'jobApply']);
//Route::get('send-mail', [MailController::class, 'index']);

// end Portal Ajax

Route::get('about-us-f', [App\Http\Controllers\PortalController::class, 'aboutInner']);




Route::get('news-event', [App\Http\Controllers\PortalController::class, 'newsInnerList']);

Route::get('completed-project/{id}', [App\Http\Controllers\PortalController::class, 'completedProjectInnerList']);
Route::get('ongoing-project/{id}', [App\Http\Controllers\PortalController::class, 'ongoingProjectInnerList']);
Route::get('our-client', [App\Http\Controllers\PortalController::class, 'ourClientInnerList']);

Route::get('events', function () {
    return view('front-end/events');
});

Route::get('maintenance-mode', function () {
    return view('errors/maintenance-mode');
});

Route::get('photo-gallery', [App\Http\Controllers\PortalController::class, 'galleryCategory']);
Route::get('photo-gallery/{project}', [App\Http\Controllers\PortalController::class, 'gallery']);

Route::get('career', [App\Http\Controllers\PortalController::class, 'careerList']);

Route::get('career/{id}', [App\Http\Controllers\PortalController::class, 'careerDetails']);

Route::get('job-apply', function () {
    return view('front-end/job-apply');
});

Route::get('contact', [App\Http\Controllers\PortalController::class, 'contact']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
	
	
	Route::resource('services', ServiceController::class);
	Route::delete('services/{id}', [ServiceController::class, 'destroy'])->name('services.delete');
	
    Route::resource('roles', RoleController::class);
	Route::delete('roles/{id}', [UserController::class, 'destroy'])->name('roles.delete');
    
	Route::resource('service-cover-areas', ServiceCoverAreaController::class);
	Route::delete('service-cover-areas/{id}', [ServiceCoverAreaController::class, 'destroy'])->name('service-cover-areas.delete');
	
	
    Route::resource('users', UserController::class);
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.delete');
    Route::get('/get-role-wise-permission-list/{id}', [App\Http\Controllers\UserController::class, 'seeRolePermission']);

	
	Route::resource('page-top-configurations', PageTopConfigurationController::class);
    Route::delete('page-top-configurations/{id}', [PageTopConfigurationController::class, 'destroy'])->name('page-top-configurations.delete');
   

	Route::resource('company-details', CompanyDetailController::class);
	//Route::post('company-details/store', 'CompanyDetailController@store')->name('company_details.store');
	Route::delete('company-details/{id}', [CompanyDetailController::class, 'destroy'])->name('company-details.delete');
	
	Route::resource('our-clients', OurClientController::class);
    Route::delete('our-clients/{id}', [OurClientController::class, 'destroy'])->name('our-clients.delete');
	
	Route::resource('ongoing-activities', OngoingActivityController::class);
	Route::resource('completed-activities', OngoingActivityController::class);
    Route::delete('ongoing-activities/{id}', [OngoingActivityController::class, 'destroy'])->name('ongoing-activities.delete');
    Route::get('ongoing-activities-submit-approve-publish/{id}', [OngoingActivityController::class, 'submitApprovePublish'])->name('ongoing-activities.submit-approve-publish');
    Route::get('ongoing-activities-reject-unpublish/{id}', [OngoingActivityController::class, 'rejectUnpublish'])->name('ongoing-activities.reject-unpublish');
	Route::get('/get-service-cover-area/{id}', [App\Http\Controllers\OngoingActivityController::class, 'ajaxLoadServiceCoverArea']);
	
	
	Route::resource('single-updates', SingleUpdateController::class);
    Route::delete('single-updates/{id}', [SingleUpdateController::class, 'destroy'])->name('single-updates.delete');
	Route::get('single-updates-submit-approve-publish/{id}', [SingleUpdateController::class, 'submitApprovePublish'])->name('single-updates.submit-approve-publish');
    Route::get('single-updates-reject-unpublish/{id}', [SingleUpdateController::class, 'rejectUnpublish'])->name('single-updates.reject-unpublish');
	
	
	Route::resource('appreciations', AppreciationController::class);
    Route::delete('appreciations/{id}', [AppreciationController::class, 'destroy'])->name('appreciations.delete');
	
	Route::resource('gallery-categories', GalleryCategoryController::class);
    Route::delete('gallery-categories/{id}', [GalleryCategoryController::class, 'destroy'])->name('gallery-categories.delete');
	
	Route::resource('galleries', GalleryController::class);
    Route::delete('galleries/{id}', [GalleryController::class, 'destroy'])->name('galleries.delete');
	
	Route::resource('contact-us', ContactUsController::class);
    Route::delete('contact-us/{id}', [ContactUsController::class, 'destroy'])->name('contact-us.delete');
	
	Route::resource('about-infos', AboutInfoController::class);
    Route::delete('about-infos/{id}', [AboutInfoController::class, 'destroy'])->name('about-infos.delete');
	
	Route::resource('about-info-landing-pages', AboutInfoLandingPageController::class);
    Route::delete('about-info-landing-pages/{id}', [AboutInfoLandingPageController::class, 'destroy'])->name('about-info-landing-pages.delete');
	
	Route::resource('core-teams', CoreTeamController::class);
    Route::delete('core-teams/{id}', [CoreTeamController::class, 'destroy'])->name('core-teams.delete');
	
	Route::resource('careers', CareerController::class);
    Route::delete('careers/{id}', [CareerController::class, 'destroy'])->name('careers.delete');
	
	
});