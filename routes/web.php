<?php
use Illuminate\Support\Facades\Auth;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','IndexController@index');
Route::get('/products/shop','IndexController@shop');
//All Blogs page
Route::get('/blogs/all','BlogsController@blogs');
// Category/Listing Page
Route::get('/products/{slug}','ProductsController@products');

// Blog Detail Page
Route::get('/blog/{id}','BlogsController@blog');
// Product Detail Page
Route::get('/product/{id}','ProductsController@product');

//Product Reviews
Route::post('/add-comment','ProductsCommentController@addComment');
//Blog Reviews
Route::post('/add-Blogcomment','BlogsCommentController@addComment');

// Cart Page
Route::match(['get', 'post'],'/cart','ProductsController@cart');

// Add to Cart Route
Route::match(['get', 'post'], '/add-cart', 'ProductsController@addtocart');

// Delete Product from Cart Route
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');

// Update Product Quantity from Cart
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');


// Get Product Attribute Price
Route::any('/get-product-price','ProductsController@getProductPrice');
// Products Filters Route
Route::match(['get', 'post'],'/products-filter', 'ProductsController@filter');


// Users Login/Register Page
Route::get('/login-register','UsersController@userLoginRegister');

Route::match(['get','post'],'forgot-password','UsersController@forgotPassword');

// Users Register Form Submit
Route::post('/user-register','UsersController@register');

// Check if User already exists
Route::match(['GET','POST'],'/check-email','UsersController@checkEmail');

// Confirm Account
Route::get('confirm/{code}','UsersController@confirmAccount');

// Users Login Form Submit
Route::post('user-login','UsersController@login');
// Users logout
Route::get('/user-logout','UsersController@logout');

// Search Products
Route::post('/search-product','ProductsController@searchProducts');
Route::match(['get','post'],'forgot-password','UsersController@forgotPassword');


Route::group(['middleware'=>['frontlogin']],function(){
// Users Account Page
Route::match(['get','post'],'account','UsersController@account');
// Update User Password
Route::post('/update-user-pwd','UsersController@updatePassword');

// Checkout Page
Route::match(['get','post'],'checkout','ProductsController@checkout');

// Order Review Page
Route::match(['get','post'],'/order-review','ProductsController@orderReview');

// Place Order
Route::match(['get','post'],'/place-order','ProductsController@placeOrder');
// Thanks Page
Route::get('/thanks','ProductsController@thanks');
// Paypal Page
Route::get('/paypal','ProductsController@paypal');
// Users Orders Page
Route::get('/orders','ProductsController@userOrders');
// User Ordered Products Page
Route::get('/orders/{id}','ProductsController@userOrderDetails');
// Paypal Thanks Page
Route::get('/paypal/thanks','ProductsController@thanksPaypal');
// Paypal Cancel Page
Route::get('/paypal/cancel','ProductsController@cancelPaypal');

});


Route::match(['get', 'post'], '/admin','AdminController@login');
Auth::routes();
Route::group(['middleware' => ['adminlogin']], function () {

Route::get('/admin/dashboard','AdminController@dashboard');
Route::get('/logout','AdminController@logout');
Route::get('/admin/settings','AdminController@settings');
Route::match(['get', 'post'],'/admin/update-pwd','AdminController@updatePassword');

	// Admin Categories Routes
	Route::match(['get', 'post'], '/admin/add-category','CategoryController@addCategory');
	Route::match(['get', 'post'], '/admin/edit-category/{id}','CategoryController@editCategory');
	Route::match(['get', 'post'], '/admin/delete-category/{id}','CategoryController@deleteCategory');
    Route::get('/admin/view-categories','CategoryController@viewCategories');

    	// Admin Products Routes
	Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
	Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
	Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');
	Route::get('/admin/view-products','ProductsController@viewProducts');
	Route::get('/admin/export-products','ProductsController@exportProducts');
	Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
	Route::get('/admin/delete-product-video/{id}','ProductsController@deleteProductVideo');
    Route::get('/admin/export-products','ProductsController@exportProducts');
	Route::match(['get', 'post'], '/admin/add-images/{id}','ProductsController@addImages');
    Route::get('/admin/delete-alt-image/{id}','ProductsController@deleteProductAltImage');

	// Admin Attributes Routes
	Route::match(['get', 'post'], '/admin/add-attributes/{id}','ProductsController@addAttributes');
	Route::match(['get', 'post'], '/admin/edit-attributes/{id}','ProductsController@editAttributes');
    Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');

  	// Admin Blog Routes
      Route::match(['get','post'],'/admin/add-blog','BlogsController@addBlog');
      Route::match(['get','post'],'/admin/edit-blog/{id}','BlogsController@editBlog');
      Route::get('/admin/delete-blog/{id}','BlogsController@deleteBlog');
      Route::get('/admin/view-blogs','BlogsController@viewBlogs');

//Products comment approval page
Route::get('/admin/view-comments','ProductsCommentController@viewComments');
Route::post('/toggle-approve/{id}','ProductsCommentController@approval');

//Blog comment approval page
Route::get('/admin/view-Blogcomments','BlogsCommentController@viewComments');
Route::post('/toggle-Blogapprove/{id}','BlogsCommentController@approval');

// Admin/Sub-Admins View Route
Route::get('/admin/view-admins','AdminController@viewAdmins');

// Add Admins/Sub-Admins Route
Route::match(['get','post'],'/admin/add-admin','AdminController@addAdmin');

// Edit Admins/Sub-Admins Route
Route::match(['get','post'],'/admin/edit-admin/{id}','AdminController@editAdmin');

	// Admin Orders Routes
	Route::get('/admin/view-orders','ProductsController@viewOrders');

	// Admin Orders Charts Route
	Route::get('/admin/view-orders-charts','ProductsController@viewOrdersCharts');

	// Admin Order Details Route
	Route::get('/admin/view-order/{id}','ProductsController@viewOrderDetails');
// Admin Search Reports Route
Route::get('/admin/search-reports','ReportsController@index');
Route::post('/admin/check-report','ReportsController@checkReport');


	// Order Invoice
	Route::get('/admin/view-order-invoice/{id}','ProductsController@viewOrderInvoice');

	// PDF Invoice
	Route::get('/admin/view-pdf-invoice/{id}','ProductsController@viewPDFInvoice');

	// Update Order Status
	Route::post('/admin/update-order-status','ProductsController@updateOrderStatus');

	// Admin Users Route
    Route::get('/admin/view-users','UsersController@viewUsers');
    	// Admin Users Charts Route
	Route::get('/admin/view-users-charts','UsersController@viewUsersCharts');
// Export Users Route
Route::get('/admin/export-users','UsersController@exportUsers');

//getProducts

	// Get Enquiries
	Route::get('/admin/get-products','ProductController@getProducts');


	// Get Enquiries
	Route::get('/admin/get-enquiries','UsersController@getEnquiries');

	// View Enquiries
	Route::get('/admin/view-enquiries','UsersController@viewEnquiries');

});

Route::get('/home', 'HomeController@index')->name('home');
// Display Contact Page
Route::match(['get','post'],'/pages/contact','UsersController@contact');
Route::match(['get','post'],'/pages/post','UsersController@addPost');

// Display About US page
Route::match(['get','post'],'/pages/about-us','UsersController@about');
