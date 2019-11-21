<?php

namespace App\Http\Controllers\FrontEndCon;

use App\Http\Controllers\Controller;
use App\Invoice;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UserInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with('order')->get();
        return view('User.profile.pages.fatture', compact('invoices'));
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
        $client = new Client();
        $url = "https://www.app.fattura24.com/api/v0.3/GetFile";

        $form_params = array(
            'apiKey' => env('FATTURA24_API_KEY'),
            'docId' => $request->docId,
        );
        $resource = fopen(storage_path("app/invoices/$request->docId.pdf"), 'w');
        $stream = Psr7\stream_for($resource);
        $response = $client->post($url, ['form_params' => $form_params, 'save_to' => $stream]);
//        $response = $client->post($url, ['form_params' => $form_params]);
//        dd($response);
//        dd(explode("\"",$response->getHeaderLine('content-Disposition'))[1]);
//        dd($response->getHeaderLine('Content-Type'));
//        return response()->download($response->getBody()['uri']);
        return response()->download(storage_path("app/invoices/$request->docId.pdf"));
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
