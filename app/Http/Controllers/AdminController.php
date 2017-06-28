<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as Image;
use App\Admin;
use Borla\Chikka\Chikka;
use App\PartnerMobile;
use App\ClientMobile;
use App\Package;
use App\PackageContent;
use App\Images;
use App\ClientRequest;
use App\User;
use App\PartnerLoc;
use Session;
use DB;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        // return Auth::guard('admin')->user();
        $partners = Auth::guard('admin')->user()->id;
        $displayclients = ClientRequest::where('partner_id', $partners)->get();


        return view('admin.dashboard', array('admin', Auth::guard('admin')->user()),compact('partners','displayclients'));
    }

    public function getPloc(){
        $partners = Auth::guard('admin')->user()->id;
        $partners_exists = PartnerLoc::where('partner_id',$partners)->first();

        if(!$partners_exists){
            $partnerlocation = Auth::guard('admin')->user()->address;
             $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($partnerlocation).'&sensor=false';
                $json = @file_get_contents($url);
                $orig = json_decode($json);
                

                $origlat = $orig->results[0]->geometry->location->lat;
                $origlng = $orig->results[0]->geometry->location->lng;

                $ploc = new PartnerLoc;
                $ploc->lat = $origlat;
                $ploc->lng = $origlng;
                $ploc->partner_id = $partners;
                $ploc->save(); 

                return redirect()->action('AdminController@index');
            }
            else{
                return redirect()->action('AdminController@index');
            }

    }

    public function about(){
        // return Auth::guard('admin')->user();
        $partners = Auth::guard('admin')->user()->id;
        return view('admin.about',compact('partners'));
  
    }

    public function addDesc(Request $request){
        $partners = Auth::guard('admin')->user()->id;
        $desc = new Admin;
        $desc = $request->description;
        Admin::where('id', $partners)->update(array('description'=>$desc));


        return redirect()->action('AdminController@about');
    }



    public function update_avatar(Request $request){

        // Handle the user upload of avatar
       if($request->hasFile('avatar')){
          $avatar = $request->file('avatar');
          $filename = time() . '.' . $avatar->getClientOriginalExtension();
          Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

          $admin = Auth::guard('admin')->user();
          $admin->avatar = $filename;
          $admin->save();
        }
        if($request->hasFile('slider')){
          $slider = $request->file('slider');
          $filename = time() . '.' . $slider->getClientOriginalExtension();
          Image::make($slider)->resize(300, 300)->save( public_path('/uploads/sliders/' . $filename ) );

          $admin = Auth::guard('admin')->user();
          $admin->slider = $filename;
          $admin->save();
        }

        return redirect()->action('AdminController@index');

    }

    public function edit(){
        session_start();

        $partner = Auth::guard('admin')->user()->id;

        $package = DB::table('package')->where('partner_id', '=', $partner)->get();

        $pack = DB::table('package')->join('packagecontent','package.id','=',
            'packagecontent.package_id')->select('package.packagename','packagecontent.contentname','packagecontent.package_id')->where('partner_id', '=', $partner)->get();

        

        return view('admin.form', compact('package','pack') );
    }

    public function calendar(){

        $partners = Auth::guard('admin')->user()->id;
        $displayclients = DB::table('request')->where('partner_id', '=', $partners)
                                              ->where('status','=','ACCEPTED')->get();
        return view('admin.calendar', compact('displayclients','partners'));
    }

    public function upload_bir(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('bir')){
           $bir = $request->file('bir');
           $filename = time() . '.' . $bir->getClientOriginalExtension();
           Image::make($bir)->resize(300, 300)->save( public_path('/uploads/documents/' . $filename ) );

           $admin = Auth::guard('admin')->user();
           $admin->bir = $filename;
           $admin->save();
        }

        // return view('admin.dashboard', array('admin' => Auth::guard('admin')->user()) );
        return redirect()->action('AdminController@index');

    }

    public function upload_sec(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('sec')){
            $sec = $request->file('sec');
            $filename = time() . '.' . $sec->getClientOriginalExtension();
            Image::make($sec)->resize(300, 300)->save( public_path('/uploads/documents/' . $filename ) );

            $admin = Auth::guard('admin')->user();
            $admin->sec = $filename;
            $admin->save();
        }

        // return view('admin.dashboard', array('admin' => Auth::guard('admin')->user()) );
        return redirect()->action('AdminController@index');

    }

    public function upload_menu(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('menu')){
            $menu = $request->file('menu');
            $filename = time() . '.' . $menu->getClientOriginalExtension();
            Image::make($menu)->resize(300, 300)->save( public_path('/uploads/documents/' . $filename ) );

            $admin = Auth::guard('admin')->user();
            $admin->menu = $filename;
            $admin->save();
        }

        // return view('admin.dashboard', array('admin' => Auth::guard('admin')->user()) );
        return redirect()->action('AdminController@index');

    }

    public function getList(){
        $admins = Admin::all();

        return view('booking.list',compact('admins'));
    }

    public function getCaterers(){
        $admins = Admin::all();

        return view('booking.catering',compact('admins'));
    }

    public function getEquips(){
        $admins = Admin::all();

        return view('booking.equipments',compact('admins'));
    }

    public function setchikka(Request $req){

    $id = Auth::guard('admin')->user()->id;
    $profile = Admin::where('id',$id)->first();

    $contactnumber = Auth::guard('admin')->user()->contactnumber;
    $bytes = random_bytes(3);
    $code = bin2hex($bytes);
    $name = Auth::guard('admin')->user()->name;

    $hasCode = PartnerMobile::where('id',$profile->id)->first();
    $username = Auth::guard('admin')->user()->username;
    if(count($hasCode) > 0){
        $data['status'] = 'has code already';
    }
    else{
    $partner_mob = new PartnerMobile;
    $partner_mob->code = $code;
    $partner_mob->is_verified = 0;
    $partner_mob->id = $profile->id;
    $partner_mob->save();

    $message ="Hi". " " .$name."! Your verification code is" . " ".$code . " . Enter this code to verify your account. -OrgaNice";

    $config = [
    'shortcode'=> '292904196',
    'client_id'=> 'ffc3bfff080972a97c59d20b617cfe282052ce6a2dd8617b71e6885299652612',
    'secret_key'=> '196de96e80df948aab0a56b662125a7527ef6a2e4fce8d5c1b34a61873494211',
    ];

    $chikka = new Chikka($config);
    $resp = $chikka->send($contactnumber, $message);
    //$data['code'] = 'code sent';
    }
    //return response()->json($data);

    }

    public function getchikka(Request $req){
        $code = $req->code;

        $id = Auth::guard('admin')->user()->id;
        $profile = Admin::where('id',$id)->first();

        $partner_mob = PartnerMobile::where('id',$profile->id)->first();
        if($partner_mob->code == $code){
            $partner_mob->is_verified = 1;
            $partner_mob->save();
            $data['status'] = 1;
        }
        else{
            $data['status'] = 0;
        }
        //return view('auth/verify');
        //return response()->json($data);
    }

    public function deletePackage($id){

        $partners = Auth::guard('admin')->user()->id;

        $delpack = DB::table('package')->where('partner_id', '=', $partners)->get();
        Package::where('id', $id)->delete();
        return redirect()->action('AdminController@edit');    
    }

    public function addPackage(Request $request){
        session_start();
        $partner_id= Auth::guard('admin')->user()->id;

        $package = new Package;

        $package->packagename=$request->packagename;
        $package->price=$request->price;
        $package->partner_id=$partner_id;

        $package->save();

        
      //  return redirect()->action( 'AdminController@edit', ['partner_id' => $partner_id] );

         return redirect('/admin/form');
    }

    public function addContent(Request $request, $id){
       

        $packagecontent = new PackageContent;

        $packagecontent->contentname=$request->contentname;
        $packagecontent->package_id=$id;

        $packagecontent->save();

         $package_id = Package::where('id', $id)->get();
         $packagecontent = PackageContent::where('package_id', $id)->get();
        return view('admin.edit', compact('package_id','packagecontent'));
        
    }

    public function editContent($id){
         $package_id = Package::where('id', $id)->get();
         $packagecontent = PackageContent::where('package_id', $id)->get();
        return view('admin.edit', compact('package_id','packagecontent'));
    }

