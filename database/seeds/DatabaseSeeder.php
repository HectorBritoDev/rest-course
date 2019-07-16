<?php

use App\Category;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();

        $cantidadUsuarios = 200;
        $cantidadCategorias = 30;
        $cantidadProductos = 1000;
        $cantidadTransacciones = 1000;
        // $this->call(UsersTableSeeder::class);

        factory(User::class, $cantidadUsuarios)->create();
        factory(Category::class, $cantidadUsuarios)->create();
        factory(Product::class, $cantidadTransacciones)->create()->each(
            function (Product $producto) {
                $categorias = Category::all()->random(mt_rand(1, 5))->pluck('id'); //El pluck es para indicarle a la coleccion que solo queremos el id
                $producto->categories()->attach($categorias);
            }
        );

        factory(Transaction::class, $cantidadUsuarios)->create();
    }
}
