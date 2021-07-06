<?php

namespace Database\Seeders;

use Exception;
use App\Models\{
    User, Product
};

use Illuminate\Database\Seeder;

class UsersWithProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        User::factory()->count(10)->create()->each(function ($user) {
            $products = Product::factory()->count(random_int(200000, 500000))->make([
                'user_id' => $user->id,
            ]);

            $products->chunk(50000)->each(function ($chunk) {
                Product::insert($chunk->toArray());
            });
        });
    }
}
