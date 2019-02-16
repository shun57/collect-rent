<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateLend;
use App\User;
use App\Lend;
use Auth;

class LendController extends Controller
{
    public function index()
    {
    $current_user = Auth::user();
    
    $lends = $current_user->lends()->get();
    
    return view('lends/index',[
            'current_user' => $current_user,
            'current_user_id' => $current_user->id,
            'lends' => $lends,
        ]);

    }
    
    public function showCreateForm(int $id)
    {
        return view('lends/create',[
            'user_id' => $id
            ]);
    }
    
    public function create(CreateLend $request)
    {
        $current_user = Auth::user();
        
        $lend = new Lend();
        $lend->name = $request->name;
        $lend->email = $request->email;
        $lend->lending_money = $request->lending_money;
        
        $current_user->lends()->save($lend);
        
        return redirect()->route('lends.index',[
            'id' => $current_user->id,
            ]);
    }
    
}
