<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserController extends Controller
{
    

    
    public function register(Request $request)
    {
        //
        
        $validated = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'repeat-password' => 'required|same:password',
        ]);
        
        
            
            $user = new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=md5($request->password);
            $user->save();
            return response()->json($user);
            //return response()->json($validated);
        

        
    }

   
    
    public function getusers()
    {
        // gets all users and returns as a json
        $users = User::all();
        return response()->json($users);
    }

    
    public function getuser($id)
    {
        //finds user with an id 
        $users = User::find($id);
        return response()->json($users);
    }
    
    
    public function delete($id)
    {
        //finds user with a specific user and deletes id'd user then returns response as a json
        $user = User::find($id);
        $user->delete();
        
        // set feedback message in assocuative array
        $feedback = array("message"=>"Item Deleted Successfullly");
        //json_encode($feedback);

        //convert array to JSON format 
        return response()->json($feedback);
    }

    
    
    public function update(Request $request, $id)
    {
        //updates/edits user with a specific id(email and password are required, then specific user is stored)
        $user = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return response()->json($user);
    }

    
    public function login(Request $request)
    {
        //logs in user
        $user = User::where('email',$request->email)->first() ; 
        //return response()->json($user);
        //return gettype($user);
        //return gettype(response()->json($user));
        //return $user[0]->password."   ".md5($request->password);
        
        $request->validate([
            'password' => 'required',
            'email' => 'required'
        ]);

        if (!isset($user->email))
        {
            $feedback = array("message"=>"the email does not exist with us");
            return response()->json($feedback);
        }
           
            

        if (isset($user->email) && $user->password==md5($request->password))
        {
            if (Session::has('user') && Session::get('user')==$user->email)
            {
                $feedback = array("message"=>"User Session Already Created");
                return response()->json($feedback); 
            }
            else 
            {
                $request->session()->put('user',$user->email);
                $feedback = array("message"=>"User Session Created");
                return response()->json($feedback); 
            }
            
        }   

        else
        {
            $feedback = array("message"=>"INCORRECT PASSWORD FOR EMAIL");
            return response()->json($feedback);
        }
    }

  
}
