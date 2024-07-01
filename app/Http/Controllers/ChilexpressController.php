<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChilexpressController extends Controller
{
    public function getRates(Request $request)
    {
        $url = "https://testservices.wschilexpress.com/rating/api/v1.0/rates/courier";

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Cache-Control' => 'no-cache',
            'Ocp-Apim-Subscription-Key' => 'c17619e460b847429e8e7d031828c053',
        ])->post($url, [
            "originCountyCode" => $request->input('originCountyCode', 'STGO'),
            "destinationCountyCode" => $request->input('destinationCountyCode', 'PROV'),
            "package" => [
                "weight" => $request->input('weight', '16'),
                "height" => $request->input('height', '1'),
                "width" => $request->input('width', '1'),
                "length" => $request->input('length', '1')
            ],
            "productType" => $request->input('productType', 3),
            "contentType" => $request->input('contentType', 1),
            "declaredWorth" => $request->input('declaredWorth', '2333'),
            "deliveryTime" => $request->input('deliveryTime', 0)
        ]);

        $data = $response->json();

        return view('rates', ['data' => $data]);
    }
}