<?php

use App\Http\Controllers\Frontend\IndexController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('login', [AdminController::class, 'loginForm']);
	Route::post('login',[AdminController::class, 'store'])->name('admin/login');
});








// Админ все Маршруты

Route::middleware(['auth:admin'])->group(function() {

    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');

    Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('admin/profile', [\App\Http\Controllers\Backend\AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('admin/profile/edit', [\App\Http\Controllers\Backend\AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('admin/profile/store', [\App\Http\Controllers\Backend\AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('admin/change/password', [\App\Http\Controllers\Backend\AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('update/change/password', [\App\Http\Controllers\Backend\AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');
});

// User все Маршруты
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');



Route::get('/', [IndexController::class, 'index'])->name('/');
Route::get('user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');

// Admin Бренд все маршруты
Route::prefix('brands')->group(function (){

    Route::get('/view', [\App\Http\Controllers\Backend\BrendController::class, 'BrandView'])->name('all.brands');
    Route::post('/store', [\App\Http\Controllers\Backend\BrendController::class, 'BrandStore'])->name('store');
    Route::get('/edit/{id}', [\App\Http\Controllers\Backend\BrendController::class, 'BrandEdit'])->name('brand.edit');
    Route::get('/delete/{id}', [\App\Http\Controllers\Backend\BrendController::class, 'BrandDelete'])->name('brand.delete');
    Route::post('/update', [\App\Http\Controllers\Backend\BrendController::class, 'BrandUpdate'])->name('brand.update');

});


 // Admin Категории все маршруты

Route::prefix('category')->group(function (){

    Route::get('/view', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryView'])->name('all.category');
    Route::post('/store', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::get('/delete/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryDelete'])->name('category.delete');
    Route::post('/update/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryUpdate'])->name('category.update');;
    // Admin Подкатегории все маршруты
    Route::get('/sub/view', [\App\Http\Controllers\Backend\SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
    Route::post('/sub//store', [\App\Http\Controllers\Backend\SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    Route::get('/sub//edit/{id}', [\App\Http\Controllers\Backend\SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::get('/sub//delete/{id}', [\App\Http\Controllers\Backend\SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
    Route::post('/sub//update', [\App\Http\Controllers\Backend\SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    // Admin Подкатегории1 все маршруты
    Route::get('/sub/sub/view', [\App\Http\Controllers\Backend\SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
    Route::get('/subcategory/ajax/{category_id}', [\App\Http\Controllers\Backend\SubCategoryController::class, 'GetSubCategory']);
    Route::get('/subsubcategory/ajax/{subcategory_id}', [\App\Http\Controllers\Backend\SubCategoryController::class, 'GetSubSubCategory']);
    Route::post('/sub/sub//store', [\App\Http\Controllers\Backend\SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/sub/sub//edit/{id}', [\App\Http\Controllers\Backend\SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::get('/sub/sub//delete/{id}', [\App\Http\Controllers\Backend\SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
    Route::post('/sub/sub//update', [\App\Http\Controllers\Backend\SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');


});


// Admin Продукт все маршруты
Route::prefix('products')->group(function (){

    Route::get('/add', [\App\Http\Controllers\Backend\ProductController::class, 'AddProduct'])->name('add-product');
    Route::post('/store', [\App\Http\Controllers\Backend\ProductController::class, 'StoreProduct'])->name('product-store');
    Route::get('/manage', [\App\Http\Controllers\Backend\ProductController::class, 'ManageProduct'])->name('manage-product');
    Route::get('/edit/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'EditProduct'])->name('product.edit');
    Route::post('/data/update', [\App\Http\Controllers\Backend\ProductController::class, 'ProductDataUpdate'])->name('product-update');
    Route::post('/image/update', [\App\Http\Controllers\Backend\ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
    Route::post('/thambnail/update', [\App\Http\Controllers\Backend\ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
    Route::get('/multiimg/delete/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
    Route::get('/inactive/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'ProductActive'])->name('product.active');
    Route::get('/delete/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'ProductDelete'])->name('product.delete');

});


// Admin Slider все маршруты

Route::prefix('slider')->group(function(){
    Route::get('/view', [\App\Http\Controllers\Backend\SliderController::class, 'SliderView'])->name('manage-slider');
    Route::post('/store', [\App\Http\Controllers\Backend\SliderController::class, 'SliderStore'])->name('slider.store');
    Route::get('/edit/{id}', [\App\Http\Controllers\Backend\SliderController::class, 'SliderEdit'])->name('slider.edit');
    Route::post('/update', [\App\Http\Controllers\Backend\SliderController::class, 'SliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}', [\App\Http\Controllers\Backend\SliderController::class, 'SliderDelete'])->name('slider.delete');
    Route::get('/inactive/{id}', [\App\Http\Controllers\Backend\SliderController::class, 'SliderInactive'])->name('slider.inactive');
    Route::get('/active/{id}', [\App\Http\Controllers\Backend\SliderController::class, 'SliderActive'])->name('slider.active');

});

/// Сменить язык все маршруты  ////
Route::get('/language/russian', [\App\Http\Controllers\Frontend\LanguageController::class, 'Russian'])->name('russian.language');
Route::get('/language/english', [\App\Http\Controllers\Frontend\LanguageController::class, 'English'])->name('english.language');

// Frontend progect datail url
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);


// Frontend Product Tags Page
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);
// Frontend SubCategory wise Data
Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCatWiseProduct']);

// Product View Modal with Ajax
//Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

// Add to Cart Store Data
Route::post('/cart/data/store/{id}', [\App\Http\Controllers\Frontend\CartController::class, 'AddToCart']);
Route::get('/product/mini/cart/', [\App\Http\Controllers\Frontend\CartController::class, 'AddMiniCart']);
Route::get('/minicart/product-remove/{rowId}', [\App\Http\Controllers\Frontend\CartController::class, 'RemoveMiniCart']);

// Add to Wishlist
Route::post('/add-to-wishlist/{product_id}', [\App\Http\Controllers\Frontend\CartController::class, 'AddToWishlist']);

Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function() {
// Wishlist page
    Route::get('/wishlist', [\App\Http\Controllers\User\WishlistController::class, 'ViewWishlist'])->name('wishlist');
    Route::get('/get-wishlist-product', [\App\Http\Controllers\User\WishlistController::class, 'GetWishlistProduct']);
    Route::get('/wishlist-remove/{id}', [\App\Http\Controllers\User\WishlistController::class, 'RemoveWishlistProduct']);
    Route::get('/cancel/orders', [\App\Http\Controllers\User\AllUserController::class, 'CancelOrders'])->name('cancel.orders');
    Route::post('/return/order/{order_id}', [\App\Http\Controllers\User\AllUserController::class, 'ReturnOrder'])->name('return.order');
    Route::get('/return/order/list', [\App\Http\Controllers\User\AllUserController::class, 'ReturnOrderList'])->name('return.order.list');
    /// Order Traking Route
    Route::get('/order/tracking', [\App\Http\Controllers\User\AllUserController::class, 'OrderTraking'])->name('order.tracking');

});


// My Cart Page All Routes
Route::get('/mycart', [\App\Http\Controllers\User\CartPageController::class, 'MyCart'])->name('mycart');
Route::get('/user/get-cart-product', [\App\Http\Controllers\User\CartPageController::class, 'GetCartProduct']);
Route::get('/user/cart-remove/{rowId}', [\App\Http\Controllers\User\CartPageController::class, 'RemoveCartProduct']);
Route::get('/cart-increment/{rowId}', [\App\Http\Controllers\User\CartPageController::class, 'CartIncrement']);
Route::get('/cart-decrement/{rowId}', [\App\Http\Controllers\User\CartPageController::class, 'CartDecrement']);


// Admin Coupons All Routes

Route::prefix('coupons')->group(function() {

    Route::get('/view', [\App\Http\Controllers\Backend\CouponController::class, 'CouponView'])->name('manage-coupon');
    Route::post('/store', [\App\Http\Controllers\Backend\CouponController::class, 'CouponStore'])->name('coupon.store');

    Route::get('/edit/{id}', [\App\Http\Controllers\Backend\CouponController::class, 'CouponEdit'])->name('coupon.edit');
    Route::post('/update/{id}', [\App\Http\Controllers\Backend\CouponController::class, 'CouponUpdate'])->name('coupon.update');

    Route::get('/delete/{id}', [\App\Http\Controllers\Backend\CouponController::class, 'CouponDelete'])->name('coupon.delete');
});

// Admin Shipping All Routes

Route::prefix('shipping')->group(function(){

    Route::get('/division/view', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'DivisionView'])->name('manage-division');

    Route::post('/division/store', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'DivisionStore'])->name('division.store');

    Route::get('/division/edit/{id}', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');
    Route::post('/division/update/{id}', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');

    Route::get('/division/delete/{id}', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');

    // Ship District
    Route::get('/district/view', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'DistrictView'])->name('manage-district');

    Route::post('/district/store', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'DistrictStore'])->name('district.store');

    Route::get('/district/edit/{id}', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');

    Route::post('/district/update/{id}', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');

    Route::get('/district/delete/{id}', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');

    // Ship State
    Route::get('/state/view', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'StateView'])->name('manage-state');

    Route::post('/state/store', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'StateStore'])->name('state.store');

    Route::get('/state/edit/{id}', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'StateEdit'])->name('state.edit');

    Route::post('/state/update/{id}', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'StateUpdate'])->name('state.update');

    Route::get('/state/delete/{id}', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'StateDelete'])->name('state.delete');



});

// Frontend Coupon Option

Route::post('/coupon-apply', [\App\Http\Controllers\Frontend\CartController::class, 'CouponApply']);
Route::get('/coupon-calculation', [\App\Http\Controllers\Frontend\CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [\App\Http\Controllers\Frontend\CartController::class, 'CouponRemove']);

// Checkout Routes
Route::get('/checkout', [\App\Http\Controllers\Frontend\CartController::class, 'CheckoutCreate'])->name('checkout');
Route::get('/district-get/ajax/{division_id}', [\App\Http\Controllers\User\CheckoutController::class, 'DistrictGetAjax']);

Route::get('/state-get/ajax/{district_id}', [\App\Http\Controllers\User\CheckoutController::class, 'StateGetAjax']);
Route::post('/checkout/store', [\App\Http\Controllers\User\CheckoutController::class, 'CheckoutStore'])->name('checkout.store');
Route::post('/stripe/order', [\App\Http\Controllers\User\StripeController::class, 'StripeOrder'])->name('stripe.order');
Route::get('/my/orders', [\App\Http\Controllers\User\AllUserController::class, 'MyOrders'])->name('my.orders');
Route::get('user/order_details/{order_id}', [\App\Http\Controllers\User\AllUserController::class, 'OrderDetails']);
Route::post('/cash/order', [\App\Http\Controllers\User\CashController::class, 'CashOrder'])->name('cash.order');
Route::get('user/invoice_download/{order_id}', [\App\Http\Controllers\User\AllUserController::class, 'InvoiceDownload']);

// Admin Order All Routes

Route::prefix('orders')->group(function(){

    Route::get('/pending/orders', [\App\Http\Controllers\Backend\OrderController::class, 'PendingOrders'])->name('pending-orders');
    Route::get('/pending/orders/details/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');
    Route::get('/confirmed/orders', [\App\Http\Controllers\Backend\OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');
    Route::get('/processing/orders', [\App\Http\Controllers\Backend\OrderController::class, 'ProcessingOrders'])->name('processing-orders');
    Route::get('/picked/orders', [\App\Http\Controllers\Backend\OrderController::class, 'PickedOrders'])->name('picked-orders');
    Route::get('/shipped/orders', [\App\Http\Controllers\Backend\OrderController::class, 'ShippedOrders'])->name('shipped-orders');
    Route::get('/delivered/orders', [\App\Http\Controllers\Backend\OrderController::class, 'DeliveredOrders'])->name('delivered-orders');
    Route::get('/cancel/orders', [\App\Http\Controllers\Backend\OrderController::class, 'CancelOrders'])->name('cancel-orders');
    // Update Status
    Route::get('/pending/confirm/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'PendingToConfirm'])->name('pending-confirm');
    Route::get('/confirm/processing/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');

    Route::get('/processing/picked/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'ProcessingToPicked'])->name('processing.picked');

    Route::get('/picked/shipped/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'PickedToShipped'])->name('picked.shipped');

    Route::get('/shipped/delivered/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');
    Route::get('/invoice/download/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');



});


// Admin Reports Routes
Route::prefix('reports')->group(function(){

    Route::get('/view', [\App\Http\Controllers\Backend\ReportController::class, 'ReportView'])->name('all-reports');
    Route::get('/diagram', [\App\Http\Controllers\Backend\ReportController::class, 'ReportDiagram'])->name('diagram-reports');
    Route::post('/search/by/date', [\App\Http\Controllers\Backend\ReportController::class, 'ReportByDate'])->name('search-by-date');
    Route::post('/search/by/month', [\App\Http\Controllers\Backend\ReportController::class, 'ReportByMonth'])->name('search-by-month');
    Route::post('/search/by/year', [\App\Http\Controllers\Backend\ReportController::class, 'ReportByYear'])->name('search-by-year');

});

// Admin Get All User Routes
Route::prefix('alluser')->group(function(){

    Route::get('/view', [\App\Http\Controllers\Backend\AdminProfileController::class, 'AllUsers'])->name('all-users');


});
// Admin Reports Routes
Route::prefix('blog')->group(function(){

    Route::get('/category', [\App\Http\Controllers\Backend\BlogController::class, 'BlogCategory'])->name('blog.category');
    Route::post('/store', [\App\Http\Controllers\Backend\BlogController::class, 'BlogCategoryStore'])->name('blogcategory.store');

    Route::get('/category/edit/{id}', [\App\Http\Controllers\Backend\BlogController::class, 'BlogCategoryEdit'])->name('blog.category.edit');


    Route::post('/update', [\App\Http\Controllers\Backend\BlogController::class, 'BlogCategoryUpdate'])->name('blogcategory.update');
    // Admin View Blog Post Routes

    Route::get('/list/post', [\App\Http\Controllers\Backend\BlogController::class, 'ListBlogPost'])->name('list.post');

    Route::get('/add/post', [\App\Http\Controllers\Backend\BlogController::class, 'AddBlogPost'])->name('add.post');

    Route::post('/post/store', [\App\Http\Controllers\Backend\BlogController::class, 'BlogPostStore'])->name('post-store');


});

//  Frontend Blog Show Routes

Route::get('/blog', [\App\Http\Controllers\Frontend\HomeBlogController::class, 'AddBlogPost'])->name('home.blog');
Route::get('/post/details/{id}', [\App\Http\Controllers\Frontend\HomeBlogController::class, 'DetailsBlogPost'])->name('post.details');
Route::get('/blog/category/post/{category_id}', [\App\Http\Controllers\Frontend\HomeBlogController::class, 'HomeBlogCatPost']);

// Admin Site Setting Routes
Route::prefix('setting')->group(function(){

    Route::get('/site', [\App\Http\Controllers\Backend\SiteSettingController::class, 'SiteSetting'])->name('site.setting');
    Route::post('/site/update', [\App\Http\Controllers\Backend\SiteSettingController::class, 'SiteSettingUpdate'])->name('update.sitesetting');
    Route::get('/seo', [\App\Http\Controllers\Backend\SiteSettingController::class, 'SeoSetting'])->name('seo.setting');
    Route::post('/seo/update', [\App\Http\Controllers\Backend\SiteSettingController::class, 'SeoSettingUpdate'])->name('update.seosetting');
});

// Admin Return Order Routes
Route::prefix('return')->group(function(){
    Route::get('/admin/request', [\App\Http\Controllers\Backend\ReturnController::class, 'ReturnRequest'])->name('return.request');

    Route::get('/admin/return/approve/{order_id}', [\App\Http\Controllers\Backend\ReturnController::class, 'ReturnRequestApprove'])->name('return.approve');

    Route::get('/admin/all/request', [\App\Http\Controllers\Backend\ReturnController::class, 'ReturnAllRequest'])->name('all.request');
});
// Frontend Product Review Routes

Route::post('/review/store', [\App\Http\Controllers\User\ReviewController::class, 'ReviewStore'])->name('review.store');

// Admin Manage Review Routes
Route::prefix('review')->group(function(){

    Route::get('/pending', [\App\Http\Controllers\User\ReviewController::class, 'PendingReview'])->name('pending.review');

    Route::get('/admin/approve/{id}', [\App\Http\Controllers\User\ReviewController::class, 'ReviewApprove'])->name('review.approve');

    Route::get('/publish', [\App\Http\Controllers\User\ReviewController::class, 'PublishReview'])->name('publish.review');

    Route::get('/delete/{id}', [\App\Http\Controllers\User\ReviewController::class, 'DeleteReview'])->name('delete.review');


});

// Admin Manage Review Routes
Route::prefix('stock')->group(function(){

    Route::get('/product', [\App\Http\Controllers\Backend\ProductController::class, 'ProductStock'])->name('product.stock');


});

// Admin User Role Routes
Route::prefix('adminuserrole')->group(function(){

    Route::get('/all', [\App\Http\Controllers\Backend\AdminUserController::class, 'AllAdminRole'])->name('all.admin.user');
    Route::get('/add', [\App\Http\Controllers\Backend\AdminUserController::class, 'AddAdminRole'])->name('add.admin');
    Route::post('/store', [\App\Http\Controllers\Backend\AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');
    Route::get('/edit/{id}', [\App\Http\Controllers\Backend\AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');
    Route::post('/update', [\App\Http\Controllers\Backend\AdminUserController::class, 'UpdateAdminRole'])->name('admin.user.update');
    Route::get('/delete/{id}', [\App\Http\Controllers\Backend\AdminUserController::class, 'DeleteAdminRole'])->name('delete.admin.user');
    /// Order Traking Route Route::get('/order/tracking', [AllUserController::class, 'OrderTraking'])->name('order.tracking');

});

/// Product Search Route
Route::get('/search', [IndexController::class, 'ProductSearch'])->name('product.search');

// Advance Search Routes
Route::post('search-product', [IndexController::class, 'SearchProduct']);




