<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;

class BuyerProductController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }
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

        return $this->showAll($products);
    }
}
