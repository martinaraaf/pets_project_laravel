<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        // Validate request data
        try {

            $validatedData = $request->validate([
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

            // Handle image upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images');
            }

            // Create new user
            $user = User::create([
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
                'gender' => $request->gender
            ]);
            Auth::login($user);

            if ($user) {
                return('created');
               // return redirect('/login')->with('success', 'Registration successful! Please login.');
            } else {
                return back()->withInput()->with('error', 'Failed to register user.');
            }
        } catch (\Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }
public function loginForm(){
    return view('Auth.login');

}
public function login(Request $request){
    $validatedData = $request->validate([

        "email" => 'required|email|max:100',
        "password" => 'required|string|min:6',

    ]);

   $is_auth= Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']]); //check and login,logout
    //login
    if(! $is_auth){
        return redirect(url('login'))->withErrors("credintails not correct");
    }
return("done");
}

public function logout(){
Auth::logout();
return redirect(url('login'));
}
}



