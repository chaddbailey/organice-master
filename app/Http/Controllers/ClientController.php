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


        $types = ReqUsers::where('client_id','=',$userid)->value('event');
        $budget = ReqUsers::where('client_id','=',$userid)->value('budget');
        //---FOR WEDDING TYPE EVENT
        if($types === 'Wedding'){        
        //n% for catering
        $type = Admin::value('servicetype','=', 1);
        $catering_criteria = 0.6;
        $catering_final = number_format(($catering_criteria * $budget),2);
        //n% for wine
        $type = Admin::value('servicetype','=', 9);
        $wine_criteria = 0.05;
        $wine_final = number_format(($wine_criteria * $budget),2);
        //n% for cakes_criteriaes
        $type = Admin::value('servicetype','=', 8);
        $cakes_criteria = 0.05;
        $cakes_final = number_format(($cakes_criteria * $budget),2);
        //n% for photography
        $type = Admin::value('servicetype','=', 5);
        $photography_criteria = 0.05;
        $photography_final = number_format(($photography_criteria * $budget),2);
        //n% for equipment
        $type = Admin::value('servicetype','=', 2);
        $equipment_criteria = 0.05;
        $equipment_final = number_format(($equipment_criteria * $budget),2);
        //n% for florist
        $type = Admin::value('servicetype','=', 6);
        $florist_criteria = 0.05;
        $florist_final = number_format(($florist_criteria * $budget),2);
        //n% for styling
        $type = Admin::value('servicetype','=', 10);
        $styling_criteria = 0.05;
        $styling_final = number_format(($styling_criteria * $budget),2);
        //n% for entertainment
        $type = Admin::value('servicetype','=', 7);
        $entertainment_criteria = 0.02;
        $entertainment_final = number_format(($entertainment_criteria * $budget),2);
        //n% for accessories
        $type = Admin::value('servicetype','=', 3);
        $accessories_criteria = 0.02;
        $accessories_final = number_format(($accessories_criteria * $budget),2);
        //n% for bridal
        $type = Admin::value('servicetype','=', 12);
        $bridalcar_criteria = 0.02;
        $bridalcar_final = number_format(($bridalcar_criteria * $budget),2);
        //n% for tailoring
        $type = Admin::value('servicetype','=', 11);
        $tailoring_criteria = 0.02;
        $tailoring_final = number_format(($tailoring_criteria * $budget),2);
        //n% for giveaways
        $type = Admin::value('servicetype','=', 4);
        $giveaways_criteria = 0.02;
        $giveaways_final = number_format(($giveaways_criteria * $budget),2);
        }
        //For other events
        if ($types === 'Birthday'|| $types === 'Wedding Anniversary'|| $types === 'Christening'|| $types === 'Thanksgiving'|| $types === 'Debut'|| $types === 'Baby Shower'|| $types === 'Bridal Shower'|| $types === 'Founders Day Celebration'|| $types === 'Fashion Show'|| $types === 'Death Anniversary'|| $types === 'Graduation'|| $types === 'Simple Celebration') {
        //n% for catering
        $type = Admin::value('servicetype','=', 1);
        $catering_criteria = 0.6; 
        $catering_final = number_format(($catering_criteria * $budget),2);
        //n% for equipment
        $type = Admin::value('servicetype','=', 2);
        $equipment_criteria = 0.15; 
        $equipment_final = number_format(($equipment_criteria * $budget),2);
        //n% for photography
        $type = Admin::value('servicetype','=', 5);
        $photography_criteria = 0.05; 
        $photography_final = number_format(($photography_criteria * $budget),2);
        //n% for giveaways
        $type = Admin::value('servicetype','=', 4);
        $giveaways_criteria = 0.05; 
        $giveaways_final = number_format(($giveaways_criteria * $budget),2);
        //n% for wine
        $type = Admin::value('servicetype','=', 9);
        $wine_criteria = 0.05; 
        $wine_final = number_format(($wine_criteria * $budget),2);
        //n% for entertainment
        $type = Admin::value('servicetype','=', 7);
        $entertainment_criteria = 0.05; 
        $entertainment_final = number_format(($entertainment_criteria * $budget),2);
        //n% for cakes
        $type = Admin::value('servicetype','=', 8);
        $cakes_criteria = 0.05; 
        $cakes_final = number_format(($cakes_criteria * $budget),2);
        }


        return view('/booking/viewnearby',array('user', Auth::guard('user')->user()),compact('joins','types','budget','catering_final','equipment_final','photography_final','styling_final','tailoring_final','giveaways_final','florist_final','entertainment_final','accessories_final','wine_final','cakes_final','bridalcar_final'));

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
        

        $types = ReqUsers::where('client_id','=',$client)->value('event');
        $budget = ReqUsers::where('client_id','=',$client)->value('budget');
        //---FOR WEDDING TYPE EVENT
        if($types === 'Wedding'){        
        //n% for catering
        $type = Admin::value('servicetype','=', 1);
        $catering_criteria = 0.6;
        $catering_final = number_format(($catering_criteria * $budget),2);
        //n% for wine
        $type = Admin::value('servicetype','=', 9);
        $wine_criteria = 0.05;
        $wine_final = number_format(($wine_criteria * $budget),2);
        //n% for cakes_criteriaes
        $type = Admin::value('servicetype','=', 8);
        $cakes_criteria = 0.05;
        $cakes_final = number_format(($cakes_criteria * $budget),2);
        //n% for photography
        $type = Admin::value('servicetype','=', 5);
        $photography_criteria = 0.05;
        $photography_final = number_format(($photography_criteria * $budget),2);
        //n% for equipment
        $type = Admin::value('servicetype','=', 2);
        $equipment_criteria = 0.05;
        $equipment_final = number_format(($equipment_criteria * $budget),2);
        //n% for florist
        $type = Admin::value('servicetype','=', 6);
        $florist_criteria = 0.05;
        $florist_final = number_format(($florist_criteria * $budget),2);
        //n% for styling
        $type = Admin::value('servicetype','=', 10);
        $styling_criteria = 0.05;
        $styling_final = number_format(($styling_criteria * $budget),2);
        //n% for entertainment
        $type = Admin::value('servicetype','=', 7);
        $entertainment_criteria = 0.02;
        $entertainment_final = number_format(($entertainment_criteria * $budget),2);
        //n% for accessories
        $type = Admin::value('servicetype','=', 3);
        $accessories_criteria = 0.02;
        $accessories_final = number_format(($accessories_criteria * $budget),2);
        //n% for bridal
        $type = Admin::value('servicetype','=', 12);
        $bridalcar_criteria = 0.02;
        $bridalcar_final = number_format(($bridalcar_criteria * $budget),2);
        //n% for tailoring
        $type = Admin::value('servicetype','=', 11);
        $tailoring_criteria = 0.02;
        $tailoring_final = number_format(($tailoring_criteria * $budget),2);
        //n% for giveaways
        $type = Admin::value('servicetype','=', 4);
        $giveaways_criteria = 0.02;
        $giveaways_final = number_format(($giveaways_criteria * $budget),2);
        }
        //For other events
        if ($types === 'Birthday'|| $types === 'Wedding Anniversary'|| $types === 'Christening'|| $types === 'Thanksgiving'|| $types === 'Debut'|| $types === 'Baby Shower'|| $types === 'Bridal Shower'|| $types === 'Founders Day Celebration'|| $types === 'Fashion Show'|| $types === 'Death Anniversary'|| $types === 'Graduation'|| $types === 'Simple Celebration') {
        //n% for catering
        $type = Admin::value('servicetype','=', 1);
        $catering_criteria = 0.6; 
        $catering_final = number_format(($catering_criteria * $budget),2);
        //n% for equipment
        $type = Admin::value('servicetype','=', 2);
        $equipment_criteria = 0.15; 
        $equipment_final = number_format(($equipment_criteria * $budget),2);
        //n% for photography
        $type = Admin::value('servicetype','=', 5);
        $photography_criteria = 0.05; 
        $photography_final = number_format(($photography_criteria * $budget),2);
        //n% for giveaways
        $type = Admin::value('servicetype','=', 4);
        $giveaways_criteria = 0.05; 
        $giveaways_final = number_format(($giveaways_criteria * $budget),2);
        //n% for wine
        $type = Admin::value('servicetype','=', 9);
        $wine_criteria = 0.05; 
        $wine_final = number_format(($wine_criteria * $budget),2);
        //n% for entertainment
        $type = Admin::value('servicetype','=', 7);
        $entertainment_criteria = 0.05; 
        $entertainment_final = number_format(($entertainment_criteria * $budget),2);
        //n% for cakes
        $type = Admin::value('servicetype','=', 8);
        $cakes_criteria = 0.05; 
        $cakes_final = number_format(($cakes_criteria * $budget),2);
        }

        return view('client.home', array('user', Auth::guard('user')->user()),compact('displayclients','displaypartners','dc','distinct','types','budget','catering_final','equipment_final','photography_final','styling_final','tailoring_final','giveaways_final','florist_final','entertainment_final','accessories_final','wine_final','cakes_final','bridalcar_final'));
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
