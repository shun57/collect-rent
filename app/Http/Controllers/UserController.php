<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lend;
use Auth;

class UserController extends Controller
{
    public function getSignup(){
        return View('user.signup');
    }
    
    public function getProfile(){
        $user = Auth::user();
        $lends = $user->lends()->get(); 
        
        foreach($lends as $lend){
            
            if($lend->status == 1){
             $lending_money[] = $lend->lending_money;
            }
        }
        
        $all_lending_money = array_sum($lending_money);
        
        return view('user.profile',[
            'user' => $user,
            'all_lending_money' => $all_lending_money,
            ]);
    }
    
    public function postSignup(Request $request){
        //バリデーション
        $this->validate($request,[
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4',
            ]);
            
            //DBインサート
            $user = new User([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                ]);
                
            //保存
            $user->save();
            
            //リダイレクト
            return redirect()->route('user.profile');
    }
    
    public function getSignin(){
        return view('user.signin');
    }
    
    public function postSignin(Request $request){
        $this->validate($request,[
            'email' => 'email|required',
            'password' => 'required|min:4'
            ]);
            
            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
                return redirect()->route('user.profile');
            }
            return redirect()->back();
    }
    
    public function getLogout(){
        Auth::logout();
        return redirect()->route('user.signin');
    }
}
