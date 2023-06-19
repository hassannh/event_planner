<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EquipementController;
use App\Http\Controllers\FrontEnd\FrontEndController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
    
   
  
   


    Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('StaticEqui',[App\Http\Controllers\Admin\DashboardController::class, 'index2']);
    //category route
    Route::get('/equipement', [App\Http\Controllers\Admin\EquipementController::class, 'index'])->name('equipement.index');

    Route::get('/equipement/create', [App\Http\Controllers\Admin\EquipementController::class, 'create'])->name('equipement.create');
    Route::post('/equipement',[App\Http\Controllers\Admin\EquipementController::class, 'store'])->name('equipement.store');
    Route::get('/equipement/{equipement}/edit',[App\Http\Controllers\Admin\EquipementController::class, 'edit'])->name('equipement.edit');
    Route::put('/equipement/{equipement}',[App\Http\Controllers\Admin\EquipementController::class, 'update'])->name('equipement.update');
    Route::delete('/equipement/{equipement}',[App\Http\Controllers\Admin\EquipementController::class, 'destory'])->name('equipement.destory');
    
    
    
    //personnel
    Route::get('/personnel', [App\Http\Controllers\Admin\PersonnelController::class, 'index'])->name('personnel.index');
    Route::get('/personnel/create', [App\Http\Controllers\Admin\PersonnelController::class, 'create'])->name('personnel.create');
    Route::post('/personnel',[App\Http\Controllers\Admin\PersonnelController::class, 'store'])->name('personnel.store');
    Route::get('/personnel/{id}/edit',[App\Http\Controllers\Admin\PersonnelController::class, 'edit'])->name('personnel.edit');
    Route::delete('/personnel/{id}',[App\Http\Controllers\Admin\PersonnelController::class, 'destroy'])->name('personnel.destroy');
    Route::put('/personnel/{id}',[App\Http\Controllers\Admin\PersonnelController::class, 'update'])->name('personnel.update');
    
    //user
    Route::get('/user', [App\Http\Controllers\Admin\UsersControllr::class, 'index'])->name('user.index');
    Route::get('/user/create', [App\Http\Controllers\Admin\UsersControllr::class, 'create'])->name('user.create');
    Route::post('/user', [App\Http\Controllers\Admin\UsersControllr::class, 'store'])->name('user.store');
    Route::delete('/user/{user}', [App\Http\Controllers\Admin\UsersControllr::class, 'destory'])->name('user.destory');
    Route::get('/user/{id}/edit', [App\Http\Controllers\Admin\UsersControllr::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}',[App\Http\Controllers\Admin\UsersControllr::class, 'update'])->name('user.update');

 
    //impression
    Route::get('/impression', [App\Http\Controllers\Admin\ImpressionController::class, 'index'])->name('impression.index');
    Route::get('/impression/create', [App\Http\Controllers\Admin\ImpressionController::class, 'create'])->name('impression.create');
    Route::post('/impression',[App\Http\Controllers\Admin\ImpressionController::class, 'store'])->name('impression.store');
    Route::get('/impression/{id}/edit',[App\Http\Controllers\Admin\ImpressionController::class, 'edit'])->name('impression.edit');
    Route::put('/impression/{id}',[App\Http\Controllers\Admin\ImpressionController::class, 'update'])->name('impression.update');
    Route::get('/impression-image/{impression_image_id}/delete',[App\Http\Controllers\Admin\ImpressionController::class, 'destroyImage'])->name('impression.destroyImage');
    Route::delete('/impression/{impression_id}/delete',[App\Http\Controllers\Admin\ImpressionController::class, 'destroy'])->name('impression.destroy');

    //articles controllers
    Route::get('/articles', [App\Http\Controllers\Admin\AtriclesController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [App\Http\Controllers\Admin\AtriclesController::class, 'create'])->name('articles.create');
    Route::post('/articles',[App\Http\Controllers\Admin\AtriclesController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit',[App\Http\Controllers\Admin\AtriclesController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}',[App\Http\Controllers\Admin\AtriclesController::class, 'update'])->name('articles.update');
    Route::get('/articles-image/{article_image_id}/delete',[App\Http\Controllers\Admin\AtriclesController::class, 'destroyImage'])->name('articles.destroyImage');
    Route::delete('/articles/{article_id}/delete',[App\Http\Controllers\Admin\AtriclesController::class, 'destroy'])->name('articles.destroy');

    //typeEvent
    Route::get('/typeevent', [App\Http\Controllers\Admin\TypeEventController::class, 'index'])->name('typeevent.index');
    Route::get('/typeevent/create', [App\Http\Controllers\Admin\TypeEventController::class, 'create'])->name('typeevent.create');
    Route::post('/typeevent',[App\Http\Controllers\Admin\TypeEventController::class, 'store'])->name('typeevent.store');
    Route::delete('/typeevent/{idTypeEvent}/delete',[App\Http\Controllers\Admin\TypeEventController::class, 'destory'])->name('typeevent.destory');

    //salle
    Route::get('/salle', [App\Http\Controllers\Admin\salleController::class, 'index'])->name('salle.index');
    Route::get('/salle/create', [App\Http\Controllers\Admin\salleController::class, 'create'])->name('salle.create');
    Route::post('/salle',[App\Http\Controllers\Admin\salleController::class, 'store'])->name('salle.store');
    Route::get('/salle/{salle}/edit',[App\Http\Controllers\Admin\salleController::class, 'edit'])->name('salle.edit');
    Route::put('/salle/{salle}',[App\Http\Controllers\Admin\salleController::class, 'update'])->name('salle.update');
    Route::delete('/salle/{salle}',[App\Http\Controllers\Admin\salleController::class, 'destroy'])->name('salle.destroy');
    Route::get('/salles-image/{salle_image_id}/delete',[App\Http\Controllers\Admin\salleController::class, 'destroyImage'])->name('salle.destroyImage');
    
    //evenement
    Route::get('/evenement', [App\Http\Controllers\Admin\EvenementController::class, 'index'])->name('evenement.index');

    //service
    Route::get('/service', [App\Http\Controllers\Admin\serviceController::class, 'index'])->name('service.index');
    Route::get('/service/create', [App\Http\Controllers\Admin\serviceController::class, 'create'])->name('service.create');
    Route::post('/service',[App\Http\Controllers\Admin\serviceController::class, 'store'])->name('service.store');
    Route::get('/service/{service}/edit',[App\Http\Controllers\Admin\serviceController::class, 'edit'])->name('service.edit');
    Route::put('/service/{service}',[App\Http\Controllers\Admin\serviceController::class, 'update'])->name('service.update');
    Route::delete('/service/{service}',[App\Http\Controllers\Admin\serviceController::class, 'destory'])->name('service.destory');

    //sousService
    Route::get('/sousService', [App\Http\Controllers\Admin\SousServiceController::class, 'index'])->name('sousService.index');
    Route::get('/sousService/create', [App\Http\Controllers\Admin\SousServiceController::class, 'create'])->name('sousService.create');
    Route::post('/sousService',[App\Http\Controllers\Admin\SousServiceController::class, 'store'])->name('sousService.store');
    Route::get('/sousService/{sousService}/edit',[App\Http\Controllers\Admin\SousServiceController::class, 'edit'])->name('sousService.edit');
    Route::put('/sousService/{id}',[App\Http\Controllers\Admin\SousServiceController::class, 'update'])->name('sousService.update');
    Route::get('/sousService-image/{sousService_image_id}/delete',[App\Http\Controllers\Admin\SousServiceController::class, 'destroyImage'])->name('sousService.destroyImage');
    Route::delete('/sousService/{sousService_id}/delete',[App\Http\Controllers\Admin\SousServiceController::class, 'destroy'])->name('sousService.destroy');
});
  // frontEnd
  Route::get('frontend/index',[App\Http\Controllers\FrontEnd\FrontEndController::class,'index'])->name('frontend.index');
  Route::get('frontend/indexSalle',[App\Http\Controllers\FrontEnd\FrontEndController::class,'indexSalle'])->name('frontend.indexSalle');
  Route::get('frontend/indexPersonnel',[App\Http\Controllers\FrontEnd\FrontEndController::class,'indexPersonnel'])->name('frontend.indexPersonnel');
  Route::get('frontend/indexservice',[App\Http\Controllers\FrontEnd\FrontEndController::class,'indexservice'])->name('frontend.indexservice');
  Route::get('frontend/realisation',[App\Http\Controllers\FrontEnd\FrontEndController::class,'realisation'])->name('frontend.realisation');
  Route::get('frontend/contact',[App\Http\Controllers\FrontEnd\FrontEndController::class,'contact'])->name('frontend.contact');
  //view articles
  Route::get('frontClient/equipement',[App\Http\Controllers\FrontClient\Equipements::class,'equipement'])->name('frontClient.equipement');
  
  
  
  
  Route::get('frontClient/equipements',[App\Http\Controllers\FrontClient\Equipements::class,'dashindex'])->name('frontClient.equipements');
  
  Route::get('frontClient/article/{id}',[App\Http\Controllers\FrontClient\Equipements::class,'article'])->name('frontClient.article');
  //personnel
  
  /*Route::get('frontClient/articlesview/{id}',[App\Http\Controllers\FrontClient\Equipements::class,'view'])->name('frontClient.articlesview');*/
  
  Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  Route::post('home',[App\Http\Controllers\HomeController::class, 'store'])->name('home.store');
  Route::get('frontClient/salle',[App\Http\Controllers\HomeController::class,'salle'])->name('frontClient.salle');
  Route::post('frontClient/salle',[App\Http\Controllers\HomeController::class,'storesalle'])->name('frontClient.storesalle');
   //store data in eventarticle
  Route::post('frontClient/article/',[App\Http\Controllers\HomeController::class,'storeArticle'])->name('frontClient.storeArticle');
  Route::get('frontClient/TableArticle',[App\Http\Controllers\HomeController::class,'indexTableArticle'])->name('frontClient.TableArticle');



  //update Article
Route::post('updateArticle/{id}', [App\Http\Controllers\HomeController::class,'updateTableArticle'])->name('updateArticle');
//Delete from table article
Route::get('deleteArticle/{id}', [App\Http\Controllers\HomeController::class,'deleteArticle']);



//personnel
Route::get('frontClient/personnels',[App\Http\Controllers\HomeController::class,'personnels'])->name('frontClient.personnels');
Route::post('frontClient/personnels', [App\Http\Controllers\HomeController::class ,'storePersonnel'])->name('frontClient.storePersonnel');

Route::get('frontClient/eventPersonnel/{id}',[App\Http\Controllers\HomeController::class,'indexPersonnelEvent'])->name('frontClient.indexPersonnelEvent');
Route::post('frontClient/eventPersonnel',[App\Http\Controllers\HomeController::class,'storePersonnelEvent'])->name('frontClient.storePersonnelEvent');


//table of personnel choosen
Route::get('frontClient/tablePersonnel',[App\Http\Controllers\HomeController::class ,'indexTablePersonnel'])->name('frontClient.tablePersonnel');
//update Personnel
Route::post('updatePersonnel/{id}',[App\Http\Controllers\HomeController::class,'updatePersonnel'])->name('updatePersonnel');
//Delete from table personnel
Route::get('deletePersonnel/{id}',[App\Http\Controllers\HomeController::class, 'deletePersonnel'])->name('deletePersonnel');;


//service
Route::get('frontClient/service',[App\Http\Controllers\HomeController::class ,'service'])->name('frontClient.service');
Route::post('frontClient/service', [App\Http\Controllers\HomeController::class  ,'storeService'])->name('frontClient.storeService');

//table of sousService choosen
Route::get('frontClient/tableservice',[App\Http\Controllers\HomeController::class ,'indexTableService'])->name('frontClient.tableservice');

//Sous Service
Route::get('frontClient/SousService/{id}',[App\Http\Controllers\HomeController::class ,'indexSousService'])->name('frontClient.SousService');
Route::post('frontClient/SousService/',[App\Http\Controllers\HomeController::class ,'storeSousService'])->name('frontClient.SousService');

//Delete from table article
Route::get('deleteService/{id}', [App\Http\Controllers\HomeController::class ,'deleteService']);


Route::get('frontClient/facture',[App\Http\Controllers\HomeController::class ,'indexFacture'])->name('frontClient.facture');
Route::get('frontClient/pdfFacture',[App\Http\Controllers\HomeController::class ,'downloadFacture'])->name('frontClient.pdfFacture');