<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create(['name' => 'Егор Ремизов', 'email' => 'test@example.com',]);

        User::factory(10)->create();

        DB::table('suppliers')->insert([['id' => 1, 'name' => 'ООО Колбасики'], ['id' => 2, 'name' => 'ООО Помидорчики'], ['id' => 3, 'name' => 'ООО Молочка'], ['id' => 4, 'name' => 'ООО Напитки'], ['id' => 5, 'name' => 'ООО ОвощБаза'], ['id' => 6, 'name' => 'ООО Ферма+'], ['id' => 7, 'name' => 'ООО ИмпортФуд'], ['id' => 8, 'name' => 'ООО РыбаОпт'], ['id' => 9, 'name' => 'ООО Хлебокомбинат'], ['id' => 10, 'name' => 'ООО FreshMarket'], ['id' => 11, 'name' => 'ООО GreenLine'], ['id' => 12, 'name' => 'ООО AgroTrade'],]);

        DB::table('products')->insert([['id' => 1, 'name' => 'Томаты', 'unit' => 'kg', 'type' => 'ingredient', 'quantity' => 50, 'created_at' => now(), 'updated_at' => now()], ['id' => 2, 'name' => 'Сыр Чеддер', 'unit' => 'kg', 'type' => 'ingredient', 'quantity' => 20, 'created_at' => now(), 'updated_at' => now()], ['id' => 3, 'name' => 'Кола', 'unit' => 'liter', 'type' => 'finished', 'quantity' => 100, 'created_at' => now(), 'updated_at' => now()], ['id' => 4, 'name' => 'Булочка', 'unit' => 'piece', 'type' => 'ingredient', 'quantity' => 200, 'created_at' => now(), 'updated_at' => now()], ['id' => 5, 'name' => 'Курица', 'unit' => 'kg', 'type' => 'ingredient', 'quantity' => 35, 'created_at' => now(), 'updated_at' => now()], ['id' => 6, 'name' => 'Салат', 'unit' => 'kg', 'type' => 'ingredient', 'quantity' => 15, 'created_at' => now(), 'updated_at' => now()], ['id' => 7, 'name' => 'Картофель', 'unit' => 'kg', 'type' => 'ingredient', 'quantity' => 80, 'created_at' => now(), 'updated_at' => now()], ['id' => 8, 'name' => 'Молоко', 'unit' => 'liter', 'type' => 'ingredient', 'quantity' => 60, 'created_at' => now(), 'updated_at' => now()], ['id' => 9, 'name' => 'Пиво', 'unit' => 'liter', 'type' => 'finished', 'quantity' => 120, 'created_at' => now(), 'updated_at' => now()], ['id' => 10, 'name' => 'Говядина', 'unit' => 'kg', 'type' => 'ingredient', 'quantity' => 25, 'created_at' => now(), 'updated_at' => now()], ['id' => 11, 'name' => 'Лук', 'unit' => 'kg', 'type' => 'ingredient', 'quantity' => 40, 'created_at' => now(), 'updated_at' => now()], ['id' => 12, 'name' => 'Соус BBQ', 'unit' => 'liter', 'type' => 'ingredient', 'quantity' => 18, 'created_at' => now(), 'updated_at' => now()],]);

        DB::table('supplies')->insert([['id' => 1, 'supplier_id' => 1, 'user_id' => 1, 'status' => 'completed', 'created_at' => Carbon::now()->subDays(12), 'updated_at' => Carbon::now()->subDays(12)], ['id' => 2, 'supplier_id' => 2, 'user_id' => 1, 'status' => 'completed', 'created_at' => Carbon::now()->subDays(11), 'updated_at' => Carbon::now()->subDays(11)], ['id' => 3, 'supplier_id' => 3, 'user_id' => 2, 'status' => 'draft', 'created_at' => Carbon::now()->subDays(10), 'updated_at' => Carbon::now()->subDays(9)], ['id' => 4, 'supplier_id' => 4, 'user_id' => 1, 'status' => 'canceled', 'created_at' => Carbon::now()->subDays(9), 'updated_at' => Carbon::now()->subDays(8)], ['id' => 5, 'supplier_id' => 5, 'user_id' => 2, 'status' => 'completed', 'created_at' => Carbon::now()->subDays(8), 'updated_at' => Carbon::now()->subDays(8)], ['id' => 6, 'supplier_id' => 6, 'user_id' => 1, 'status' => 'canceled', 'created_at' => Carbon::now()->subDays(7), 'updated_at' => Carbon::now()->subDays(6)], ['id' => 7, 'supplier_id' => 7, 'user_id' => 2, 'status' => 'completed', 'created_at' => Carbon::now()->subDays(6), 'updated_at' => Carbon::now()->subDays(6)], ['id' => 8, 'supplier_id' => 8, 'user_id' => 1, 'status' => 'draft', 'created_at' => Carbon::now()->subDays(5), 'updated_at' => Carbon::now()->subDays(4)], ['id' => 9, 'supplier_id' => 9, 'user_id' => 2, 'status' => 'completed', 'created_at' => Carbon::now()->subDays(4), 'updated_at' => Carbon::now()->subDays(4)], ['id' => 10, 'supplier_id' => 10, 'user_id' => 1, 'status' => 'completed', 'created_at' => Carbon::now()->subDays(3), 'updated_at' => Carbon::now()->subDays(3)], ['id' => 11, 'supplier_id' => 11, 'user_id' => 2, 'status' => 'draft', 'created_at' => Carbon::now()->subDays(2), 'updated_at' => Carbon::now()->subDays(1)], ['id' => 12, 'supplier_id' => 12, 'user_id' => 1, 'status' => 'completed', 'created_at' => Carbon::now()->subDay(), 'updated_at' => Carbon::now()->subDay()],]);

        DB::table('supply_products')->insert([['id' => 1, 'supply_id' => 1, 'product_id' => 1, 'quantity' => 10, 'price' => 500,], ['id' => 2, 'supply_id' => 1, 'product_id' => 2, 'quantity' => 5, 'price' => 800,], ['id' => 3, 'supply_id' => 2, 'product_id' => 3, 'quantity' => 20, 'price' => 1200,], ['id' => 4, 'supply_id' => 2, 'product_id' => 4, 'quantity' => 50, 'price' => 700,], ['id' => 5, 'supply_id' => 3, 'product_id' => 5, 'quantity' => 15, 'price' => 900,], ['id' => 6, 'supply_id' => 4, 'product_id' => 6, 'quantity' => 8, 'price' => 300,], ['id' => 7, 'supply_id' => 5, 'product_id' => 7, 'quantity' => 25, 'price' => 1100,], ['id' => 8, 'supply_id' => 6, 'product_id' => 8, 'quantity' => 30, 'price' => 950,], ['id' => 9, 'supply_id' => 7, 'product_id' => 9, 'quantity' => 40, 'price' => 2000,], ['id' => 10, 'supply_id' => 8, 'product_id' => 10, 'quantity' => 12, 'price' => 1300,], ['id' => 11, 'supply_id' => 9, 'product_id' => 11, 'quantity' => 18, 'price' => 600,], ['id' => 12, 'supply_id' => 10, 'product_id' => 12, 'quantity' => 10, 'price' => 750,], ['id' => 13, 'supply_id' => 11, 'product_id' => 1, 'quantity' => 14, 'price' => 650,], ['id' => 14, 'supply_id' => 12, 'product_id' => 2, 'quantity' => 6, 'price' => 900,],]);
    }
}
