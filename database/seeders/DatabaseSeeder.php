<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Application;
use App\Models\Collection;
use App\Models\Product;
use App\Models\ProductUrl;
use Database\Factories\ApplicationFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
                UserSeeder::class,
                ShopSeeder::class,
                TypeShopSeeder::class,
                WhenceSeeder::class,
                CollectionSeeder::class,
                ProductSeeder::class,
                ProductUrlSeeder::class,
                ApplicationSeeder::class,
            ]
        );
    }
}
