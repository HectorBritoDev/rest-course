<?php

namespace App\Transformers;

use App\Seller;
use League\Fractal\TransformerAbstract;

class SellerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Seller $seller)
    {
        return [
            'identificador' => (int) $seller->id,
            'nombre' => (string) $seller->name,
            'correo' => (string) $seller->email,
            'esVerificado' => (int) $seller->verified,
            'fechaCreacion' => (string) $seller->created_at,
            'fechaActualizacion' => (string) $seller->updated_at,
            'fechaEliminacion' => isset($seller->deleted_at) ? (string) $seller->deleted_at : null,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('sellers.show', $seller->id),
                ],
                [
                    'rel' => 'seller.category',
                    'href' => route('sellers.categories.index', $seller->id),
                ],
                [
                    'rel' => 'seller.product',
                    'href' => route('sellers.products.index', $seller->id),
                ],
                [
                    'rel' => 'seller.seller',
                    'href' => route('sellers.sellers.index', $seller->id),
                ],
                [
                    'rel' => 'seller.transaction',
                    'href' => route('sellers.transactions.index', $seller->id),
                ],
                [
                    'rel' => 'user',
                    'href' => route('users.show', $seller->id),
                ],
            ],

        ];
    }

    public static function originalAttributes($index)
    {
        $attributes = [
            'identificador' => 'id',
            'nombre' => 'name',
            'correo' => 'email',
            'esVerificado' => 'verified',
            'fechaCreacion' => 'created_at',
            'fechaActualizacion' => 'updated_at',
            'fechaEliminacion' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
    public static function transformedAttributes($index)
    {
        $attributes = [
            'id' => 'identificador',
            'name' => 'nombre',
            'email' => 'correo',
            'verified' => 'esVerificado',
            'created_at' => 'fechaCreacion',
            'updated_at' => 'fechaActualizacion',
            'deleted_at' => 'fechaEliminacion',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

}
