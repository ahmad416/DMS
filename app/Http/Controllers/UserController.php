<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Resources\UserResource;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class UserController extends Controller
{
    // Custom Defined function
    public function getUserId($firstName, $lastName) {
        $username = Str::slug($firstName . "-" . $lastName);
        // $userRows  = User::whereRaw("userId REGEXP '^{$username}(-[0-9]*)?$'")->get();
        // $countUser = count($userRows) + 1;

        // return ($countUser > 1) ? "{$username}-{$countUser}" : $username;
        return $username;
    }

    public function register(Request $request)
    {
        $rules = [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'src' => 'image',
            'desigination' => 'required',
            'department' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users'
        ];

        $messages = [
            'firstName.required' => 'First Name is required',
            'lastName.required' => 'Last Name is required',
            'src.image' => 'The file must be an image',
            'desigination.required' => 'Desigination is required',
            'department.required' => 'Department Name is requires',
            'phone.required' => 'Phone no is required',
            'phone.unique' => 'Phone is already taken',
            'email.required'=> 'Emial is required',
            'email.emial' => 'Emial must be valid',
            'email.unique' => 'Emial already exists'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $user = new User;
        $user->firstName = $request['firstName'];
        $user->lastName = $request['lastName'];
        $user->userId = $this->getUserId($request['firstName'], $request['lastName']);
        $user->desigination = $request['desigination'];
        $user->department = $request['department'];
        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $create = $user->save();

        $success['token'] =  $user->createToken('DMS')-> accessToken;

        return response()->json(['success'=>$success, $create], 200);
    }

    public function login(Request $request){

        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $messages = [
            'email.required' => 'Email is required',
            'emial.email' => 'Email must be in correct format',
            'password.required' => ''
        ];

        $validation = Validator::make($request->all(), $rules, $messages);
        if($validation->fails()){
            return response()->json($validation->errors(), 400);
        }

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success, 'user' => $user], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function allUsers(){
        $users = UserResource::collection(User::all()->department());
        return response()->json($users, 200);
    }

    public function getUser($id){
        $user = User::findOrFail($id);
        return response()->json($user, 200);
    }
    public function update(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update();
        return response()->json('User Updated successfully', 200);
    }


}

