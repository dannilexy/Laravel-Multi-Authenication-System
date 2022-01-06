<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('user.login');
    }

    public function register(){
        return view('user.register');
    }


    public function login(Request $request){

        $this->validate($request, [
            'email'=>'required|email',
            'password' => 'required|min:4'
        ]);
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/user/home');
        }else {
           return back()->with('error', 'Username Or Password incorrect!')->withInput($request->only('email'));
        }

    }


    public function home(){
        $this->middleware('auth');
        return view('user.home');
    }


    public function create(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));


        $user->save();

        return redirect('/')->with('success','User Created Successfully');
    }

    public function logout(){
        if ( Auth::guard('author')->logout()) {
            session()->flush();
            session()->regenerate();
            Auth::logout();

            return redirect('/');
        }
        elseif ( Auth::guard('admin')->logout()) {
            session()->flush();
            session()->regenerate();
            Auth::logout();

            return redirect('/');
        }elseif ( Auth::guard('admin')->logout()) {
            session()->flush();
            session()->regenerate();
            Auth::logout();

            return redirect('/');
        }
        else {
            Auth::logout();

            return redirect('/');
        }

        Auth::guard('author')->logout();
        session()->flush();
        session()->regenerate();

        //Auth::logout();

        return redirect('/');
    }
}
