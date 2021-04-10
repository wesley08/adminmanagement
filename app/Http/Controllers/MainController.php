<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class MainController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.dashboard', compact('user'));
    }

    function login(){
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }
    function save(Request $request){
        
        //Validate requests
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:12'
        ]);

         //Insert data into database
         $admin = new User;
         $admin->name = $request->name;
         $admin->email = $request->email;
         $admin->password = Hash::make($request->password);
         $save = $admin->save();

         if($save){
            return back()->with('success','New User has been successfuly added to database');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }

    function check(Request $request){
        //Validate requests
        $request->validate([
             'email'=>'required|email',
             'password'=>'required|min:5|max:12'
        ]);

        $userInfo = Admin::where('email','=', $request->email)->first();
        $userInfo2 = User::where('email','=', $request->email)->first();

        if($userInfo2){
            //check password
            if(Hash::check($request->password, $userInfo2->password)){
                $request->session()->put('LoggedUser', $userInfo2->id);
                return redirect('/kaprodi/dashboard');
            }else{
                return back()->with('fail','Incorrect password');
            }
        }else if($userInfo){
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('/admin/dashboard');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }else{
            return back()->with('fail','We do not recognize your email address');
        }

        // if(!$userInfo2){
        //     return back()->with('fail','We do not recognize your email address');
        // }else{
        //     //check password
        //     if(Hash::check($request->password, $userInfo2->password)){
        //         $request->session()->put('LoggedUser', $userInfo2->id);
        //         return redirect('kaprodi/dashboard');

        //     }else{
        //         return back()->with('fail','Incorrect password');
        //     }
        // }
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

    function dashboard(){
        $data['admin'] = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        $data['users'] = User::all();
        return view('admin.dashboard', $data);
    }

    function settings(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.settings', $data);
    }

    function adduser(){
        $data['admin'] = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        $data['users']='';
        return view('admin.addedituser', $data);
    }
    function updateuser($id){
        $data['admin'] = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        $data['users'] = User::find($id);
        return view('admin.addedituser', $data);
    }

    function profile(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.profile', $data);
    }
    function staff(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.staff', $data);
    }
    function ReadAllUser(){
        $data = User::all();
        return view('admin.dashboard', ['users'=>$data]);
    }
}
