<?php

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



Route::get('/onesignal', function(){
	dd('dddd');
	$content = array(
			"en" => 'English Message'
			);
		
		$fields = array(
			'app_id' => "9d4fcc12-cb93-4aa7-a8e3-38a8ca2fca06",
			'included_segments' => array('All'),
      		'data' => array("foo" => "bar"),
			'contents' => $content
		);
		
		$fields = json_encode($fields);
    	print("\nJSON sent:\n");
    	print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic YzdhMDlhYmItNjY2NC00Y2U5LTg0OWYtMDE2ZGRjZDczMGMy'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
});

Route::get('/', function () {
    return redirect('/app');
});
Auth::routes();

Route::prefix('app')->middleware(['auth'])->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');	
    Route::get('/', function () {
        return redirect('/app/home');
    });
    Route::resource('products', 'ProductsController');
    Route::get('/api/products','ProductsController@getAll')->name('api.products');
});