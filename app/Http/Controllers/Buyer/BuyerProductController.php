<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;

class BuyerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        //El parentesis a la hora de llamar una relación es invocar el Query Builder
        $products = $buyer->transactions()->with('product')
            ->get()
        //Pluck nos muestra solo los productos sin la transacción
            ->pluck('product');

        //dd($products);
        return $this->showAll($products);
    }
}
