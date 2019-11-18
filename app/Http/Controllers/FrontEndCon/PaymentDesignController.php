<?php

namespace App\Http\Controllers\FrontEndCon;

use App\Http\Controllers\Controller;
use App\Order;
use App\orderItem;
use App\Rate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PaymentDesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipDetails = session('shipDetails');
        $locations = session('locations');
        $volumes = [];
        $rates = [];
        foreach ($shipDetails['shipments'] as $shipment) {
            $volumes[] = $shipment['width'] * $shipment['height'] * $shipment['length'];
            $rates[] = Rate::select('price')
                ->where('distance_from', '<=', $locations['distance'])
                ->where('distance_to', '>=', $locations['distance'])
                ->where('carrier_id', session('selected_carrier'))
                ->where('volume', '>=', $volumes)->orderBy('volume')->first();
        }
        session(['order_rates' => $rates]);
        return view('User.payment-design', compact('rates'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $success = false;
        $paymentDetails = $request->all();
        unset($paymentDetails['_token']);
        session(['paymentDetails' => $paymentDetails]);
        $shipDetails = session('shipDetails');
        $shippingAddress = session('shippingAddress');
        $paymentDetails = session('paymentDetails');
        $total_costs = session('total_costs');
        $order_data = array(
            'collection_date' => $shipDetails['collection_date'],
            'length' => $shipDetails['total_length'],
            'width' => $shipDetails['total_width'],
            'height' => $shipDetails['total_height'],
            'weight' => $shipDetails['total_weight'],
            'volume' => $shipDetails['total_length'] * $shipDetails['total_width'] * $shipDetails['total_height'],
            'receiver_full_name' => $shippingAddress['recipient_first_name'] . ' ' . $shippingAddress['recipient_surname'],
            'receiver_phone' => null,
            'receiver_email' => $shippingAddress['recipient_email'],
            'receiver_address_1' => $shippingAddress['recipient_address_1'],
            'receiver_address_2' => $shippingAddress['recipient_address_2'],
            'receiver_city' => $shippingAddress['recipient_city'],
            'receiver_province' => $shippingAddress['recipient_province'],
            'receiver_postcode' => $shippingAddress['recipient_post_code'],
            'receiver_country' => $shippingAddress['recipient_country'],
            'additional_cost' => $shipDetails['total_additional_service'],
            'price' => $shipDetails['total_amount'],
            'total_cost' => session('order_total_cost'),
            'possible_notes' => $paymentDetails['possible_notes'],
        );
        $order = Order::create($order_data);
        if ($order) {
            $updated_order = Order::find($order->id)->update(['order_code' => Carbon::now()->format('YmdHis') . $order->id]);
            if ($updated_order) {
                session(['order' => $order]);
                $order_items_data = [];
                foreach ($shipDetails['shipments'] as $key => $shipment) {
                    $data = array(
                        'length' => $shipment['length'],
                        'height' => $shipment['height'],
                        'width' => $shipment['width'],
                        'volume' => $shipment['length'] * $shipment['height'] * $shipment['width'],
                        'weight' => $shipment['weight'],
                        'price' => $shipment['price'],
                        'additional_cost' => $shipment['additional_cost'],
                        'total_cost' => $total_costs[$key],
                    );
                    $order_items_data[] = new OrderItem($data);
                }
                $order_items = $order->items()->saveMany($order_items_data, true);
                if ($order_items) {
                    $success = true;
                }
            }
        }
        if ($success) {
            session()->flash('success', 'Doctor Created Successfully');
        } else {
            session()->flash('error', 'Whoops! Something Went Wrong');
        }
        return redirect(route('order-confirm.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
