<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
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
        $orders = Order::latest()->simplePaginate(6);;
        $data['orders'] = $orders;
        foreach($orders as $order){
            $products = DB::table('products')->simplePaginate(6);
            $product = $products->where('id','=', $order->product_id);
            $data['products'] = $product;
        }
        //$product = Product::with('id')->where('id','=',$orders->product_id)->get();
        //dd($product);
        return view('orders.index', $data);

    }

    public function showOrders()
    {
        $orders = Order::latest()->simplePaginate(6);
        $data['orders'] = $orders;
        return view('orders.index', $data);
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
            //'amount' =>  'required',
        ]);
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->product_id = $request->product_id;
        $order->description = "first test";
        $order->amount = 3;
        //dd($order, $request, $request->product_id);
        $order->save();
        dd($order);

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
    public function destroy($id)
    {
        //
    }
}
