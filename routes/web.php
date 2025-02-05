<?php

use App\Http\Controllers\ApiCrmController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SousServiceController;
use App\Http\Controllers\TemoignageController;
use Illuminate\Support\Facades\Route;

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
//compter les vues

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/login', [FrontController::class, 'login'])->name('login');
Route::get('/logout', [FrontController::class, 'logout'])->name('logout');
Route::post('/login', [FrontController::class, 'login_post'])->name('login.post');
Route::get('/api-logo', [ApiCrmController::class, 'logo'])->name('logo');
Route::get('/politique', [FrontController::class, 'politique'])->name('politique');
Route::get('/mentions', [FrontController::class, 'mentions'])->name('mentions');
Route::get('/get_devis', [FrontController::class, 'get_devis'])->name('get_devis');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontController::class, 'contact_post'])->name('contact.store');
Route::get('/blog', [FrontController::class, 'blogs'])->name('blog');
Route::get('/projet', [FrontController::class, 'projet'])->name('projet');



Route::prefix('page')->group(function () {
    Route::middleware(['track.visits'])->group(function () {
        Route::get('/blog/{id}/{titre}', [FrontController::class, 'article'])->name('article');
        Route::get('/list/service', [FrontController::class, 'services'])->name('service_list');
        Route::post('/get_devis.post', [FrontController::class, 'get_devis_post'])->name('get_devis.post');
    });
});



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [FrontController::class, 'dashboard'])->name('dashboard');
    Route::get('/about-config', [ConfigurationController::class, 'about_config'])->name('about-config');
    Route::resource('blogs', BlogController::class);
    Route::resource('projets', ProjetController::class);
    Route::post('/admin/projet.deleteImage', [ProjetController::class, 'deleteSingleImage']);
    Route::resource('temoignages', TemoignageController::class);
    Route::resource('configurations', ConfigurationController::class);
    Route::post('/about/configuration', [ConfigurationController::class, 'update_about'])->name('update_about');
    Route::resource('banners', BannerController::class);
    Route::resource('services', ServiceController::class);


    //gestion des sous services
    Route::get('/sous_service/{id}', [SousServiceController::class, 'index'])->name('sous_service');
    Route::post('/sous_service/{id}/delete', [SousServiceController::class, 'destroy'])->name('sous_service.destroy');
    Route::post('/sous_service', [SousServiceController::class, 'store'])->name('sous_service.store');
    Route::post('/sous_service.update/{id}/update', [SousServiceController::class, 'update'])->name('sous_service.update');


    Route::post('/update-project-order', [ProjetController::class, 'updateProjectOrder'])->name('update.project.order');
    Route::post('/update-services-order', [ServiceController::class, 'updateServicesOrder'])->name('update.service.order');
});



Route::get('/{slug}', [FrontController::class, 'projet_details'])->name('projet_details');
Route::get('/service/{id}/{titre}', [FrontController::class, 'service'])->name('service');
Route::get('/{service}/{slug}', [FrontController::class, 's_service'])->name('s_service');