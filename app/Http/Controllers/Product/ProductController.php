<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function product_page()
    {
        $categories = Category::all();

        return view('product/add-product',compact('categories'));

    }

    public function add_product(Request $request)
    {
        $messages= ['required' => '* This feild is required'];
        $validator= Validator::make(request()->all(),
                        ['product_name' => 'required|string',
                        'category_id' => 'required',
                        'price' => 'required|numeric|gt:0',
                        'product_image'=> 'required|image'], $messages);

        $data = request()->except('_token');

        if($validator->passes())
        {
            $image_name = preg_replace('/\W+/','-', strtolower($data['product_name'])).time().'.'.$request->product_image->extension();
            $product_data = array('product_name'=> $data['product_name'], 'category_id'=> $data['category_id'], 
            'price'=> $data['price'], 'product_image'=> $image_name);

            $request->product_image->move(public_path('uploads'), $image_name);

            Product::create($product_data);

            return back()->with('success', 'Product added successfully!');

        }
        else
        {
            session()->flash('errorfound', 'Validation Error!');
            return back()->withInput()->withErrors($validator);
        }
    }

    public function product_list()
    {
        $products = Product::join('categories','categories.category_id','=','products.category_id')->get();

        return view('product/product-list', compact('products'));
    }

    public function delete_product($id)
    {
        $product_image = Product::where('product_id','=',$id)->first();

        @unlink(public_path('uploads/'.$product_image->product_image));
        Product::find($id)->delete();

        session()->flash('success', 'Product deleted successfully!');
        return redirect(route('ecom.product.list'));
    }

    public function edit_product($id)
    {
        $categories = Category::all();

        $product = Product::join('categories','categories.category_id','=','products.category_id')
        ->where('product_id', '=', $id)->first();

        return view('product/edit-product',compact('product','categories'));
    }

    public function update_product(Request $request)
    {
        $messages= ['required' => '* This feild is required'];

        $validator= Validator::make(request()->all(),
                        ['product_name' => 'required|string',
                        'category_id' => 'required',
                        'price' => 'required|numeric|gt:0',
                        'product_image'=> 'image'], $messages);

        $data = request()->except('_token');

        if($validator->passes())
        {
            $image_name = "";

            if($request->product_image)
            {
                $image_name = preg_replace('/\W+/','-', strtolower($data['product_name'])).time().'.'.$request->product_image->extension();
                $request->product_image->move(public_path('uploads'), $image_name);
                @unlink(public_path('uploads/'.$data['orig_image_name']));
            
            }
            else
            {
                $image_name = $data['orig_image_name'];

            }

            $product_data = array('product_name'=> $data['product_name'], 'category_id'=> $data['category_id'], 
            'price'=> $data['price'], 'product_image'=> $image_name);

            DB::table('products')->where('product_id', $request->get('product_id'))->update($product_data);  

            session()->flash('success', 'Product Details Updated!');

            return redirect(route('ecom.product.list'));

        }
        else
        {
            session()->flash('errorfound', 'Validation Error!');
            return back()->withInput()->withErrors($validator);
        }

    }

}
