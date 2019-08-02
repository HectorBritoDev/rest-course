<?php

namespace App;

use App\Scopes\SellerScope;
use App\User;

class Seller extends User
{
    protected static function boot()
    {
        //Boot del modelo base o padre, necesario para el funcionamiento original de Laravel
        parent::boot();

        //Se utiliza "static" porque estamos en un metodo estatico y queremos hacer referencia a un metodo propio de la clase
        static::addGlobalScope(new SellerScope);
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
