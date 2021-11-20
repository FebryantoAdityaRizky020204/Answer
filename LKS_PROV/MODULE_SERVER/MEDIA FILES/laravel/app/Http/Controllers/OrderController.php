<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Driver;
use App\Models\Bus;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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


    /**
     * 
     * For admin to create new order. For each order, match available bus with available driver in the given date. Make sure that there is no conflicting order (one bus in 2 different dates). For example, if bus A and driver D is rented from 1 January 2018 for 5 days, both bus A and driver D cannot be ordered anymore until 5 January 2018 because it already rented from 1 January until 5 January
     */

    public function test(Request $request){
        

        return response()->json([
            'status' => true,
            'message' => 'its already run as well',
            // 'data' => [
            //     ''
            // ],
        ], 200);
    }
}
