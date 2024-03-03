<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ApiAuthController extends Controller
{
    public function register(Request $request){

//validation
$Validator= Validator::make($request->all(),[
    "name" => 'required|min:2|max:100|string',
    "email" => 'required|email|unique:users,email|max:100',
    "password" => 'required|string|min:6|confirmed',
    'phoneNumber' => 'required|min:10',
    'age' => 'required|integer|max:100',
    'building_number' => 'string|max:255|nullable',
    'street' => 'required|string|max:255',
    'area' => 'required|string|max:255',
    'city' => 'required|string|max:255',
    'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
    'gender' => 'required|in:male,female',
]);
if($Validator->fails()){
    return response()->json([
'msg'=>$Validator->errors()
    ],301);
}
$imagePath = null;
if ($request->hasFile('image')) {
    $imagePath = $request->file('image')->store('images');
}
///////////////////
// $imgName = time().'.'.$request->image->extension();
// $request->image->move(public_path('images'), $imgName);

// return back()->with('success', 'Image uploaded Successfully!')->with('image', $imgName);
////////////////////
//pasword hash

//create
$access_token= Str::random(64);
User::create([
    'name' => $request->name,
    'email' => $request->email,
    'phoneNumber' => $request->phoneNumber,
    'age' => $request->age,
    'building_number' => $request->building_number,
    'password' => Hash::make($request->password),
    'street' => $request->street,
    'area' => $request->area,
    'city' => $request->city,
    'image' => $imagePath,
    'gender' => $request->gender,
'access_token'=>$access_token,
]);
//msg
if($Validator->fails()){
    return response()->json([
'msg'=>"you register successfully"
    ],
);
}}
public function login(Request $request){
//validation
$Validator= Validator::make($request->all(),[

    "email" => 'required|email|max:100',
    "password" => 'required|string|min:6',

]);
if($Validator->fails()){
    return response()->json([
'msg'=>$Validator->errors()
    ],301);
}
//check email
$access_token=Str::random(64);
$user=User::where("email",'=',$request->email)->first();
if($user){
 $password=   Hash::check($request->password,$user->password);
 if($password){
    //update access token
    $user->update([
"access_token"=>$access_token

    ]);
    //msg
    return response()->json([
        'msg'=>"you logged in succesfully",
        "access_token"=>$access_token
            ],200);
 }else{
    return response()->json([
        'msg'=>'credinatls not correct'
            ],405);
 }

}else{
    return response()->json([
        'msg'=>'credinatls not correct'
            ],405);
}
//password
//login
}

public function logout(Request $request){
$access_token=$request->header('access_token');
//check hwa mogod wla la
if($access_token!=null){
  $user=  User::where('access_token','=',$access_token)->first();
if($user){
$user->update([
    "access_token"=>null
]);
return response()->json([
    'msg'=>'logout succssefuly'
        ],200
    );
}else{
    return response()->json([
        'msg'=>'notfound'
            ],404);
}

}else{
    return response()->json([
        'msg'=>'access token not correct'
            ],404);
        }
    }
}
