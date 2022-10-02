<?php

namespace App\Http\Controllers;

use App\Models\Deliver;
use App\Models\Order;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function saveOrder(Request $request)
    {

        $order = new Order();
        $order->member_name = $request->input('member_name');
        $order->member_address = $request->input('member_address');
        $order->partner_address = $request->input('partner_address');
        $order->member_phone = $request->input('member_phone');
        $order->order_menu_image = $request->input('order_menu_image');
        $order->order_menu_name = $request->input('order_menu_name');
        $order->order_menu_type = $request->input('order_menu_type');
        $order->order_menu_restaurant = $request->input('order_menu_restaurant');
        $order->partner_id = $request->input('partner_id');
        $order->member_id = $request->input('member_id');
        $order->menu_id = $request->input('menu_id');
        $order->user_id = $request->input('user_id');
        $order->menu_plan = $request->input('menu_plan');
        $order->save();

        $member = Member::where('id', $request->input('member_id'))->first();
        $member->member_meal_duration = $request->input('menu_plan');
        $member->save();

        $deliver = new Deliver();
        $deliver->member_name = $request->input('member_name');
        $deliver->member_address = $request->input('member_address');
        $deliver->partner_address = $request->input('partner_address');
        $deliver->deliver_menu_name = $request->input('order_menu_name');
        $deliver->deliver_menu_type = $request->input('order_menu_type');
        $deliver->partner_restaurant_name = $request->input('order_menu_restaurant');
        $deliver->volunteer_name = $request->input('volunteer_name');
        $deliver->partner_id = $request->input('partner_id');
        $deliver->member_id = $request->input('member_id');
        $deliver->user_id = $request->input('user_id');
        $deliver->menu_id = $request->input('menu_id');
        $deliver->save();

        return redirect()->route('member#index')->with(['orderCreated' => 'Your Order has been placed Sucessfully!']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOrderDelivery($id)
    {
        //show order and delivery status
        $order_data = Order::where('user_id', $id)->first();
        $delivery_data = Deliver::where('user_id', $id)->first();
        return view('Users.Member.memberOrderDelivery')->with([
            'orderData' => $order_data,
            'deliverData' => $delivery_data,
        ]);
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