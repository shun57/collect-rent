<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use App\User;
use App\Lend;
use Illuminate\Http\Request;
use App\Http\Requests\CreateLend;
use App\Mail\IntervalMail;

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
        $lend->interval = $request->interval;
        
        $current_user->lends()->save($lend);
        
        Mail::to($lend->email)->send(new IntervalMail($current_user,$lend));
        
        return redirect()->route('lends.index',[
            'id' => $current_user->id,
            ]);
    }
    
    public function showEditForm(int $id, int $lend_id)
    {
        $lend = Lend::find($lend_id);
        
        return view('lends/edit',[
            'lend' => $lend,
            ]);
    }
    
    public function edit(int $id, int $lend_id, Request $request)
    {
        $this->validate($request,[
        'name' => 'required',
        'email' => 'email|required',
        'lending_money' => 'integer|required',
        'status' => 'required|in:1,2',
        ]);
        
        $lend = Lend::find($lend_id);
        
        $lend->name = $request->name;
        $lend->email = $request->email;
        $lend->lending_money = $request->lending_money;
        $lend->status = $request->status;
        
        $lend->save();
        
        return redirect()->route('lends.index',[
            'id' => $lend->user_id,
            ]);
    }
    
    public function delete(int $id, int $lend_id)
    {
        $lend = Lend::find($lend_id);
        $lend->delete();
        return redirect()->route('lends.index',[
            'id' => $lend->user_id,
            ]);
    }
    
    public function send_mail()
    {
        $users = User::all();
        foreach($users as $user){
            $user_lends = $user->lends()->get();
          foreach($user_lends as $user_lend){
            \Mail::to($user_lend->email)->send(new IntervalMail($user,$user_lend));
          }
        }
     }
    
    
}
