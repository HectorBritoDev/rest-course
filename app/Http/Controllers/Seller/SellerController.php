<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Seller;

class SellerController extends ApiController
{

    public function index()
    {
        $vendedores = Seller::has('products')->get();
        return $this->showAll($vendedores);

    }
    public function show(Seller $seller)
    {
        return $this->showOne($seller);
    }

}
