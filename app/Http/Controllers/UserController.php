<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\User;
use App\Models\UserData;
use App\Models\UserTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function index(Request $request){

    }

    public function profile(Request $request, $id)
    {

        $auth_user = Auth::user();
        $user = User::find($id);
        if ($user == null){
            return redirect('/404');
        }
        $userTypes = UserTypes::all();

        $queryBuilder = User::query()->with('userData.userDataType');

        $userData = $queryBuilder->get()[0]->userData;

        $userAdverts = Advert::query()->where('userID', $id)->get();


//        dd(json_encode($queryBuilder->get()[0]->userData));

        return view('user_profile', [
            'user' => $user,
            'userTypes' => $userTypes,
            'authUser' => $auth_user,
            'userData' => $userData,
            'userAdverts' => $userAdverts
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
        ]);

    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), ['email'=>'required|email|unique:App\Models\User,email',
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

    public function update(Request $request, $id){
//        dd($request->post());
        $user = Auth::user();
        if ($user->id != $id){
            return;
        }
        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
            'name' => 'required',
            'phone' => ['regex:/^\d+( \d+)*$/', 'nullable'],
            'web' => '',
            'email_private' => '',
            'phone_private' => '',
            'web_private' => ''
        ]);

//        if ($validator->fails()) {
//            return response()->json(['errors' => $validator->errors()], 422);
//        }

        $validated = $validator->validated();
//        dd($validated);

        $d = UserData::query()->with('userDataType')->get();
        $query = UserData::query()->where('userID', $id);
        foreach ($d as $value){
            switch ($value->userDataType['value']){
                case 'email':
                    UserData::query()->where('userID', $id)->where('userDataTypeID', $value->id)
                        ->update([
                            'value' => $validated['email'],
                            'isPrivate' => isset($validated['email_private'])
                        ]);
                    break;
                case 'phone':
                    UserData::query()->where('userID', $id)->where('userDataTypeID', $value->id)
                        ->update([
                            'value' => $validated['phone'],
                            'isPrivate' => isset($validated['phone_private'])
                        ]);
                    break;
                case 'web':
                    UserData::query()->where('userID', $id)->where('userDataTypeID', $value->id)
                        ->update([
                            'value' => $validated['web'],
                            'isPrivate' => isset($validated['web_private'])
                        ]);
                    break;
            }
        }

        User::where('id', $id)->update([
            'name' => $validated['name'],
        ]);

        return redirect()->back();


    }

    public function delete(Request $request){

    }

    public function get(Request $request){

    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->back()->with('user', null);
    }
}
