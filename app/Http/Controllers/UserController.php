<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    
    public function registerUser(Request $request) 
    {
        $user->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        ]);
        
        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        $currentuserid=$user->id;

        //auth()->login($user);
        //User::create((array) $request);

        return redirect('/createuser')->with('Success', "Account has been registered successfully!")->with('id', $currentuserid);
    }

    public function createUser(Request $request) 
    {
        
        //return $request->input(); 
        $user = new User;
        //$user->id=5;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->save();
        $currentuserid=$user->id;

        //auth()->login($user);
        //User::create((array) $request);

        return redirect('/createuser')->with('success', "Account successfully registered!")->with('id', $currentuserid);
    }

    public function findKnownUser(Request $request)
    {
        //$user = new User;
        //$user->id=$request->id;
        $currentuser = User::find($request->id);
        //return $currentuser;
        return view('edituser', ['currentuser'=>$currentuser]);
    }
    public function editUser(Request $request, User $user)
    {
        //$user = new User;
        $usertoedit = User::find($request->id);
        $usertoedit->name=$request->name;
        $usertoedit->email=$request->email;
        $usertoedit->phone=$request->phone;
        $usertoedit->update();
        
        return redirect('/edit_user')->with('updatesuccessful','Item updated successfully');
    }
    public function deleteUser(Request $request, User $user)
    {
        //$user = new User;
        $usertodelete = User::find($request->id);
        
        $usertodelete->delete();
        
        return redirect('/find_known_user')->with('deletesuccessful','Item deleted successfully');
    }
    public function showAllUsers()
    {
         $users =  User::all();
         return view('users',['users'=>$users]);

    }
    public function getUserByID()
    {
         $users =  User::all();
         return view('users',['users'=>$users]);

    }
}