/*    public function images(Request $request){

        $input=$request->all();
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $images[]=$name;
            }
        }
        Insert your data
/*
        Admin::insert( [
            'images'=>  implode("|",$images),
            //you can put other insertion here
        ]);

           $admin = Auth::guard('admin')->user();
           $admin->images = implode("|",$images);
           $admin->save();

        return view('admin.photo', array('admin', Auth::guard('admin')->user()));

    }*/

    public function displayImage(){

        session_start();
        $partner= Auth::guard('admin')->user()->id;
        $images = DB::table('images')->where('partner_id', '=', $partner)->get();

        return view('admin.photo', compact('images'));
    }

    public function addImage(Request $request){
        session_start();
        $partner_id= Auth::guard('admin')->user()->id;



        $img = new Images;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            Image::make($image)->resize(300, 300)->save( public_path('/image/' . $filename ) );

            $img->image = $filename;
            $img->partner_id=$partner_id;
            $img->save();
        }

        $partner= Auth::guard('admin')->user()->id;
        $images = DB::table('images')->where('partner_id', '=', $partner)->get();
        return view('admin.photo', compact('images'));
    }


    public function displayPending(Request $request){
        session_start();
        
        $partners = Auth::guard('admin')->user()->id;
        $displayclients = ClientRequest::where('partner_id', $partners)->get();
        return view('admin.dashboard', compact('displayclients','acceptclients'));
    }

    public function acceptRequest($id){
            
            
        $partners = Auth::guard('admin')->user()->id;
        $displayclients = ClientRequest::where('partner_id', $partners)->get();
        ClientRequest::where('id', $id)->update(array('status'=>'ACCEPTED'));
        Session::flash('success_message', '');

        $client_id = DB::table('request')->where('id', $id)->value('client_id');
        $clientname= DB::table('users')->where('id', $client_id)->value('firstname');
        $clientmobile= DB::table('users')->where('id', $client_id)->value('mobile');
        $partnername = Auth::guard('admin')->user()->name;
        
        
        $message = "Hi". " " . $clientname ."! Your booking has been successfully accepted by " . " ". $partnername . " -OrgaNice";

        $config = [
        'shortcode'=> '29290400082',
        'client_id'=> '8669d1d250f3e3b12b45c20b0aaa15448fc4515dd85248904349cd7bfb726117',
        'secret_key'=> '3208906f2b9b765a1a4c085a7d3bee2d0d1c6ba9f49f89e82b95f7b7f69be890',
        ];

        

        $chikka = new Chikka($config);
        $resp = $chikka->send($clientmobile,$message);
        // return view('admin.dashboard', compact('displayclients','partners'));
        return redirect()->action('AdminController@index');

            
        }

    public function declineRequest($id){

            $partners = Auth::guard('admin')->user()->id;
            $displayclients = ClientRequest::where('partner_id', $partners)->get();
            ClientRequest::where('id', $id)->update(array('status'=>'DECLINED'));
            Session::flash('failed_message', '');

            $client_id = DB::table('request')->where('id', $id)->value('client_id');
            $clientname= DB::table('users')->where('id', $client_id)->value('firstname');
            $clientmobile= DB::table('users')->where('id', $client_id)->value('mobile');
            $partnername = Auth::guard('admin')->user()->name;
            
            
            $message = "Hi". " " . $clientname ."! Sorry to inform you that your booking has been declined by " . " ". $partnername . " -OrgaNice";

            $config = [
            'shortcode'=> '29290400082',
            'client_id'=> '8669d1d250f3e3b12b45c20b0aaa15448fc4515dd85248904349cd7bfb726117',
            'secret_key'=> '3208906f2b9b765a1a4c085a7d3bee2d0d1c6ba9f49f89e82b95f7b7f69be890',
            ];

          

            $chikka = new Chikka($config);
            $resp = $chikka->send($clientmobile,$message);
            // return view('admin.dashboard', compact('displayclients','partners'));
            return redirect()->action('AdminController@index');

        }

    public function delRequest($id){
        $partners = Auth::guard('admin')->user()->id;
        $displayclients = DB::table('request')->where('partner_id', '=', $partners)
                                              ->where('status','=','ACCEPTED')->get();
        ClientRequest::where('id', $id)->delete();
        return redirect()->action('AdminController@index');
    }

    public function deleteRequest($id){
        $partners = Auth::guard('admin')->user()->id;
        $displayclients = DB::table('request')->where('partner_id', '=', $partners)
                                              ->where('status','=','ACCEPTED')->get();
        ClientRequest::where('id', $id)->delete();
        return view('admin.calendar', compact('displayclients','partners'));
    }

    public function showMore($id){
        $partners = Auth::guard('admin')->user()->id;
        $displayclients = ClientRequest::where('id', $id)->get();
        return view('admin.showmore', compact('displayclients','partners'));
    }



}
