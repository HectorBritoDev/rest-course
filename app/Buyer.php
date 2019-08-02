<?php

namespace App;

use App\Scopes\BuyerScope;
use App\User;

class Buyer extends User
{
    protected static function boot()
    {
        //Boot del modelo base o padre, necesario para el funcionamiento original de Laravel
        parent::boot();

        //Se utiliza "static" porque estamos en un metodo estatico y queremos hacer referencia a un metodo propio de la clase
        static::addGlobalScope(new BuyerScope);
    }
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
