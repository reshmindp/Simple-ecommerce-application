<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartOrder;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function new_order_page()
    {
        $products = Product::all();

        return view('order/add-order',compact('products'));
    }

    public function add_order(Request $request)
    {
        $messages= ['required' => '* This feild is required'];

        $validator= Validator::make(request()->all(),
                        ['customer_name' => 'required|string',
                        'phone_number' => 'required|numeric|digits:10',
                        'proproduct_id[0][product]'=>'required', $messages]);

        $data = request()->except('_token');


        if($validator->passes())
        {
            $net_amount = 0;
            $quatitys = 0;
            $product_data = [];

        
            foreach($data['product_id'] as $prods => $key)
            {

                $product_info = Product::where('product_id','=', $key)->sum(DB::raw('products.price  * '.$data["quantity"][$prods]["qty"]));
                $net_amount += $product_info; 
            }
            
            $order_data = array('order_number'=> rand(10000,99999), 'customer_name'=> $data['customer_name'], 'phone_number'=> $data['phone_number']
            , 'net_amount' =>  $net_amount);

            $order_id    = DB::table('orders')->insertGetId($order_data);

            for ($i = 1; $i < count($data['product_id']); $i++) 
            {
                $product_data[] = [
                    'order_id' => $order_id,
                    'product_id' => $data['product_id'][$i]['product'],
                    'quantity[0][qty]' => $data['quantity'][$i]['qty'],
                    'amount' =>$order_id];

                    CartOrder::insert($product_data);
            }
            
            
            // foreach($data['product_id'] as $mprods => $mkey)
            // {
                //echo $mkey['product']."<br>";
                // $product_data['order_id'] = $order_id;
                // $product_data['product_id'] = $mkey['product'];
                // $product_data['quantity'] = $data['quantity'][$mprods]['qty'];
                // $product_data['amount'] = '100'; 

                //array('order_id'=>$order_id, 'product_id'=>$mkey['product'], 'quantity'=>$data["quantity"][$prods]["qty"], 'amount'=>'111');

                // CartOrder::create($product_data);
                // session()->flash('success', 'Order created successfully!');
                // return redirect(route('ecom.order.list'));
            //}

        }

        else
        {
            session()->flash('errorfound', 'Validation Error!');
            return back()->withInput()->withErrors($validator);

        }

    }

    public function order_list()
    {
        $orders = Order::all();

        return view('order/order-list',compact('orders'));
    }

    public function view_invoice($id)
    {
        $invoice_data = Order::where('order_id', '=', $id)->first();
        $products = CartOrder::join('products','products.product_id', '=', 'cart_orders.product_id')->where('order_id', '=', $id)->get();

        return view('order/view-invoice', compact('invoice_data','products'));

    }

    public function edit_order($id)
    {
        $order_info = Order::where('order_id','=', $id)->get();

        return view('order/edit-order',compact('order_info'));

    }

    public function delete_order($id)
    {
        Order::where('order_id','=',$id)->delete();
        CartOrder::where('order_id','=', $id)->delete();

        session()->flash('success', 'Order deleted successfully!');
        return redirect(route('ecom.order.list'));

    }
}
