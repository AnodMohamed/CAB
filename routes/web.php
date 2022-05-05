<?php

use App\Http\Livewire\Admin\AddCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\ChangeExpertStauts;
use App\Http\Livewire\Admin\ManageAskersComponent;
use App\Http\Livewire\Admin\ManageExpertsComponent;
use App\Http\Livewire\Admin\ViewExpProfessionalProfileComponent;
use App\Http\Livewire\Admin\CategoriesComponent;
use App\Http\Livewire\Admin\EditCategoryComponent;
use App\Http\Livewire\Asker\AakerDashboardComponent;
use App\Http\Livewire\Expert\ExpertDashboardComponent;
use App\Http\Livewire\Expert\ExpProfessionalProfileComponent;
use App\Http\Livewire\Expert\UploadeFileComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ProfileComponent;
use App\Http\Livewire\ViewExpertProfileComponent;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;

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


Route::get('/', HomeComponent::class)->name('home');
Route::get('home/experts', HomeComponent::class)->name('Experts');
Route::get('home/experts/viewprofile/{user_id:id}', ViewExpertProfileComponent::class)->name('viewprofile');

//all users has been registered
Route::middleware(['auth:sanctum','verified','auth'])->group(function(){
    Route::get('/profile',ProfileComponent::class)->name('profile');

});

//admin 
Route::middleware(['auth:sanctum','verified','authAdmin'])->group(function(){
    
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/Askers',ManageAskersComponent::class)->name('admin.Askers');
    Route::get('/admin/Experts',ManageExpertsComponent::class)->name('admin.Experts');
    Route::get('/admin/Experts/ExpertProfessionalProfile/{user_id:id}',ViewExpProfessionalProfileComponent::class)->name('admin.Experts.ExpertProfessionalProfile');
    Route::get('/admin/Experts/ChangeExpertStatus/{user_id:id}',ChangeExpertStauts::class)->name('admin.Experts.ChangeExpertStatus');
    Route::get('/admin/Categories',CategoriesComponent::class)->name('admin.Categories');
    Route::get('/admin/editcategory/{category_slug:slug}',EditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/addcategory',AddCategoryComponent::class)->name('admin.addcategory');

});
//Expert 
Route::middleware(['auth:sanctum','verified','authExpert'])->group(function(){
    Route::get('/expert/dashboard',ExpertDashboardComponent::class)->name('expert.dashboard');
    Route::get('/expert/profile/professional',ExpProfessionalProfileComponent::class)->name('expert.profile.professional');
    Route::get('/expert/profile/uploadeFile',UploadeFileComponent::class)->name('expert.profile.uploadeFile');

});

//Asker 
Route::middleware(['auth:sanctum','verified','authAsker'])->group(function(){
    Route::get('/asker/dashboard',AakerDashboardComponent::class)->name('asker.dashboard');
});
