<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\Controller;

class BuyerController extends Controller
{

    public function index()
    {
        $compradores = Buyer::has('transactions')->get();
        return response()->json(['data' => $compradores], 200);
    }
    public function show($id)
    {
        $comprador = Buyer::has('transactions')->findOrFail($id);
        return response()->json(['data' => $comprador], 200);

    }

}
