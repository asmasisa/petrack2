<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VetoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetController;



Route::get('/home', [HomeController::class,'index']);
Route::get('/',function(){
    return view('Pages.home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {


    
    //Route Pet
    Route::get('/pet/petprofil', [PetController::class,'PetProfil'])->name('pet.PetProfil');
    Route::get('/pet/create', [PetController::class,'create'])->name('pet.create');
    Route::post('/pet/store', [PetController::class,'store'])->name('pet.store');
    Route::get('/{pet}/edit', [PetController::class,'edit'])->name('pet.edit');
    Route::put('/{pet}', [PetController::class,'update'])->name('pet.update');
    Route::delete('/{pet}', [PetController::class,'destroy'])->name('pet.destroy');


    
    // Routes User
    Route::post('/accueil', [UserController::class,'Accueil'])->name('accueil');
    Route::get('/user', [UserController::class,'User'])->name('user');
    Route::get('/publi', [UserController::class, 'Publi'])->name('publi');
    Route::get('/messagerie', [UserController::class,'Messagerie'])->name('messagerie');
    Route::get('/param', [UserController::class,'Param'])->name('param');
    Route::get('/planning', [UserController::class,'planning'])->name('planning');
   


    
    

    // Routes Véto
    
    
   

    Route::post('/registerveto/store', [VetoController::class,'store'])->name('registerveto.store');
    Route::post('/registerveto/store', [VetoController::class,'store'])->name('registerveto.store');
    Route::get('/registerveto/create', [PetController::class,'create'])->name('registerveto.create');
    Route::get('/véto', [VetoController::class,'véto'])->name('véto');
    Route::get('/publiveto', [VetoController::class, 'Publi'])->name('publiveto');
    Route::get('/monprofil', [VetoController::class,'monprofil'])->name('monprofil');
    Route::get('/RDVs', [VetoController::class,'RDVs'])->name('RDVs');
    
    // Routes Admin
    Route::get('/admin', [AdminController::class,'Admin'])->name('admin');
    Route::get('/adminuser', [AdminController::class,'AdminUser'])->name('adminuser');
    Route::get('/adminpubli', [AdminController::class,'AdminPubli'])->name('adminpubli');
    Route::get('/adminveto', [AdminController::class,'AdminVéto'])->name('adminvéto');
    
   // Routes pour approuver ou rejeter une inscription
Route::put('/adminveto/approve/{id}', [AdminController::class, 'approve'])->name('adminveto.approve');
Route::delete('/adminveto/reject/{id}', [AdminController::class, 'reject'])->name('adminveto.reject');


});


