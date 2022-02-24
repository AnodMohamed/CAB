<?php
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Asker\AakerDashboardComponent;
use App\Http\Livewire\Expert\ExpertDashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;


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


Route::get('/', HomeComponent::class);


//admin 
Route::middleware(['auth:sanctum','verified','authAdmin'])->group(function(){
    
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
});
//Expert 
Route::middleware(['auth:sanctum','verified','authExpert'])->group(function(){
    Route::get('/expert/dashboard',ExpertDashboardComponent::class)->name('expert.dashboard');

});

//Asker 
Route::middleware(['auth:sanctum','verified','authAsker'])->group(function(){
    Route::get('/asker/dashboard',AakerDashboardComponent::class)->name('asker.dashboard');
});
