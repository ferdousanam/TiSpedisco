<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShipDetailsController extends Controller
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->length as $key => $i){
            $shipItems[$key]['length'] = $request->length[$key];
            $shipItems[$key]['length2'] = $request->length2[$key];
            $shipItems[$key]['amount'] = $request->amount[$key];
            $shipItems[$key]['height'] = $request->height[$key];
            $shipItems[$key]['weight'] = $request->weight[$key];
            $shipItems[$key]['additional_service'] = $request->additional_service[$key];
            $shipItems[$key]['content'] = $request->input('content')[$key];
        }
        $shipDetails = array(
            "collection_date" => $request->collection_date,
            "total_length" => $request->total_length,
            "total_length2" => $request->total_length2,
            "total_amount" => $request->total_amount,
            "total_height" => $request->total_height,
            "total_weight" => $request->total_weight,
            "total_additional_service" => $request->total_additional_service,
            "total_content" => $request->total_content,
            "ship_items" => $shipItems,
        );
        unset($shipDetails['_token']);
        $data = session(['shipDetails' => $shipDetails]);
        return ($data) ? true : false;
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
}
