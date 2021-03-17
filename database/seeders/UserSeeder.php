<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'name' => 'Paraguay',
            'code' => 'PY',
            'avaible' => 'yes'
        ]);

        DB::table('cities')->insert([
            'name' => 'Encarnación',
            'code' => 'ENCAR',
            'country_id' => 1,
            'avaible' => 'yes'
        ]);
        DB::table('cities')->insert([
            'name' => 'Cambyretá',
            'code' => 'CAMBY',
            'country_id' => 1,
            'avaible' => 'yes'
        ]);

        DB::table('zones')->insert([
            'name' => 'Centro',
            'code' => 'ENCAR_CENTRO',
            'city_id' => 1,
            'avaible' => 'yes'
        ]);

        DB::table('zones')->insert([
            'name' => 'San Miguel',
            'code' => 'CAMBY_SANMIGUEL',
            'city_id' => 2,
            'avaible' => 'yes'
        ]);

        DB::table('users')->insert([
            'name' => 'Adrian Grahl',
            'city_id' => 2,
            'zone' => 1,
            'role' => 'client',
            'email' => 'grahlmaciel@gmail.com',
            'password' => Hash::make("masterkey"),
        ]);
        

        DB::table('companies')->insert([
            'user_id' => 0,
            'name' => 'Valmar Sushi',
            'cellphone' => '0971200673',
            'email' => 'valmarsushi@gmail.com',
            'city_id' => 1,
            'defcity_id' => 1,
            'country_id' => 1,
            'zone_id' => 1,
            'status' => 'opened',
            'bookings' => 'yes',
        ]);
        DB::table('companies')->insert([
            'user_id' => 0,
            'name' => 'Carnicería Puchi',
            'cellphone' => '0985459879',
            'email' => 'puchicambyreta@gmail.com',
            'city_id' => 2,
            'country_id' => 1,
            'zone_id' => 2,
            'status' => 'closed',
            'bookings' => 'yes',
        ]);

        DB::table('company_photos')->insert(
            [
            'company_id' => 1,
            'name' => 'Imagen',
            'path' => '1.png',
            'type' => 'history',
            ]
        );
        DB::table('company_photos')->insert(
            [
            'company_id' => 1,
            'name' => 'Imagen',
            'path' => '2.png',
            'type' => 'history',
            ]
        );
        
        DB::table('company_photos')->insert(
            [
            'company_id' => 1,
            'name' => 'Imagen',
            'path' => '3.png',
            'type' => 'history',
            ]
        );    
        DB::table('categories')->insert(
            [
                'name' => 'Sushi',
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => 'Pizza',
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => 'Pastas',
            ]
        ); 
        
        //Productos
        DB::table('products')->insert(
            [
                'company_id' => 1,
                'category_id' => 1,
                'name' => 'Suspiro Roll',
                'description' => 'Un manjar entre manjares. Aqui puedes degustar una mezcla de esto y de aquello logrando asi una satisfacción instantánea.',
                'price' => 30000,
                'discount' => 0,
                'deleted' => 0,
                'active' => 1,
                'stock' => -1,
            ]
        );  
        DB::table('products')->insert(
            [
                'company_id' => 1,
                'category_id' => 1,
                'name' => 'Hot Dragon',
                'description' => 'Un manjar entre manjares. Aqui puedes degustar una mezcla de esto y de aquello logrando asi una satisfacción instantánea.',
                'price' => 30000,
                'discount' => 0,
                'deleted' => 0,
                'active' => 1,
                'stock' => -1,
            ]
        );  
        DB::table('products')->insert(
            [
                'company_id' => 1,
                'category_id' => 1,
                'name' => 'California',
                'description' => 'Un manjar entre manjares. Aqui puedes degustar una mezcla de esto y de aquello logrando asi una satisfacción instantánea.',
                'price' => 30000,
                'discount' => 0,
                'deleted' => 0,
                'active' => 1,
                'stock' => -1,
            ]
        );  

        
        DB::table('productsphotos')->insert([
            'product_id' => 1,
            'name' => 'Suspiro Roll',
            'path' => 'assets/restaurants/1/products/1/img.jpg',
            'type' => 'main'
        ]);
        
        DB::table('productsphotos')->insert([
            'product_id' => 2,
            'name' => 'Hot Dragon',
            'path' => 'assets/restaurants/1/products/2/img.jpg',
            'type' => 'main'
        ]);
        DB::table('productsphotos')->insert([
            'product_id' => 3,
            'name' => 'California',
            'path' => 'assets/restaurants/1/products/3/img.jpg',
            'type' => 'main'
        ]);

        

    }
}
