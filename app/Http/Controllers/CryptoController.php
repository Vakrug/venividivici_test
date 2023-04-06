<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function response;

class CryptoController extends Controller
{
    public function btcusd(Request $request)
    {
        $apiResponse = Http::withOptions(['verify' => false])->get('https://api.bitaps.com/market/v1/tickers/btcusd'); //TODO move to config
        
        return response()->json($apiResponse->json());
    }
    
    public function ltcusd(Request $request)
    {
        $apiResponse = Http::withOptions(['verify' => false])->get('https://api.bitaps.com/market/v1/tickers/ltcusd'); //TODO move to config
        
        return response()->json($apiResponse->json());
    }
}
