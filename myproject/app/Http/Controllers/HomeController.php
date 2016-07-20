<?php namespace App\Http\Controllers;

use DB;
use Input;
use Auth;
use Session;
use App\Quotation;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//return view('home');

		$hotels = DB::table('hotel')->get();

		//echo "========>>>> <pre>"; print_r($hotels); exit;
		return view('home')->with('hotel_list', $hotels);
	}

	public function addHotel()
	{
		// show the form
		$user_id = Auth::user()->id;

		if ( $user_id == 1 ) {
			return view('addhotel');	
		} else {
			return view('home');	
		}
		
	}

	public function addComments($id) {
		$comments = DB::table('comments')->where('hotel_id', $id)->get();
		$commentsArray = array();
		$commentsArray['myarray'] = json_decode(json_encode($comments),true);
		$commentsArray['currenthotel_id'] = $id;

		return view('listcomments')->with('listcomments', $commentsArray);
	}

	public function postComments() {
		$data['name'] = Input::get('name');
		$data['hotel_id'] = Input::get('hotelid');
		$data['user_id'] = Auth::user()->id;
		$hotelID = Input::get('hotelid');
		DB::table('comments')->insert($data);
		return redirect("addcomments/$hotelID")->with('message', 'Commet Added!');
	}

	public function postHotel()
	{
		// process the form
		$data['name'] = Input::get('name');
		DB::table('hotel')->insert($data);

		return redirect('/admin')->with('message', 'Hotel Added!');
	}

}
