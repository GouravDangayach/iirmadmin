<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{
    public function get_all_user(){
        $users = User::all();
        return response()->json([
            'users' => $users
        ], 200);
    }

    public function add_user(Request $request) {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email'
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->bio = $request->bio;
        $user->type = $request->type;
        if($request->photo){
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::make($request->photo)->resize(700, 500);
            $upload_path = public_path(). "/img/upload/";
            $image = $upload_path.$user->photo;
            $img->save($upload_path.$name);
            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = "avatar.png";
        }
        $user->photo = $name;
        $user->save();
        
    }

    
    public function update_user(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email'
        ]);
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = \Hash::make($request->password);
        $users->type = $request->type;       
        $users->bio = $request->bio;
        if($users->photo != $request->photo){
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::make($request->photo)->resize(700, 500);
            $upload_path = public_path(). "/img/upload/";
            $image = $upload_path.$users->photo;
            $img->save($upload_path.$name);
            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = "avatar.png";
        }
        $users->photo = $name;
        $users->save();
    }
    
    public function delete_user(Request $request, $id){
        $user = User::findOrFail($id);
        $user->delete();
    }
    
    public function profile()
    {
        return Auth::user();
    }
        
    public function update_profile(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email'
        ]);
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->bio = $request->bio;
        if($request->password == 'undefined'){
            //$users->password = $users->password;
        }else{
            $users->password = \Hash::make($request->password);
        }
        
        
        if($users->photo != $request->photo){
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::make($request->photo)->resize(700, 500);
            $upload_path = public_path(). "/img/upload/";
            $image = $upload_path.$users->photo;
            $img->save($upload_path.$name);
            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $users->photo;
        }
        $users->photo = $name;
        $users->save();
    }
}
