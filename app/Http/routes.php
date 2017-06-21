<?php
use App\Admin;
use App\Reviews;
use Illuminate\Support\Facades\Input;
use App\User;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@showPartners');

Route::group(['middleware' => ['web']], function(){
	Route::auth();
	
    Route::resource('client/dashboard', 'ClientController@index');
    Route::get('client/home', 'ClientController@show');
    Route::get('client/expenses', 'ClientController@expenseBudget');
    Route::get('get/location','ClientController@getLocation');
    Route::resource('auth/verify', 'ChikkaController@getchikka');
    Route::get('auth/verify', 'ChikkaController@setchikka');
    Route::get('auth/register', 'Auth\AuthController@showRegistrationForm');

});

Route::group(['middleware' => ['web']], function () {
     //Login Routes...
    Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
    Route::post('/admin/login','AdminAuth\AuthController@login');
    Route::get('/admin/logout','AdminAuth\AuthController@logout');

    // Registration Routes...
    Route::get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
    Route::post('admin/register', 'AdminAuth\AuthController@register');

    Route::post('admin/password/email','AdminAuth\PasswordController@sendResetLinkEmail');
    Route::post('admin/password/reset','AdminAuth\PasswordController@reset');
    Route::get('admin/password/reset/{token?}','AdminAuth\PasswordController@showResetForm');

    Route::get('/admin', 'AdminController@index');
    Route::post('/admin/av', 'AdminController@update_avatar');
    Route::get('/admin', 'AdminController@update_avatar');
    Route::post('/admin/bir', 'AdminController@upload_bir');
    Route::get('/admin', 'AdminController@upload_bir');
    Route::post('/admin/sec', 'AdminController@upload_sec');
    Route::get('/admin', 'AdminController@upload_sec');
    Route::post('/admin/menu', 'AdminController@upload_menu');
    Route::get('/admin', 'AdminController@upload_menu');

    Route::get('/admin/form','AdminController@edit');
    Route::get('/add/package','AdminController@addPackage');
    Route::get('/delete/package{id}','AdminController@deletePackage');
    Route::get('/edit/package{id}','AdminController@addContent');
    Route::get('/admin/edit{id}','AdminController@editContent');
    Route::get('/admin/calendar', 'AdminController@calendar');
    Route::post('/admin/photo', 'AdminController@addImage');
    Route::get('/admin/photo', 'AdminController@displayImage');

    //Route::get('/admin', 'AdminController@setchikka');
    /*Route::get('/admin', 'AdminController@getchikka');*/
});  
    
     Route::get('/partners/{id}', 'HomeController@partners');
     Route::get('/event', 'HomeController@eventForm');
     Route::get('/request{id}', 'HomeController@requests');
     Route::get('/admin', 'AdminController@displayPending');
     Route::get('/accept/{id}', 'AdminController@acceptRequest');
     Route::get('/decline/{id}', 'AdminController@declineRequest');
     Route::get('/admin/showmore/{id}', 'AdminController@showMore');
     Route::get('/del/{id}', 'AdminController@delRequest');
     Route::get('/delete/{id}', 'AdminController@deleteRequest');
     Route::get('/packages/{id}', 'HomeController@showPackages');
     Route::get('/content/{id}', 'HomeController@showContent');
     Route::get('/admin/about','AdminController@about');
     Route::get('/add/desc','AdminController@addDesc');
     Route::get('/req/event','HomeController@reqEvent');
     Route::get('/user/inf', 'HomeController@userinfo');
     Route::get('/formevent', 'HomeController@formEvent');

    Route::get('/booking/list', 'HomeController@getList');
    Route::get('/booking/catering', 'HomeController@getCaterers');
    Route::get('/booking/equipments', 'HomeController@getEquips');

    Route::resource('/admin/dashboard', 'AdminController@getPloc');
    // Route::resource('/booking/nearby','ClientController@getCloc');

    Route::resource('/booking/nearby', 'ClientController@getLocation');

     // Route that shows an individual product by its ID
     Route::get('reviewcontent/{id}', function($id)
     {
        $partner = Admin::find($id);
        $admins = Admin::where('id', $id)->get();
        $client_id = DB::table('reviews')->where('id', $id)->value('client_id');
        $clientname= DB::table('users')->where('id', $client_id)->value('firstname');
        // Get all reviews that are not spam for the product and paginate them
        $reviews = $partner->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(100);
        
        return View::make('reviewcontent', array('admin'=>$partner,'client'=>$client_id,'reviews'=>$reviews,'clients'=>$clientname), compact('admins','partner'));
     });

     // Route that handles submission of review - rating/comment
     Route::post('reviewcontent/{id}', array('before'=>'csrf', function($id)
     {
        $input = array(
            'comment' => Input::get('comment'),
            'rating'  => Input::get('rating')
        );
        // instantiate Rating model
        $review = new Reviews;

        // Validate that the user's input corresponds to the rules specified in the review model
        $validator = Validator::make( $input, $review->getCreateRules());

        // If input passes validation - store the review in DB, otherwise return to product page with error message 
        if ($validator->passes()) {
            $review->storeReviewForPartners($id, $input['comment'], $input['rating']);
            return Redirect::to('reviewcontent/'.$id.'#reviews-anchor')->with('review_posted',true);
        }
        
        return Redirect::to('reviewcontent/'.$id.'#reviews-anchor')->withErrors($validator)->withInput();
     }));