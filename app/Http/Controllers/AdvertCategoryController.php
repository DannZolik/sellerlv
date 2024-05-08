<?php

namespace App\Http\Controllers;

use App\Models\AdvertCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdvertCategoryController extends Controller
{
    //
    public function index(Request $request){

    }

    public function profile(Request $request)
    {

    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'value' => 'required|max:128'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $validated = $validator->validated();
        $model = new AdvertCategory();
        $model['value'] = $validated['value'];
        $model->save();

    }

    public function update(Request $request){

    }

    public function delete(Request $request){

    }

    public function get(Request $request){

    }
}
