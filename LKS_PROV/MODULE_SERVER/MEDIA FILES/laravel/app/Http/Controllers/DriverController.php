<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::get();

        if(!empty($drivers)){

            return response()->json([
                'status' => true,
                'message' => 'All Data Drivers Table',
                'data' => $drivers
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Field Driver Table null'
        ],400);
    }

    /**
     * Store a newly created resource in storage.
     * For admin to create new driver.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|min:3',
            'age' => 'integer|min:18|required',
            'id_number' => 'string|required|min:16|max:16|unique:drivers'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        if($driver = Driver::create($request->all())){
            return response()->json([
                'status' => true,
                'message' => 'Create Driver Succes',
                'data' => $driver
            ],200);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::where('id', $id)->first();

        if(!empty($driver)){

            return response()->json([
                'status' => true,
                'message' => 'Get Data Driver Succes',
                'data' => $driver
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Driver with current id not found'
        ],400);
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
        $validator = Validator::make($request->all(), [
            'name' => 'string|min:3',
            'age' => 'integer|min:18',
            'id_number' => 'string|digits:16'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $driver = Driver::where('id', $id)->first();

        if(!empty($driver)){
            $driver->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Update Driver Succes'
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Driver with current id not found'
        ],400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::where('id', $id)->first();

        if(!empty($driver)){
            $driver->delete();

            return response()->json([
                'status' => true,
                'message' => 'Update Driver Succes'
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Driver with current id not found'
        ],400);
    }
}
