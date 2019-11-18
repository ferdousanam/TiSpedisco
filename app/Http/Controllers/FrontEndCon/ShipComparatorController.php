<?php

namespace App\Http\Controllers\FrontEndCon;

use App\Carrier;
use App\Http\Controllers\Controller;
use App\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use function foo\func;

class ShipComparatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = array(
            'from' => 0,
            'to' => 1,
            'size' => 20,
        );
        session(['locations' => $locations]);
        $locations = session('locations');
        $carriers = Carrier::with('rates')->get();
        return view('User.shipComparator', compact('locations', 'carriers'));
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

    public function selectedCarrier(Request $request)
    {
        session(['selected_carrier' => $request->selected_carrier]);
        return redirect(route('ship-details.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locations = array(
            'from' => $request->from,
            'to' => $request->to,
            'size' => $request->size,
            'distance' => abs($request->from - $request->to),
        );
        session(['locations' => $locations]);
        $locations = session('locations');
        $carriers = Carrier::with(['rates' => function($rates) use ($locations){
            $rates->where('distance_from', '<=', $locations['distance']);
            $rates->where('distance_to', '>=', $locations['distance']);
            $rates->where('volume', '<=', $locations['size']);
        }])
            ->get();

        dd($carriers->first->rates->toArray());
        $data = Rate::where('distance_from', '<=', 10)
            ->Where('distance_to', '>=', 10)
            ->get()->toArray();
        dd($data);
        dd($carriers->first()->rates->count());
        foreach ($carriers->first()->rates as $rate){
            dump($rate);
        }
//        dd($carriers->first);
        return view('User.shipComparator', compact('locations', 'carriers'));
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
