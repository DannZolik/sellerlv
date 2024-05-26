<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\AdvertCategory;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    //

    public function index(Request $request, $category){
//        dd($request->input());
        $name = $request->input("name");
        $from = $request->input("from");
        $to = $request->input("to");

        $categoryID = AdvertCategory::where('route', $category)->first()->id;

        $queryBuilder = Advert::query()->where('categoryID', $categoryID);

        if (!empty($name))
            $queryBuilder->where('title', 'like', '%'.$name.'%');
        if (!empty($from))
            $queryBuilder->where('price', '>=', floatval($from));
        if (!empty($to))
            $queryBuilder->where('price', '<=', $to);



        $allAdverts = $queryBuilder->orderBy('created_at', 'desc')->get();
        return view('advertListPage', [
            'allAdverts' => $allAdverts,
            'category' => $category,
            'name' => $name,
            'from' => $from,
            'to' => $to,
        ]);

    }

    public function profile(Request $request)
    {

    }

    public function create(Request $request){

    }

    public function update(Request $request){

    }

    public function delete(Request $request){

    }

    public function get(Request $request){

    }

}
