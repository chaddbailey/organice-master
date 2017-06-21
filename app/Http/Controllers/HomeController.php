<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as Image;
use App\Admin;
use Borla\Chikka\Chikka;
use App\PartnerMobile;
use App\Package;
use App\PackageContent;
use App\ClientRequest;
use App\EventType;
use App\ReqUsers;
use App\Reviews;
use App\User;
use Session;
use DB;
use App\ClientLatLng;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   
        $package_id = Package::where('id', $id)->get();
        $packagecontent = PackageContent::where('package_id', $id)->get();
        $clients = Auth::user()->id;
        $venues = User::where('id',$clients)->get();

        return view('welcome', compact('package_id','packagecontent','venues'));
    }

    public function partners($id){
        // return Auth::guard('admin')->user();
        if (!Auth::check()) {
            return view('auth.login');
        }
        $findpartner = Admin::find($id);
        $package = DB::table('package')->where('partner_id', '=', $id)->get();
        $admins = Admin::where('id', $id)->get();
        $partners = Admin::where('id', $id)->get();
        $events = EventType::all();
        $images = DB::table('images')->where('partner_id', '=', $id)->get();
        $clients = Auth::user()->id;
        $cli = User::where('id',$clients)->get();
        $clireq = ClientLatLng::where('c_id',$clients)->get();
        $data = ReqUsers::where('client_id',$clients)->get();
        $type = Admin::where('id',$id)->value('servicetype');
        //Counter//
        $services = DB::table('admins')->count();
        $users = DB::table('users')->count();
        $reviews = DB::table('reviews')->count();
        $requests = DB::table('request')->count();

        return view('/partners', array('admin' => Admin::find($id)), compact('clireq','cli','data','admins','partners','package','events','images','findpartner','services','users','reviews','requests','type'));
    }


    public function requests(Request $request, $id){
         
        $clients = Auth::user()->id; 
        
        $dateTime = $request->datetime;

        $package = DB::table('package')->where('partner_id', '=', $id)->value('price');
        $admins = Admin::where('id', $id)->get();
        $partners = Admin::where('id', $id)->get();
        $events = EventType::all();
        $images = DB::table('images')->where('partner_id', '=', $id)->get();
        $venues = User::where('id',$clients)->get();
        $cli = User::where('id',$clients)->get();
        $clireq = ClientLatLng::where('c_id',$clients)->get();
        $data = ReqUsers::where('client_id',$clients)->get();
        $findpartner = Admin::find($id);
        $type = Admin::where('id',$id)->value('servicetype');
        //Counter//
        $services = DB::table('admins')->count();
        $users = DB::table('users')->count();
        $reviews = DB::table('reviews')->count();
        $requests = DB::table('request')->count();

        $dateExist = ClientRequest::where('partner_id',$id)
                                                    ->where('datetime',$dateTime)->count();
                                                    
        
        if($dateExist==1){

            Session::flash('failed_message','');
            return view('/partners', array('admin' => Admin::find($id)), compact('data','clireq','cli','admins','partners','package','events','images','venues','clients','findpartner','services','users','reviews','requests','type'));
            
        }
        
        $req = new ClientRequest;
        $req->client_id = $clients;
        $req->partner_id = $id;
        $req->status = 'PENDING';
        $req->heads = $request->heads;
        $req->package=$request->package;
        $req->event = $request->event;
        $req->venue = $request->venue;
        $req->lat = $request->clat;
        $req->lng = $request->clong;
        $req->desc = $request->desc;
        $req->firstname = $request->firstname;
        $req->lastname= $request->lastname;
        $req->email = $request->email;
        $req->mobile = $request->mobile;
        $req->datetime = $request->datetime;
        $req->uniques = $request->uniques;
        $req->motif = $request->motif;
        $req->budget = $request->budget;
        $req->type = $type;
        $req->price=$package;

        $req->save();
        Session::flash('add_message', '');

        $package = DB::table('package')->where('partner_id', '=', $id)->get();
        $admins = Admin::where('id', $id)->get();
        $partners = Admin::where('id', $id)->get();
        $events = EventType::all();
        $images = DB::table('images')->where('partner_id', '=', $id)->get();
        $venues = User::where('id',$clients)->get();
        $cli = User::where('id',$clients)->get();
        $clireq = ClientLatLng::where('c_id',$clients)->get();
        $data = ReqUsers::where('client_id',$clients)->get();
        $type = Admin::where('id',$id)->value('servicetype');
        $findpartner = Admin::find($id);
        //Counter//
        $services = DB::table('admins')->count();
        $users = DB::table('users')->count();
        $reviews = DB::table('reviews')->count();
        $requests = DB::table('request')->count();


        $fname = new User;
        $fname = $request->firstname;
        User::where('id',$clients)->update(array('firstname'=>$fname));
        $lname = new User;
        $lname = $request->lastname;
        User::where('id',$clients)->update(array('lastname'=>$lname));
        $mob = new User;
        $mob = $request->mobile;
        User::where('id',$clients)->update(array('mobile'=>$mob));
        $em = new User;
        $em = $request->email;
        User::where('id',$clients)->update(array('email'=>$em));

        return view('/partners', array('admin' => Admin::find($id)), compact('data','clireq','cli','admins','partners','package','events','images','venues','clients','findpartner','services','users','reviews','requests','type'));
    }


    public function showPackages($id){

        $admins = Admin::where('id', $id)->get();
        $partner = Admin::where('id', $id)->get();

        $package = DB::table('package')->where('partner_id', '=', $id)->get();
        $clients = Auth::user()->id;
        $venues = User::where('id',$clients)->get();
        
        $gallery = Admin::where('id', $id)->value('id');
        $images = DB::table('images')->where('partner_id', '=', $gallery)->get();
        //Counter//
        $services = Admin::count();
        $users = User::count();
        $reviews = Reviews::count();
        $requests = DB::table('request')->count();
        
        return view('/packages', array('admin' => Admin::find($id)), compact('admins','partners','package','venues','services','users','reviews','requests','images'));
    }

    public function showContent($id){

         $admins = Admin::where('id', $id)->get();
         $clients = Auth::user()->id;
         $venues = User::where('id',$clients)->get();

         //Counter//
         $services = DB::table('admins')->count();
         $users = DB::table('users')->count();
         $reviews = DB::table('reviews')->count();
         $requests = DB::table('request')->count();

         $package_id = Package::where('id', $id)->get();
         $packagecontent = PackageContent::where('package_id', $id)->get();
        return view('/content', compact('package_id','packagecontent','admins','venues','services','users','reviews','requests'));
    }

    public function showPartners(){
         
        $admins = Admin::all();
        return view('welcome',compact('admins','venues'));
    }

    public function eventForm(){
        $clients = Auth::user()->id;
        $events = EventType::all();
        $venues = ReqUsers::where('client_id',$clients)->get();

        return view('/eventform', compact('events','venues'));
    }

    public function displayImage(){

        session_start();
        $partner = Auth::guard('admin')->user()->id;
        $images = DB::table('images')->where('partner_id', '=', $partner)->get();

        return view('partners', compact('images'));
    }

    // public function getList(){
    //     $admins = Admin::all();

    //     return view('booking.list',compact('admins'));
    // }

    // public function getCaterers(){
    //     $admins = Admin::all();

    //     return view('booking.catering',compact('admins'));
    // }

    // public function getEquips(){
    //     $admins = Admin::all();

    //     return view('booking.equipments',compact('admins'));
    // }

    public function reqEvent(Request $request){

        $clients = Auth::user()->id; 
        $clat = new ClientLatLng;
        $clat = $request->clat;
        ClientLatLng::where('c_id',$clients)->update(array('lat'=>$clat));
        $clong = new ClientLatLng;
        $clong = $request->clong;
        ClientLatLng::where('c_id',$clients)->update(array('lng'=>$clong));
        $venue = new User;
        $venue = $request->venue;
        User::where('id',$clients)->update(array('location'=>$venue));

        return redirect('/formevent');
       

    }

    public function formEvent(){
       
        $events = EventType::all();
        $clients = Auth::user()->id;
        $cli = User::where('id',$clients)->get();
        $clireq = ClientLatLng::where('c_id',$clients)->get();
        //Counter//
        $services = DB::table('admins')->count();
        $users = DB::table('users')->count();
        $reviews = DB::table('reviews')->count();
        $requests = DB::table('request')->count();

        return view('/formevent', compact('clireq','cli','venues','admins','partners','package','events','images','services','users','reviews','requests'));
    }

    public function userinfo(Request $request){
        $clients = Auth::user()->id; 
        $client_exist = ReqUsers::where('client_id',$clients)->first();
        $clireq = ClientLatLng::where('c_id',$clients)->get();
        $events = EventType::all();
        if(!$client_exist){
        $info = new ReqUsers;
        $info ->client_id= $clients;
        $info->datetime = $request->datetime;
        $info->heads = $request->heads;
        $info->event = $request->event;
        $info->motif = $request->motif;
        $info->budget = $request->budget;
        $info->save();

    }
    else{
        $date = new ReqUsers;
        $date = $request->datetime;
        ReqUsers::where('client_id',$clients)->update(array('datetime' => $date ));
        $head = new ReqUsers;
        $head = $request->heads;
        ReqUsers::where('client_id',$clients)->update(array('heads' => $head ));
        $eve = new ReqUsers;
        $eve = $request->event;
        ReqUsers::where('client_id',$clients)->update(array('event' => $eve ));
        $mot = $request->motif;
        ReqUsers::where('client_id',$clients)->update(array('motif' => $mot ));
        $bud = $request->budget;
        ReqUsers::where('client_id',$clients)->update(array('budget' => $bud ));
        }
    return redirect('/booking/nearby');
    }

}
