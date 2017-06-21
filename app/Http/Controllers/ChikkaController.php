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
use App\User;
use Session;

use DB;

class ChikkaController extends Controller
{
    public function setchikka(Request $req){

    $id = Auth::user()->id;
    $profile = User::where('id',$id)->first();

    $mobile = Auth::user()->mobile;
    $bytes = random_bytes(3);
    $code = bin2hex($bytes);
    $name = Auth::user()->firstname;

    $hasCode = ClientMobile::where('id',$profile->id)->first();
    $username = Auth::user()->username;
    if(count($hasCode) > 0){
        $data['status'] = 'has code already';
    }
    else{
    $client_mob = new ClientMobile;
    $client_mob->code = $code;
    $client_mob->is_verified = 0;
    $client_mob->id = $profile->id;
    $client_mob->save();

    $message ="Hi". " " .$name."! Your verification code is" . " ".$code . " . Enter this code to verify your account. -OrgaNice";

    $config = [
    'shortcode'=> '292904196',
    'client_id'=> 'ffc3bfff080972a97c59d20b617cfe282052ce6a2dd8617b71e6885299652612',
    'secret_key'=> '196de96e80df948aab0a56b662125a7527ef6a2e4fce8d5c1b34a61873494211',
    ];

    $chikka = new Chikka($config);
    $resp = $chikka->send($mobile, $message);
    //$data['code'] = 'code sent';
    }
    //return response()->json($data);
    return view('auth/verify');
    }

    public function getchikka(Request $req){

    $code=$req->code;
    //dd($code);
    $id = Auth::user()->id;
    $profile = User::where('id',$id)->first();

    $client_mob = ClientMobile::where('id',$profile->id)->first();
    if($client_mob->code == $code){
        $client_mob->is_verified = 1;
        $client_mob->save();
        Session::flash('success_message', '');
        $data['status'] = 1;
        $admins = Admin::all();
        return view('/welcome',compact('admins'));
    }
    else{
        $data['status'] = 0;
        Session::flash('failed_message', '');
        return view('auth/verify');
    }
    
    //return response()->json($data);
}

    public function UploadImage(Request $req){
   
        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/avatar/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('client/profile', array('user' => Auth::user()) );
    }
}
