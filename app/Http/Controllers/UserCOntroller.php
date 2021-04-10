<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserCOntroller extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.dashboard', compact('user'));
    }
    //
    function CreateUser(Request $request){
        
        //Validate requests
        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required',
        //     'password'=>'required'
        // ]);

         //Insert data into database
         $user = new User;
         $user->name = $request->name;
         $user->email = $request->email;
         $user->role = $request->role;
         $user->password = Hash::make($request->password);
         $save = $user->save();

         if($save){
            return back()->with('success','New User has been successfuly added to database');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }

    function DeleteUserById($id){
        $res = User::destroy($id);
        if ($res) {
            return redirect('/admin/dashboard');
        } else {
            return response()->json([
                'status' => '0',
                'msg' => 'fail'
            ]);
        }
    }

    function UpdateUserById($id, Request $request)
    {
        $data = array('name'=>$request->nameEdit,"email"=>$request->emailEdit,"role"=>$request->roleEdit);
        DB::table('users')
        ->where('id', $id)
        ->update($data);
        return redirect('/admin/dashboard');
    }

    function ReadAllUserAdminPage(){
        $data['admin'] = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        $data['users'] = User::paginate(5);
        return view('admin.dashboard', $data);
    }

    function UserGetTestScore(Request $request)
    {
        $data = $request->except('_token');
        $temp["score"] =0;
        foreach ($data as $key => $value) {
            $temp["score"] += $value;
            
        };
        // return redirect('/kaprodi/dashboard',$temp);
        return view('users.dashboard', $temp);
    }
    
    function UserGetTestScoreDominan(Request $request)
    {
        $data = $request->except('_token');
        $a =0;
        $b =0;
        foreach ($data as $key => $value) {
            if($value == "a"){
                $a +=1;
            }else{
                $b +=1;
            }
        }
        $temp["scoreDominan"] = $a > $b ? "Dominan A" : "Dominan B"; 
        return view('kaprodi',$temp);
    }
}
