<?php

use Illuminate\Support\Facades\Route;

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




Route::get('/', [App\Http\Controllers\admin\homeController::class, 'adminHome'])->name('admin.adminHome')->middleware('loginCheck');;


Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [App\Http\Controllers\admin\loginController::class, 'loginIndex'])->name('admin.login');
    Route::post('/onLogin', [App\Http\Controllers\admin\loginController::class, 'onLogin'])->name('admin.onLogin');
    Route::get('/logout', [App\Http\Controllers\admin\loginController::class, 'onLogout'])->name('admin.logout');

    Route::group(['middleware' => 'loginCheck'], function () {



        // Admin Route
        Route::get('/adminPannel', [App\Http\Controllers\admin\adminController::class, 'adminIndex'])->name('admin.adminPannel');
        Route::get('/getAdminData', [App\Http\Controllers\admin\adminController::class, 'adminData'])->name('admin.getAdmindata');
        Route::post('/adminAdd', [App\Http\Controllers\admin\adminController::class, 'adminAdd'])->name('admin.adminAdd');
        Route::post('/adminDelete', [App\Http\Controllers\admin\adminController::class, 'adminDelete'])->name('admin.adminDelete');
        Route::post('/adminDetailEdit', [App\Http\Controllers\admin\adminController::class, 'adminDetailEdit'])->name('admin.adminDetailEdit');
        Route::post('/adminDataUpdate', [App\Http\Controllers\admin\adminController::class, 'adminDataUpdate'])->name('admin.adminDataUpdate');

        // Slider Section
        Route::get('/slider', [\App\Http\Controllers\Admin\HomeSliderController::class,'SliderIndex'])->name('admin.slider');
        Route::get('/slider', [\App\Http\Controllers\Admin\HomeSliderController::class,'SliderIndex'])->name('admin.slider');
        Route::post('/addslider', [\App\Http\Controllers\Admin\HomeSliderController::class, 'SliderAdd'])->name('admin.addslider');
        Route::get('/getsliderdata', [\App\Http\Controllers\Admin\HomeSliderController::class, 'SliderData'])->name('admin.getsliderdata');
        Route::post('/sliderdelete', [\App\Http\Controllers\Admin\HomeSliderController::class, 'SliderDelete'])->name('admin.sliderdelete');
        Route::post('/sliderdetails', [\App\Http\Controllers\Admin\HomeSliderController::class, 'SliderDetailEdit'])->name('admin.sliderdetails');
        Route::post('/sliderupdate', [\App\Http\Controllers\Admin\HomeSliderController::class, 'SliderUpdate'])->name('admin.sliderupdate');


        // Brand  Section
        Route::resource('brand', \App\Http\Controllers\admin\products\ProductBrandController::class,[
            'except'=>['destroy','show','update']
        ]);
        Route::get('/brands', [\App\Http\Controllers\admin\products\ProductBrandController::class,'index'])->name('admin.brands');
        Route::get('/getBrandsData', [\App\Http\Controllers\admin\products\ProductBrandController::class,'getBrandData'])->name('admin.getBrandsData');
        Route::get('/getBrandsData', [\App\Http\Controllers\admin\products\ProductBrandController::class,'getBrandData'])->name('admin.getBrandsData');
        Route::post('/BrandDelete', [\App\Http\Controllers\admin\products\ProductBrandController::class,'destroy'])->name('admin.BrandDelete');
        Route::post('/getBrandEditData', [\App\Http\Controllers\admin\products\ProductBrandController::class,'show'])->name('admin.getBrandEditData');
        Route::post('/updateBrand', [\App\Http\Controllers\admin\products\ProductBrandController::class,'updateBrand'])->name('admin.updateBrand');

        // Category  Section
        Route::get('/categories', [\App\Http\Controllers\admin\products\ProductCategoriesController::class,'index'])->name('admin.categories');
        Route::get('/getCategoriesData', [\App\Http\Controllers\admin\products\ProductCategoriesController::class,'getCategoriesData'])->name('admin.getCategoriesData');
        Route::get('/getCategoriesParantData', [\App\Http\Controllers\admin\products\ProductCategoriesController::class,'getCategoriesParantData'])->name('admin.getCategoriesParantData');
        Route::post('/addCategory', [\App\Http\Controllers\admin\products\ProductCategoriesController::class,'store'])->name('admin.addCategory');
        Route::post('/deleteCategory', [\App\Http\Controllers\admin\products\ProductCategoriesController::class,'destroy'])->name('admin.deleteCategory');
        Route::post('/getEditCategoryData', [\App\Http\Controllers\admin\products\ProductCategoriesController::class,'edit'])->name('admin.getEditCategoryData');
        Route::post('/updateCategory', [\App\Http\Controllers\admin\products\ProductCategoriesController::class,'update'])->name('admin.updateCategory');

        //Product Section
        Route::get('/products', [\App\Http\Controllers\admin\products\ProductsController::class,'index'])->name('admin.products');


    });



});
