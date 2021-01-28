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
        Route::get('/getAdminData', [App\Http\Controllers\admin\adminController::class, 'adminData'])->name('admin.getAdminData');
        Route::post('/adminAdd', [App\Http\Controllers\admin\adminController::class, 'adminAdd'])->name('admin.adminAdd');
        Route::post('/adminDelete', [App\Http\Controllers\admin\adminController::class, 'adminDelete'])->name('admin.adminDelete');
        Route::post('/adminDetailEdit', [App\Http\Controllers\admin\adminController::class, 'adminDetailEdit'])->name('admin.adminDetailEdit');
        Route::post('/adminDataUpdate', [App\Http\Controllers\admin\adminController::class, 'adminDataUpdate'])->name('admin.adminDataUpdate');

        // Slider Section

        Route::get('/slider', [\App\Http\Controllers\admin\HomeSliderController::class,'SliderIndex'])->name('admin.slider');
        Route::post('/addslider', [\App\Http\Controllers\admin\HomeSliderController::class, 'SliderAdd'])->name('admin.addslider');
        Route::get('/getsliderdata', [\App\Http\Controllers\admin\HomeSliderController::class, 'SliderData'])->name('admin.getsliderdata');
        Route::post('/sliderdelete', [\App\Http\Controllers\admin\HomeSliderController::class, 'SliderDelete'])->name('admin.sliderdelete');
        Route::post('/sliderdetails', [\App\Http\Controllers\admin\HomeSliderController::class, 'SliderDetailEdit'])->name('admin.sliderdetails');
        Route::post('/sliderupdate', [\App\Http\Controllers\admin\HomeSliderController::class, 'SliderUpdate'])->name('admin.sliderupdate');

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
         Route::post('/getEditProductsData', [\App\Http\Controllers\admin\products\ProductsController::class,'edit'])->name('admin.getEditProductsData');
         Route::post('/productsUpdate', [\App\Http\Controllers\admin\products\ProductsController::class,'update'])->name('admin.productsUpdate');




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
        Route::post('/Banner', [\App\Http\Controllers\admin\OthersSettingsController::class,'BannerAdd'])->name('admin.Banner');
      Route::post('/promoImageOne', [\App\Http\Controllers\admin\OthersSettingsController::class,'promoImageOne'])->name('admin.promoImageOne');
        Route::post('/promoImageTwo', [\App\Http\Controllers\admin\OthersSettingsController::class,'promoImageTwo'])->name('admin.promoImageTwo');
        Route::post('/promoImageThree', [\App\Http\Controllers\admin\OthersSettingsController::class,'promoImageThree'])->name('admin.promoImageThree');


        //admin panel Orders
        Route::get('/ordeIndex', [App\Http\Controllers\admin\order\orderController::class,'ordeIndex'])->name('admin.ordeIndex');
        Route::get('/getOrdersData', [App\Http\Controllers\admin\order\orderController::class,'getOrdersData'])->name('admin.getOrdersData');
        Route::post('/ordersView', [App\Http\Controllers\admin\order\orderController::class,'ordersView'])->name('admin.ordersView');
        Route::post('/ordersStatusUpdate', [App\Http\Controllers\admin\order\orderController::class,'ordersStatusUpdate'])->name('admin.ordersStatusUpdate');
        Route::get('/ordersPrint/{id}', [App\Http\Controllers\admin\order\orderController::class,'ordersPrint'])->name('admin.ordersPrint');


        //admin panel Review
        Route::get('/review', [App\Http\Controllers\admin\RatingReviewController::class, 'reviewIndex'])->name('admin.review');
        Route::get('/getReviewdata', [App\Http\Controllers\admin\RatingReviewController::class, 'getReviewdata'])->name('admin.getReviewdata');
        Route::post('/deleteReview', [\App\Http\Controllers\admin\RatingReviewController::class, 'deleteReview'])->name('admin.deleteReview');



         // Home page Extra


         Route::get('/homePage', [App\Http\Controllers\admin\AboutPageController::class,'homeAboutIndex'])->name('admin.homePage');
         Route::post('/addHAtitle', [App\Http\Controllers\admin\AboutPageController::class,'addTitle'])->name('admin.addHAtitle');
         Route::post('/addHADescription', [App\Http\Controllers\admin\AboutPageController::class,'addDescription'])->name('admin.addHADescription');
         Route::post('/addHAimage', [App\Http\Controllers\admin\AboutPageController::class,'imageAdd'])->name('admin.addHAimage');
         Route::post('/addHAimage2', [App\Http\Controllers\admin\AboutPageController::class,'imageAdd2'])->name('admin.addHAimage2');
         Route::post('/addHAimage3', [App\Http\Controllers\admin\AboutPageController::class,'imageAdd3'])->name('admin.addHAimage3');
         Route::post('/addResturantMenuimage', [App\Http\Controllers\admin\AboutPageController::class,'imageResturantMenuAdd'])->name('admin.addResturantMenuimage');
         Route::post('/addEXPimage', [App\Http\Controllers\admin\AboutPageController::class,'imageEXPAdd'])->name('admin.addEXPimage');



         Route::get('/getFSdata', [App\Http\Controllers\admin\AboutPageController::class,'getHomeFeaturedSpecialsData'])->name('admin.getFSdata');
         Route::post('/addFSdata', [App\Http\Controllers\admin\AboutPageController::class,'homeSFAdd'])->name('admin.addFSdata');
         Route::post('/homeFSdelete', [App\Http\Controllers\admin\AboutPageController::class,'HomeFSDelete'])->name('admin.homeFSdelete');
         Route::post('/HomeFSEdit', [App\Http\Controllers\admin\AboutPageController::class,'HomeFSEdit'])->name('admin.HomeFSEdit');
         Route::post('/HomeFSUpdate', [App\Http\Controllers\admin\AboutPageController::class,'HomeFSUpdate'])->name('admin.HomeFSUpdate');


         Route::get('/getEXPdata', [App\Http\Controllers\admin\AboutPageController::class,'getHomeExclusiveSpecialsData'])->name('admin.getEXPdata');
         Route::post('/homeEXPAdd', [App\Http\Controllers\admin\AboutPageController::class,'homeEXPAdd'])->name('admin.homeEXPAdd');
         Route::post('/HomeEXFDelete', [App\Http\Controllers\admin\AboutPageController::class,'HomeEXFDelete'])->name('admin.HomeEXFDelete');
         Route::post('/HomeEXPEdit', [App\Http\Controllers\admin\AboutPageController::class,'HomeEXPEdit'])->name('admin.HomeEXPEdit');
         Route::post('/HomeEXPUpdate', [App\Http\Controllers\admin\AboutPageController::class,'HomeEXPUpdate'])->name('admin.HomeEXPUpdate');



         Route::get('/getTestimonialData', [App\Http\Controllers\admin\AboutPageController::class,'getHomeTestimonialData'])->name('admin.getTestimonialData');
         Route::post('/TestimonialAdd', [App\Http\Controllers\admin\AboutPageController::class,'TestimonialAdd'])->name('admin.TestimonialAdd');
         Route::post('/TestimonialDelete', [App\Http\Controllers\admin\AboutPageController::class,'HomeTestimonialDelete'])->name('admin.TestimonialDelete');
         Route::post('/getTestimonialEditData', [App\Http\Controllers\admin\AboutPageController::class,'HomeTestimonialEdit'])->name('admin.getTestimonialEditData');
         Route::post('/TestimonilaUpdate', [App\Http\Controllers\admin\AboutPageController::class,'TestimonilaUpdate'])->name('admin.TestimonilaUpdate');


    });



});





//Clear Cache facade value:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize:clear');
    return '<h1>optimize cleared</h1>';
});




//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});



//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear Config cache:
Route::get('/Storage-link', function() {
    $exitCode = Artisan::call('storage:link');
    return '<h1>Storage Link Created</h1>';
});


// //Clear Config cache:
// Route::get('/migrate', function() {
//     $exitCode = Artisan::call('migrate');
//     return '<h1>migrate  Created</h1>';
// });


