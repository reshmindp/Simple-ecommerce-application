<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{

    public function add_category()
    {
        $messages= ['required' => '* This feild is required'];
        $validator= Validator::make(request()->all(),
                        ['category_name' => 'required|string'], $messages);

        $data = request()->except('_token');

        if($validator->passes())
        {
            Category::create($data);

            return back()->with('success', 'Category added successfully!');

        }
        else
        {
            session()->flash('errorfound', 'Validation Error!');
            return back()->withInput()->withErrors($validator);
        }

    }

    public function category_page()
    {
        $categories = Category::all();

        return view('category/add-category',compact('categories'));
    }
}
