<?php

use App\Http\Livewire\Admin\AddCategoryComponent;
use App\Http\Livewire\Admin\AddTransactionIDComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\ChangeExpertStauts;
use App\Http\Livewire\Admin\ManageAskersComponent;
use App\Http\Livewire\Admin\ManageExpertsComponent;
use App\Http\Livewire\Admin\ViewExpProfessionalProfileComponent;
use App\Http\Livewire\Admin\CategoriesComponent;
use App\Http\Livewire\Admin\EditCategoryComponent;
use App\Http\Livewire\Admin\ExpertTransactionsComponent;
use App\Http\Livewire\Admin\ManageReceivedComponent;
use App\Http\Livewire\Asker\AakerDashboardComponent;
use App\Http\Livewire\Asker\AddReviewComponent;
use App\Http\Livewire\Asker\AlertAskercomponent;
use App\Http\Livewire\Asker\AppointmentComponent;
use App\Http\Livewire\Asker\ViewAppointmentComponent;
use App\Http\Livewire\ChatComponent;
use App\Http\Livewire\Expert\AddAnAppointmentComponent;
use App\Http\Livewire\Expert\ExpertDashboardComponent;
use App\Http\Livewire\Expert\ExpertNotificationComponent;
use App\Http\Livewire\Expert\ExpProfessionalProfileComponent;
use App\Http\Livewire\Expert\ManageAppointmentsComponent;
use App\Http\Livewire\Expert\UploadeFileComponent;
use App\Http\Livewire\Expert\ViewReviewComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\MessageComponent;
use App\Http\Livewire\ProfileComponent;
use App\Http\Livewire\SearchExpertComponent;
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
Route::get('home/experts', SearchExpertComponent::class)->name('Experts');
Route::get('home/experts/viewprofile/{user_id:id}', ViewExpertProfileComponent::class)->name('viewprofile');

//all users has been registered
Route::middleware(['auth:sanctum','verified','auth'])->group(function(){
    Route::get('/profile',ProfileComponent::class)->name('profile');
    Route::get('/user/Messeges',MessageComponent::class)->name('user.Messeges');
    Route::get('/Chat/{user_id:id}',ChatComponent::class)->name('Chat');

});

//admin 
Route::middleware(['auth:sanctum','verified','authAdmin'])->group(function(){
    
    Route::get('/admin/Askers',ManageAskersComponent::class)->name('admin.Askers');
    Route::get('/admin/Experts',ManageExpertsComponent::class)->name('admin.Experts');
    Route::get('/admin/Experts/ExpertProfessionalProfile/{user_id:id}',ViewExpProfessionalProfileComponent::class)->name('admin.Experts.ExpertProfessionalProfile');
    Route::get('/admin/Experts/ChangeExpertStatus/{user_id:id}',ChangeExpertStauts::class)->name('admin.Experts.ChangeExpertStatus');
    Route::get('/admin/Categories',CategoriesComponent::class)->name('admin.Categories');
    Route::get('/admin/editcategory/{category_slug:slug}',EditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/addcategory',AddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/expertTransactions',ExpertTransactionsComponent::class)->name('admin.expertTransactions');
    Route::get('/admin/addTransactiony/{appointment_id:id}',AddTransactionIDComponent::class)->name('admin.addTransaction');


});
//Expert 
Route::middleware(['auth:sanctum','verified','authExpert'])->group(function(){
    Route::get('/expert/profile/professional',ExpProfessionalProfileComponent::class)->name('expert.profile.professional');
    Route::get('/expert/profile/uploadeFile',UploadeFileComponent::class)->name('expert.profile.uploadeFile');
    Route::get('/expert/appointments',ManageAppointmentsComponent::class)->name('expert.appointments');
    Route::get('/expert/addAppointment',AddAnAppointmentComponent::class)->name('expert.addAppointment');
    Route::get('/expert/notification',ExpertNotificationComponent::class)->name('expert.notification');
    Route::get('/expert/view/review',ViewReviewComponent::class)->name('expert.view.review');

});

//Asker 
Route::middleware(['auth:sanctum','verified','authAsker'])->group(function(){
    Route::get('/asker/appointments',ViewAppointmentComponent::class)->name('asker.appointments');
    Route::get('/asker/appointment/{user_id:id}',AppointmentComponent::class)->name('asker.appointment');
    Route::get('/asker/add/review/{app_id:id}',AddReviewComponent::class)->name('asker.review');
    Route::get('/asker/alert',AlertAskercomponent::class)->name('asker.alert');

});
