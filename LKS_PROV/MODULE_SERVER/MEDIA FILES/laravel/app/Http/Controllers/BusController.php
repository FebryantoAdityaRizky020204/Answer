<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use Illuminate\Support\Facades\Validator;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buses = Bus::get();

        if(!empty($buses)){
            return response()->json([
                'status' => true,
                'message' => 'Succes Get All Data Of Bus',
                'buses' => $buses
            ],200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Field Null'
        ],401);
    }

    /**
     * Store a newly created resource in storage.
     * For admin to create new bus.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'plate_number' => 'string|required',
            'brand' => 'required|in:mercedes,fuso,scania',
            'seat' => 'min:1|required|integer',
            'price_per_day' => 'integer|min:100000|required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        if($bus = Bus::create($request->all())){
            return response()->json([
                'status' => true,
                'message' => 'Create Bus Succes',
                'data' => $bus
            ], 200);
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
        $bus = Bus::where('id', $id)->first();

        if(!empty($bus)){
            return response()->json([
                'status' => true,
                'message' => 'Succes Get Data Bus',
                'bus' => $bus
            ],200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Bus With Current id Not Found'
        ],401);
    }

    /**
     * Update the specified resource in storage.
     * For admin to update existing bus by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'plate_number' => 'string',
            'brand' => 'in:mercedes,fuso,scania',
            'seat' => 'min:1|integer',
            'price_per_day' => 'integer|min:100000'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $bus = Bus::where('id', $id);
        if(!empty($bus)){
            $bus->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Update Bus Succesfuly',
                'data' => $bus
            ],200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Bus With Current id Not Found'
        ],402);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bus = Bus::where('id', $id)->first();

        if(!empty($bus)){
            $bus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Delete Bus Succes'
            ],200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Bus With Current id Not Found'
        ],401);
    }
}
