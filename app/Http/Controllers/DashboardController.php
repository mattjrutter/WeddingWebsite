<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
date_default_timezone_set("America/Denver");

class DashboardController extends Controller
{
    /**Create a new controller instance.
     * @return void*/
    public function __construct(){
        $this->middleware('auth');
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'attending' => 'required',
            'plusOne' => 'required'
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->attending = $request->input('attending');
        $user->plusOne = $request->input('plusOne');
        if ($user->plusOne != 'Include Guest'){
            $user->guest1 = "";
            $user->guest2 = "";
            $user->guest3 = "";
            $user->guest4 = "";
            $user->guest5 = "";
        } else {
            $user->guest1 = $request->input('guest1');
            $user->guest2 = $request->input('guest2');
            $user->guest3 = $request->input('guest3');
            $user->guest4 = $request->input('guest4');
            $user->guest5 = $request->input('guest5');
        }
        $user->save();
        return redirect('/dashboard')->with('success', 'Account Updated');
    }

    /**Show the application dashboard.
     * @return \Illuminate\Http\Response*/
    public function index(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('dashboard')->with('posts', $user->posts)->with('user', $user);
    }
}
