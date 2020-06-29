<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Homework;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $homeworks = Homework::all();
        return view('home')->with('homeworks', $homeworks);
    }

    public function AccountSettings($id) {
        $user = User::find($id);

        return view('AccountSettings')->with('user', $user);
    }


    public function Profile($id) {
        $user = User::find($id);

        return view('Profile')->with('user', $user);
    }

    public function updateAdmin(Request $request) {

        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->lastname = $request->input('lname');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');

        if($request->input('iban') != null) {
            $user->iban = $request->input('iban');
        }
        $user->save();

        $user = User::find(Auth::user()->id);
        return view('Profile')->with('user', $user);
        
    }

    public function getUsers()
    {   
        $users = User::all()->except(Auth::id());

        if(Auth::user()->isAdmin){
            return response()->json($users);
        }
        // dd($users);
        foreach ($users as $k => $usr) {
            if(!$usr->isAdmin) { 
                unset($users[$k]); 
            }
        }

        return response()->json($users);
        
    }

    public function getCurrentUser()
    {
        return response()->json(Auth::user());
    }
}
