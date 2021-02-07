<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserDetailRequest;
use App\Http\Requests\StoreUserDetailRequest;
use App\Http\Requests\UpdateUserDetailRequest;
use App\Models\UserDetail;
use App\Models\BasicDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackController extends Controller
{
    //
    public function index()
    {
             return view('welcome');
    }

    public function store(Request $request)
    {
       $smsservise  = BasicDetail::find(1)->sms_serviceon;       
     if( $smsservise == 1){
        $final =  $request->all() + ['sms_send' => '1'];        
        $userDetail = UserDetail::create($final);
     }else{
        $final =  $request->all() + ['sms_send' => '0'];
        $userDetail = UserDetail::create($final);
     }       
     return view('feedback');
     
    }
}
