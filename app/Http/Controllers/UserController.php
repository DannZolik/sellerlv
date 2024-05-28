<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\AdvertCategory;
use App\Models\User;
use App\Models\UserData;
use App\Models\UserDataType;
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

        $queryBuilder = User::query()->where('id', $id)->with('userData.userDataType');

//        dd(json_encode($queryBuilder->get()));
        $userData = $queryBuilder->get()[0]->userData;


        $userAdverts = Advert::query()->where('userID', $id)->get();

        $allCategories = AdvertCategory::all();


//        dd(json_encode($queryBuilder->get()[0]->userData));

        return view('user_profile', [
            'user' => $user,
            'userTypes' => $userTypes,
            'authUser' => $auth_user,
            'userData' => $userData,
            'userAdverts' => $userAdverts,
            'allCategories' => $allCategories
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
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                'unique:App\Models\User,email',
                function ($attribute, $value, $fail) {
                    if (UserData::where('value', $value)->exists()) {
                        $fail('The ' . $attribute . ' has already been taken.');
                    }
                },
            ],
            'password' => 'required',
            'name' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        $validated = $validator->validated();

        $user = new User();

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];
        $user->save();

        UserData::create([
            'value' => $user->email,
            'isPrivate' => false,
            'userID' => $user->id,
            'userDataTypeID' => UserDataType::query()->where('value', 'email')->first()->id,
        ]);

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
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) use($id){
                    $emailID = UserDataType::query()->where('value', 'email')->first()->id;
                    if (UserData::query()->where('userID', $id)->where('value', $value)
                        ->where('userDataTypeID',$emailID)->exists()){
                        return;
                    }
                    if (UserData::where('value', $value)->exists()) {
                        $fail('The ' . $attribute . ' has already been taken.');
                    }
                },
            ],
            'name' => 'required',
            'phone' => ['regex:/^\d+( \d+)*$/', 'nullable'],
            'web' => '',
            'email_private' => '',
            'phone_private' => '',
            'web_private' => ''
        ]);

        $validated = $validator->validated();

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
