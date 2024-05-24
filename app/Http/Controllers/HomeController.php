<?php

namespace App\Http\Controllers;

use App\Models\AdvertCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $authUser = Auth::user();
        $categories = AdvertCategory::all();
        return view('home', [
            'authUser' => $authUser,
            'categories' => $categories
        ]);
    }
}
