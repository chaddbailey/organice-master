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
use App\EventType;
use App\ReqUsers;
use App\Nearby;
use App\User;
use App\Count;
use App\PartnerLoc;
use App\ClientLatLng;
use App\ClientRequest;
use DB;


class ClientController extends Controller
{
    public function partners($id){
        // return Auth::guard('admin')->user();
        $admins = Admin::where('id', $id)->get();
        $events = Event::all();
        return view('/partners', array('admin' => Admin::find($id)), compact('admins','events'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
     
        $userid = Auth::user()->id;
        $events = EventType::all();
        $venues = User::where('id',$userid)->get();
        $user_exists = DB::table('client_latlong')->where('c_id' ,$userid)->first();
        if(!$user_exists){
        $useradd = Auth::user()->location;

        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($useradd).'&sensor=false';
        $json = @file_get_contents($url);
        $orig = json_decode($json);

        $origlat = $orig->results[0]->geometry->location->lat;
        $origlng = $orig->results[0]->geometry->location->lng;

        $c_add = new ClientLatLng;
        $c_add->lat = $origlat;
        $c_add->lng = $origlng;
        $c_add->c_id = $userid;
        $c_add->save();


        }



        return view('welcome', array('user', Auth::guard('user')->user()),compact('admins','venues','events'));
    }

    public function expenseBudget(Request $id)
    {
        $client = Auth::guard('user')->user()->id;

        return view('client.expenses', array('user', Auth::guard('user')->user()),compact('displayclients','displaypartners','dc','distinct'));
    }
    public function getLocation(){


        $admins = Admin::all();
     
        
        //lat and long for user
        $userid = Auth::user()->id;
        $useradd = Auth::user()->location;
        $count = new Count;

        //$admin = DB::table('partner_latlong')->where('p_id', 1)->first();
        $currentuser = DB::table('client_latlong')->where('c_id', $userid)->first();
        //dd($userid);
        $admin = PartnerLoc::all();
        $user_exists = Nearby::where('user_id',$userid)->first();
        if(!$user_exists){
        foreach($admin as $adm){
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$currentuser->lat.",".$currentuser->lng."&destinations=".$adm->lat.",".$adm->lng."&mode=transit&key=AIzaSyAjcvJLKGA9y6-JkI8jpn0s_1_GNcsQbm8&libraries=places";
        $json = @file_get_contents($url);
        $location_datas = json_decode($json);

        $distance = $location_datas->rows[0]->elements[0]->distance->value;
        
        
        $location_points = $count->getLocationPoints($location_datas->rows[0]->elements[0]->distance->value);
        
        $nearby_criteria = 0.2;

        $final_distance = $location_points*$nearby_criteria;
            
            $nearby = new Nearby;
            $nearby->distance = $final_distance;
            $nearby->partner_id = $adm->partner_id;
            $nearby->user_id = $userid;
            $nearby->save();

            }
        }
       
        //$distance = Nearby::orderBy('distance','DESC')->where('user_id',$userid)->get();
         //$nearby_pid = Nearby::select('partner_id')->orderBy('distance','DESC')->where('user_id',$userid)->get();
         //$compare_ad = Admin::where('id',$nearby_pid)->value('name')->get();
        $joins = DB::table('admins')->join('nearby','admins.id','=','nearby.partner_id')->select('admins.name','admins.avatar','admins.id','admins.address','admins.servicetype','nearby.partner_id')->orderBy('nearby.distance','DESC')->where('nearby.user_id',$userid)->distinct()->get();
                    
        return view('/booking/viewnearby',array('user', Auth::guard('user')->user()),compact('joins'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id)
    {   
        //$clients = User::find($id);
        $client = Auth::guard('user')->user()->id;
        $displayclients = ClientRequest::where('client_id', $client)->groupBy('event','datetime')->get();
        
        $displaypartners = DB::table('request')->join('admins','request.partner_id','=',
            'admins.id')->select('admins.id','admins.name','request.status','request.datetime','request.heads','request.firstname','request.lastname','request.package','request.event')->where('client_id', '=', $client)->groupBy('event','datetime')->get();

        $dc = ClientRequest::where('client_id',$client)->join('admins','request.partner_id','=',
            'admins.id')->select('admins.id','admins.name','request.status','request.datetime','request.heads','request.firstname','request.lastname','request.package','request.event','request.price')->orderBy('event','asc')->get(['event']);
        $distinct = ClientRequest::where('client_id',$client)->distinct('event')->get(['event']);
        

        return view('client.home', array('user', Auth::guard('user')->user()),compact('displayclients','displaypartners','dc','distinct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

     public function reqEvent(){

       $userid = Auth::user()->id;
        $user_exists = DB::table('client_latlong')->where('c_id' ,$userid)->first();
        if(!$user_exists){
        $useradd = Auth::user()->location;

        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($useradd).'&sensor=false';
        $json = @file_get_contents($url);
        $orig = json_decode($json);

        $origlat = $orig->results[0]->geometry->location->lat;
        $origlng = $orig->results[0]->geometry->location->lng;

        $c_add = new ClientLatLng;
        $c_add->lat = $origlat;
        $c_add->lng = $origlng;
        $c_add->c_id = $userid;
        $c_add->save();

       
        }
        
           
        

       /* $ven = new User;
        $ven = $request->venue;
        User::where('id', $clients)->update(array('location'=>$ven));*/

        

    

    }
    // public function getCloc(){
    //     $userid = Auth::user()->id;
    //     $useradd = Auth::user()->location;
    //     $count = new Count;

    //     //$admin = DB::table('partner_latlong')->where('p_id', 1)->first();
    //     $currentuser = DB::table('requsers')->where('client_id', $userid)->first();
        
    //     $admin = PartnerLoc::all();
    //     foreach($admin as $adm){
    //     $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$currentuser->lat.",".$currentuser->lng."&destinations=".$adm->lat.",".$adm->lng."&mode=transit&key=AIzaSyAjcvJLKGA9y6-JkI8jpn0s_1_GNcsQbm8&libraries=places";
    //     $json = @file_get_contents($url);
    //     $location_datas = json_decode($json);
    //     $distance = $location_datas->rows[0]->elements[0]->distance->value;
        
        
        
    //     $location_points = $count->getLocationPoints($location_datas->rows[0]->elements[0]->distance->value);
        
    //     $nearby_criteria = 0.2;

    //     $final_distance = $location_points*$nearby_criteria;
            
    //         $nearby = new Nearby;
    //         $nearby->distance = $final_distance;
    //         $nearby->partner_id = $adm->partner_id;
    //         $nearby->client_id = $userid;
    //         $nearby->save();
    //     }

       
    //      // $distance = Nearby::orderBy('distance','DESC')->where('user_id',$userid)->get();
    //      // return view ('booking.nearby',compact('distance'));
    // }
}
