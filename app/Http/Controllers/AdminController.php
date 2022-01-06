<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {

           // $this->middleware('guest:admin');

    }



    public function index(){
        return view('admin.register');
    }

    public function logins(){
        return view('admin.login');
    }

    public function create(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $admin = new Admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = bcrypt($request->input('password'));


        $admin->save();

        return redirect('/')->with('success','Admin User Created Successfully');
    }

    public function login(Request $request){

        $this->validate($request, [
            'email'=>'required|email',
            'password' => 'required|min:4'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/admin/home');
        }
            return back()->withInput($request->only('email'));
    }


    public function home(){
        $this->middleware('auth');
        return view('admin.home');
    }
}
