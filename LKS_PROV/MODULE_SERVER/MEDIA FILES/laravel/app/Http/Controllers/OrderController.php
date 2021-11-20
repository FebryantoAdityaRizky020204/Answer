<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Driver;
use App\Models\Bus;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::get();

        return response()->json([
            'status' => true,
            'message' => 'All Data on table Orders',
            'data' => $orders
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     * For admin to create new order. For each order, match available bus with available driver in the given date. Make sure that there is no conflicting order (one bus in 2 different dates). For example, if bus A and driver D is rented from 1 January 2018 for 5 days, both bus A and driver D cannot be ordered anymore until 5 January 2018 because it already rented from 1 January until 5 January
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'contact_name' => 'string|required',
            'contact_phone' => 'string|required',
            'start_rent_date' => 'date|after:'.Carbon::now().'|required',
            'total_rent_days' => 'integer|min:1|required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        
        // request date
        $requestDate = $request->start_rent_date;

        $driverOrders = Order::where('driver_id', $request->driver_id)->get();
        foreach($driverOrders as $driverOrder){
            // get the start_rent_date
            $srd = $driverOrder->start_rent_date;
            // get total rent days
            $trd = $driverOrder->total_rent_days - 1;
            // get the end rent date
            $erd = date('Y-m-d', strtotime($srd . "+".$trd." days"));

            if($requestDate >= $srd && $requestDate <= $erd){
                return response()->json([
                    'status' => false,
                    'message' => 'conflicting order or no available bus or driver',
                ],401);
            }
        }

        $busOrders = Order::where('bus_id', $request->bus_id)->get();
        foreach($busOrders as $busDriver){
            // get the start_rent_date
            $srd = $busDriver->start_rent_date;
            // get total rent days
            $trd = $busDriver->total_rent_days -1;
            // get the end rent date
            $erd = date('Y-m-d', strtotime($srd . "+".$trd." days"));

            if($requestDate >= $srd && $requestDate <= $erd){
                return response()->json([
                    'status' => false,
                    'message' => 'conflicting order or no available bus or driver',
                ],401);
            }
        }

        $order = Order::create($request->all());
        if(!empty($order)){
            return response()->json([
                'status' => true,
                'message' => 'order succes',
                'data' => [
                    'order' => $order,
                    'bus' => Bus::find($request->bus_id),
                    'driver' => Driver::find($request->driver_id),
                ],
            ],200);
        }

        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        if(!empty($order)){
            return response()->json([
                'status' => true,
                'message' => 'get data with current id succes',
                'data' => $order
            ],200);
        }

        return response()->json([
            'status' => false,
            'message' => 'data with current id not found'
        ],402);
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
        $order = Order::find($id);

        if(!empty($order)){
            $order->delete();
            return response()->json([
                'status' => true,
                'message' => 'delete data with current id succes'
            ],200);
        }

        return response()->json([
            'status' => false,
            'message' => 'data with current id not found'
        ],402);
    }


    /**
     * 
     * For admin to create new order. For each order, match available bus with available driver in the given date. Make sure that there is no conflicting order (one bus in 2 different dates). For example, if bus A and driver D is rented from 1 January 2018 for 5 days, both bus A and driver D cannot be ordered anymore until 5 January 2018 because it already rented from 1 January until 5 January
     */

    public function test(Request $request){

        $date = $request->date_try;
        $customDate = '';

        // first validation
        $validator = Validator::make($request->all(), [
            'date_try' => 'required|date'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        return response()->json([
            'status' => true,
            'message' => 'its already run as well',
            'data' => [
                'your_request' => $request->all(),
                'custom_date' => $customDate,
            ],
        ], 200);
    }
}
