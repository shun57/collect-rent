<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lend;
use Auth;

class LendController extends Controller
{
    public function index()
    {
    $current_user = Auth::user();
    
    $lends = Lend::where('user_id',$current_user->id)->get();
    
    return view('lends/index',[
            'current_user' => $current_user,
            'current_user_id' => $current_user->id,
            'lends' => $lends,
        ]);

    }
    
}
