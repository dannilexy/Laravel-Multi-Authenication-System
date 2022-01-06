<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AuthorController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {

           // $this->middleware('guest:admin');

    }

    public function index(){
        return view('author.register');
    }

    public function logins(){
        return view('author.login');
    }



    public function create(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $author = new Author();
        $author->name = $request->input('name');
        $author->email = $request->input('email');
        $author->password = bcrypt($request->input('password'));


        $author->save();

        return redirect('/')->with('success','Author User Created Successfully');
    }



    public function login(Request $request){

        $this->validate($request, [
            'email'=>'required|email',
            'password' => 'required|min:4'
        ]);
        if (Auth::guard('author')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/author/home');
        }
        return back()->withInput($request->only('email'));
    }


    public function home(){
        $this->middleware('auth');
        return view('author.home');
    }
}
