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
                        'product_id' => 'required',
                         'quantity'=>'required', $messages]);

        $data = request()->except('_token');


        if($validator->passes())
        {
            $net_amount = 0;
            $quatitys = 0;
            
            $order_data = array('order_number'=> rand(10000,99999), 'customer_name'=> $data['customer_name'], 'phone_number'=> $data['phone_number']
            , 'net_amount' =>  $data['hid_order_total']);

            $order_id    = DB::table('orders')->insertGetId($order_data);

            DB::table('cart_orders')->where('order_status', '0')->update(array('order_id' => $order_id,'order_status'=> 1));
            
            session()->flash('success', 'Order Placed Successfully!');
            return redirect(route('ecom.order.list'));

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
        $products = DB::table('products')
        ->join('cart_orders', 'cart_orders.product_id', '=', 'products.product_id')
        ->select('products.product_id', 'products.product_name', 'products.price as amount', DB::raw('SUM(cart_orders.quantity) as quantity'))
        ->where([['cart_orders.order_status','=', 1],['order_id','=', $id]])
        ->groupBy('products.product_id', 'products.product_name', 'products.price')
        ->get();

        return view('order/view-invoice', compact('invoice_data','products'));

    }

    public function edit_order($id)
    {
        $order_info = Order::where('order_id','=', $id)->first();
        $order_products = CartOrder::join('products','products.product_id','=','cart_orders.product_id')->where('order_id','=',$id)->get();

        $products = Product::all();

        return view('order/edit-order',compact('order_info', 'products','order_products'));

    }

    public function delete_order($id)
    {
        Order::where('order_id','=',$id)->delete();
        CartOrder::where('order_id','=', $id)->delete();

        session()->flash('success', 'Order deleted successfully!');
        return redirect(route('ecom.order.list'));

    }

    public function add_to_cart()
    {
        $request = request()->except('_token');
        $net_amount = 0;
            
        $product_id = $request['product_id'];
        $quantity = $request['quantity'];
        $amount = $request['amount'];

        $product_info = Product::where('product_id','=', $product_id)->sum(DB::raw('products.price  * '.$quantity));
        $net_amount += $product_info; 

        $product_data['order_id'] = 0;
        $product_data['product_id'] = $product_id;
        $product_data['quantity'] = $quantity;
        $product_data['amount'] = $amount; 

        if(CartOrder::updateOrCreate($product_data))
        {
            $sum_total = CartOrder::where('order_status', '0')->sum(\DB::raw('amount * quantity'));

            echo json_encode(array('message'=>'success','total'=> 'Rs: '.$sum_total));
        }
        else
        {
            echo "Error";
        }

    }

    public function update_order()
    {

    }
}
