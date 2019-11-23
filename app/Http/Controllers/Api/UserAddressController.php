<?php

namespace App\Http\Controllers\Api;

use App\Address;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserAddressController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::where('user_id', Auth::user()->id)->get();
        return response()->json(['success' => true, 'message' => "Successful", 'addresses' => $addresses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sql = Address::select('*')->where('user_id', Auth::user()->id);
        if ($request->keyword) {
            $sql->where(function ($q) use ($request) {
                $q->Where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('address_1', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('address_2', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('city', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('country', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('state', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('postcode', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('phone', 'LIKE', '%' . $request->keyword . '%');
            });
        }
        $addresses = $sql->get();
        return response()->json(['success' => true, 'message' => "Successful", 'addresses' => $addresses], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = Address::findOrFail($id);
        return response()->json(['success' => true, 'message' => "Successful", 'address' => $address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
