<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function index(Request $request){

    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        return view('user_profile', [
            'user' => $user
        ]);

    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), ['email'=>'required|email','password'=>'required']);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $validated = $validator->validated();
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), ['email'=>'required|email',
            'password'=>'required', 'name' => 'required', 'password_confirmation' => 'required|same:password' ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        $validated = $validator->validated();

        $user = new User();

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];
        $user->save();

        Auth::login($user);

        return redirect('/home');

    }

    public function update(Request $request){

    }

    public function delete(Request $request){

    }

    public function get(Request $request){

    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->back();
    }
}
