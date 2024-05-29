<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\AdvertCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdvertController extends Controller
{
    //

    public function index(Request $request, $category){
        $name = $request->input("name");
        $from = $request->input("from");
        $to = $request->input("to");

        $categoryID = AdvertCategory::where('route', $category)->first()->id;

        $queryBuilder = Advert::query()->where('categoryID', $categoryID);

        if (!empty($name))
            $queryBuilder = $queryBuilder->where('title', 'like', '%'.$name.'%');
        if (!empty($from))
            $queryBuilder = $queryBuilder->where('price', '>=', floatval($from));
        if (!empty($to))
            $queryBuilder = $queryBuilder->where('price', '<=', $to);

        $queryBuilder = $queryBuilder->with(['user.userData' => function($query) {
            $query->where('isPrivate', 0);
        }, 'user.userData.userDataType']);


        $authUser = Auth::user();
        $allAdverts = $queryBuilder->orderBy('created_at', 'desc')->get();
        return view('advertListPage', [
            'allAdverts' => $allAdverts,
            'category' => $category,
            'name' => $name,
            'from' => $from,
            'to' => $to,
            'authUser' => $authUser
        ]);

    }

    public function profile(Request $request)
    {

    }

    public function create_index(Request $request)
    {
        $allCategories = AdvertCategory::all();
        $authUser = Auth::user();

        return view('createAdvert', [
            'allCategories' => $allCategories,
            'authUser' => $authUser
        ]);
    }

    public function create(Request $request){

        $user = Auth::user();
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'categoryID' => 'required',
            'price' => 'required|numeric',

        ]);
        $name = $request->file('image')->getClientOriginalName();

        $path = $request->file('image')->store('public/images');

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $model = new Advert();

        $model->title = $validatedData['title'];
        $model->price = $validatedData['price'];
        $model->description = $validatedData['description'];
        $model->image = 'images/'.$imageName;
        $model->userID = $user['id'];

        $model->categoryID = $validatedData['categoryID'];

        $model->save();

        return redirect()->route('adverts.create')->with('status', 'Created...');
    }

    public function update(Request $request, $id){

        $authUser = Auth::user();
        $advert = Advert::find($id);

        if ($authUser['id'] !== $advert['userID']){
            return;
        }

        $validatedData = $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'categoryID' => 'required',
            'price' => 'required',

        ]);

        if (isset($validatedData['image'])){
            $name = $request->file('image')->getClientOriginalName();

            $path = $request->file('image')->store('public/images');

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $advert->image = 'images/'.$imageName;
        }

        $advert->title = $validatedData['title'];
        $advert->description = $validatedData['description'];
        $advert->categoryID = $validatedData['categoryID'];
        $advert->price = $validatedData['price'];

        $advert->save();

        Session::flash('success', 'Advert was edited successfully!');

        return redirect()->back();
    }

    public function delete(Request $request, $id){
        $authUser = Auth::user();
        $advert = Advert::find($id);

        if ($authUser['id'] !== $advert['userID']){
            return;
        }
        Advert::destroy($id);
        Session::flash('success', 'Advert was deleted successfully!');
        return redirect()->back();

    }

    public function get(Request $request){

    }

}
