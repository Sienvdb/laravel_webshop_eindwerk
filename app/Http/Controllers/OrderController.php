<?php

namespace App\Http\Controllers;

use Mollie\Laravel\Facades\Mollie;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = array();
        $products = DB::table('products')->simplePaginate(30);

        $order = DB::table('orders')->get();
        $my_order = $order->where('user_id', Auth::user()->id);
        $my_orders = $my_order->where('status', 'pending');
        $data['orders'] = $my_orders;

        $product = DB::table('products')->get();

        $data['my_price'] = [];
        foreach($my_orders as $my_order){
            $my_order_product = $my_order->product_id;

            $my_product = $product->where('id', $my_order_product);
            $my_product_price = $my_product->pluck('price');
            $my_order_amount = $my_order->amount;
            $my_order_price = $my_order_amount * $my_product_price[0];
            
            array_push($data['my_price'], $my_order_price);
    
        }
        if($my_orders){
            $data['total_cost'] = array_sum($data['my_price']);
        }
        else{
            $data['total_cost'] = 0;
        }
        $data['products'] = $products;
        return view('orders.index', $data);


        //$product = Product::with('id')->where('id','=',$orders->product_id)->get();

    }

    public function showOrders()
    {

        $orders = DB::table('orders')->where('status' , 'paid')->get();
        if($orders){
            $data['orders'] = $orders;
        }
        else{
            $data['orders'] = "No orders yet";
        }

        foreach($orders as $order){
            $products = DB::table('products')->where('id',  $order->product_id)->get();
            $data['products'] = $products;
            //array_push($data['products'], $products);

            
            $users = DB::table('users')->where('id',  $order->user_id)->get();
            $data['users'] = $users;

        }
        return view('orders.admin', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        $data['order'] = $order;
        return view('orders.details', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'product_id' => "required",
           // 'description' => 'required',
            'amount' =>  'required',
        ]);
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->product_id = $request->product_id;
        $order->description = "";
        $order->amount = $request->amount;
        $order->status = "pending";
        //dd($order, $request, $request->product_id);
        $order->save();

        return redirect()->route('orders')->with('message', 'Product added to basket');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders')->with('message', 'Product deleted successfully');
    }

    public function adminUpdateOrder(Order $order) 
    {
        $order->status = "sended";
        $order->save();
        return redirect()->route('admin')->with('message', 'Order updated successfully');
    }

}
