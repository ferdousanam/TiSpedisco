<?php

namespace App\Http\Controllers\FrontEndCon;

use App\Http\Controllers\Controller;
use App\Invoice;
use App\orderItem;
use App\Rate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class InvoiceController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all resources
        $invoices = Invoice::all()->sortByDesc('id');

        return view('admin.invoice.invoices', compact('invoices'));
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
        $order_success = app('\App\Http\Controllers\FrontEndCon\PaymentDesignController')->storeSave($request->all());
//        $order_success = true;
        if ($order_success) {
            $shippingAddress = session('shippingAddress');
            $paymentDetails = session('paymentDetails');
            $paymentMethod = $this->getPaymentMethod();
            $vat = $this->getVatAmount(session("order_total_cost"));
            $order = session('order');
            $order_items = OrderItem::where('order_id', $order->id)->get();
            $xml_order_item_rows = "";
            foreach ($order_items as $key => $order_item) {
                $volume = $order_item->height * $order_item->width * $order_item->length;
                $xml_order_item_rows .= "<Row>";
                $xml_order_item_rows .= "<Code>" . $order_item->id . "</Code>";
                $xml_order_item_rows .= "<Description>" . $order_item->description . "</Description>";
                $xml_order_item_rows .= "<Qty>1</Qty>";
                $xml_order_item_rows .= "<Um></Um>";
                $xml_order_item_rows .= "<Price>" . $order_item->price . "</Price>";
                $xml_order_item_rows .= "<Discounts></Discounts>";
                $xml_order_item_rows .= "<VatCode>" . $order['sender_vat_no'] . "</VatCode>";
                $xml_order_item_rows .= "<VatDescription>" . $this->getRateFromVolume($volume)->vat . "%</VatDescription>";
                $xml_order_item_rows .= "</Row>";
            }

            if (isset($shippingAddress["isInvoice"]) && $shippingAddress["isInvoice"] == "1") {
                $isInvoice = "true";
            } else {
                $isInvoice = "false";
            }

            $xmlstring = '<Fattura24>';
            $xmlstring .= '<Document>';
            $xmlstring .= '<DocumentType>I</DocumentType>';
            $xmlstring .= '<CustomerName>' . $shippingAddress["sender_first_name"] . ' ' . $shippingAddress["sender_surname"] . '</CustomerName>';
            $xmlstring .= '<CustomerAddress>' . $shippingAddress["sender_address_1"] . '</CustomerAddress>';
            $xmlstring .= '<CustomerPostcode>' . $shippingAddress["sender_post_code"] . '</CustomerPostcode>';
            $xmlstring .= '<CustomerCity>' . $shippingAddress["sender_city"] . '</CustomerCity>';
            $xmlstring .= '<CustomerProvince>' . $shippingAddress["sender_province"] . '</CustomerProvince>';
            $xmlstring .= '<CustomerCountry>' . $shippingAddress["sender_country"] . '</CustomerCountry>';
            $xmlstring .= '<CustomerFiscalCode>MARROS66C44G217W</CustomerFiscalCode>';
            $xmlstring .= '<CustomerVatCode>' . $shippingAddress["sender_vat_no"] . '</CustomerVatCode>';
            $xmlstring .= '<CustomerCellPhone>' . $shippingAddress["sender_phone"] . '</CustomerCellPhone>';
            $xmlstring .= '<CustomerEmail>' . $shippingAddress["sender_email"] . '</CustomerEmail>';
            $xmlstring .= '<DeliveryName>' . $shippingAddress["recipient_first_name"] . ' ' . $shippingAddress["recipient_surname"] . '</DeliveryName>';
            $xmlstring .= '<DeliveryAddress>' . $shippingAddress["recipient_address_1"] . '</DeliveryAddress>';
            $xmlstring .= '<DeliveryPostcode>' . $shippingAddress["recipient_post_code"] . '</DeliveryPostcode>';
            $xmlstring .= '<DeliveryCity>' . $shippingAddress["recipient_city"] . '</DeliveryCity>';
            $xmlstring .= '<DeliveryProvince>' . $shippingAddress["recipient_province"] . '</DeliveryProvince>';
            $xmlstring .= '<DeliveryCountry>' . $shippingAddress["recipient_country"] . '</DeliveryCountry>';
            $xmlstring .= '<Object></Object>';
            $xmlstring .= '<TotalWithoutTax>' . session("order_total_cost") . '</TotalWithoutTax>';
            $xmlstring .= '<PaymentMethodName>' . $paymentMethod->method_name . '</PaymentMethodName>';
            $xmlstring .= '<PaymentMethodDescription>' . $paymentMethod->description . '</PaymentMethodDescription>';
            $xmlstring .= '<VatAmount>' . $vat . '</VatAmount>';
            $xmlstring .= '<Total>' . ((double)session("order_total_cost") + $vat) . '</Total>';
            $xmlstring .= '<FootNotes>' . $paymentDetails["possible_notes"] . '</FootNotes>';
            $xmlstring .= '<SendEmail>' . $isInvoice . '</SendEmail>';
            $xmlstring .= '<UpdateStorage>1</UpdateStorage>';
            $xmlstring .= '<F24InvoiceId>12345</F24InvoiceId>';
            $xmlstring .= '<IdTemplate>123</IdTemplate>';
            $xmlstring .= '<CustomField1></CustomField1>';
            $xmlstring .= '<CustomField2></CustomField2>';
            $xmlstring .= '<Payments>';
            $xmlstring .= ' <Payment>';
            $xmlstring .= '    <Date> ' . Carbon::now()->format("Y-m-d") . '</Date>';
            $xmlstring .= '    <Amount> ' . ((double)session("order_total_cost") + $vat) . '</Amount>';
            $xmlstring .= '    <Paid> true</Paid>';
            $xmlstring .= '  </Payment>';
            $xmlstring .= '</Payments>';
            $xmlstring .= '<Rows>' . $xml_order_item_rows . '</Rows>';
            $xmlstring .= '</Document>';
            $xmlstring .= '</Fattura24>';

//            return $xmlstring;

            $xw = xmlwriter_open_memory();
            xmlwriter_start_document($xw, '1.0', 'UTF-8');
            xmlwriter_text($xw, $xmlstring);

            $xml = xmlwriter_output_memory($xw);

            // Make the http call to fattura24 api
            $xml_res = $this->createDocument('creates', $xml);

            /* LEGGO I DATI RICEVUTI DA FATTURA24 */
            $xml = simplexml_load_string($xml_res);

            $invoice = new Invoice();
            $invoice->returnCode = $xml->returnCode;
            $invoice->description = $xml->description;
            $invoice->docId = $xml->docId;
            $invoice->docNumber = $xml->docNumber;
            $invoice->order_id = $order->id;
            $invoice->save();
        }

        return redirect(route('order-confirm.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        // Get the model
        $invoice = Invoice::find($invoice->id);

        return view('admin . invoice . invoice - show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        // Get the model
        Invoice::destroy($invoice->id);

        return redirect()->back()->with('success', 'Invoice deleted successfully . ');
    }

    /**
     * Make the http call to fattura24 api.
     *
     * @return \Illuminate\Http\Response
     */
    private function createDocument($action, $xml)
    {
        $efatt_api_key = env('FATTURA24_API_KEY');

        switch ($action) {
            // Create map with request parameters
            case 'test':
                $action = '/TestKey';
                $params = array('apiKey' => $efatt_api_key);
                break;
            case 'creates':
                $action = '/SaveDocument';
                $params = array('apiKey' => $efatt_api_key, 'xml' => $xml);
                break;
        }


        $api_url = 'https://www.app.fattura24.com/api/v0.3';

        // Build Http query using params
        $query = http_build_query($params);

        // Create Http context details
        $contextData = array(
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
                "Connection: close\r\n" .
                "Content-Length: " . strlen($query) . "\r\n",
            'content' => $query);

        // Create context resource for our request
        $context = stream_context_create(array('http' => $contextData));

        // Read page rendered as result of your POST request
        $result = file_get_contents(
            $api_url . $action,  // page url
            false,
            $context);


        // Server response is now stored in $result variable so you can process it
        $result = html_entity_decode($result);
        return $result;
    }

    private function getVatAmount($total_cost = 0)
    {
        $locations = session('locations');
        $rate = Rate::where('distance_from', '<=', $locations['distance'])
            ->where('distance_to', '>=', $locations['distance'])
            ->where('volume', '>=', $locations['size'])->first();
        if ($rate) {
            if ($rate->vat != 0) {
                $total_cost += $total_cost * $rate->vat / 100;
            }
        }
        return $total_cost;
    }

    private function getPaymentMethod()
    {
        $payment_method = array(
            'method_name' => "Stripe",
            "description" => "IBAN: IT02L1234512345123456789012",
        );
        $payment_method = collect([(object)$payment_method]);
        return $payment_method[0];
    }

    private function getRateFromVolume($volume = 0)
    {
        $locations = session('locations');
        return Rate::where('distance_from', '<=', $locations['distance'])
            ->where('distance_to', '>=', $locations['distance'])
            ->where('volume', '>=', $volume)->first();
    }
}
