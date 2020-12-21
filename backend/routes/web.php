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




Route::get('/', [App\Http\Controllers\admin\homeController::class, 'adminHome'])->name('admin.adminHome')->middleware('admin.auth');


Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {

        Route::get('/login', [App\Http\Controllers\admin\loginController::class, 'loginIndex'])->name('admin.login');
        Route::post('/onLogin', [App\Http\Controllers\admin\loginController::class, 'onLogin'])->name('admin.onLogin');
    });

        Route::group(['middleware' => 'admin.auth'], function () {
        //Logout
        Route::get('/logout', [App\Http\Controllers\admin\loginController::class, 'onLogout'])->name('admin.logout');

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
         Route::get('/getProductData', [\App\Http\Controllers\admin\products\ProductsController::class,'getProductData'])->name('admin.getProductData');
         Route::post('/productAdd', [\App\Http\Controllers\admin\products\ProductsController::class,'store'])->name('admin.productAdd');
         Route::post('/onUpload', [\App\Http\Controllers\admin\products\ProductsController::class,'onUpload'])->name('admin.onUpload');
         Route::post('/delete', [\App\Http\Controllers\admin\products\ProductsController::class,'destroy'])->name('admin.delete');


         //contact Model
         Route::get('/contact', [\App\Http\Controllers\admin\contactController::class,'MessageIndex'])->name('admin.contact');
         Route::get('/getContactData', [\App\Http\Controllers\admin\contactController::class,'getContactData'])->name('admin.getContactData');
         Route::post('/deleteContactData', [\App\Http\Controllers\admin\contactController::class,'contactDelete'])->name('admin.contactDelete');

        //Visitor Table
        Route::get('/visitor', [\App\Http\Controllers\admin\VisitorController::class,'VisitorIndex'])->name('admin.VisitorIndex');




        //admin panel Home Page Social Link management
        Route::get('/social', [\App\Http\Controllers\admin\SocialController::class,'SocialIndex'])->name('admin.social');
        Route::post('/facebook', [\App\Http\Controllers\admin\SocialController::class,'addFacebook'])->name('admin.facebook');
        Route::post('/twitter', [\App\Http\Controllers\admin\SocialController::class,'addTwitter'])->name('admin.twitter');
        Route::post('/youtube', [\App\Http\Controllers\admin\SocialController::class,'addYoutube'])->name('admin.youtube');
        Route::post('/instragram', [\App\Http\Controllers\admin\SocialController::class,'addInstragram'])->name('admin.instragram');
        Route::post('/linkin', [\App\Http\Controllers\admin\SocialController::class,'addLinkin'])->name('admin.linkin');
        Route::post('/google', [\App\Http\Controllers\admin\SocialController::class,'addGoogle'])->name('admin.google');


        //admin panel Home Page Others management with social URL
        Route::get('/others', [\App\Http\Controllers\admin\OthersSettingsController::class,'otherIndex'])->name('admin.others');
        Route::post('/address', [\App\Http\Controllers\admin\OthersSettingsController::class,'addAddress'])->name('admin.address');
        Route::post('/phone', [\App\Http\Controllers\admin\OthersSettingsController::class,'addPhone'])->name('admin.phone');
        Route::post('/email', [\App\Http\Controllers\admin\OthersSettingsController::class,'addEmail'])->name('admin.email');
        Route::post('/title', [\App\Http\Controllers\admin\OthersSettingsController::class,'addTitle'])->name('admin.title');
        Route::post('/gmap', [\App\Http\Controllers\admin\OthersSettingsController::class,'addGmap'])->name('admin.gmap');
        Route::post('/logo', [\App\Http\Controllers\admin\OthersSettingsController::class,'logoAdd'])->name('admin.logo');



        //admin panel Orders
        Route::get('/ordeIndex', [\App\Http\Controllers\admin\OrderModelController::class,'ordeIndex'])->name('admin.ordeIndex');





    });



});
