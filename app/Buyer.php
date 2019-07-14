<?php

namespace App;

use App\User;

class Buyer extends User
{
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
