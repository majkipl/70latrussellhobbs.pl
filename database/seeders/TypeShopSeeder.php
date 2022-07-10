<?php

namespace Database\Seeders;

use App\Models\TypeShop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $data[] = ['name' => 'stacjonarny'];
        $data[] = ['name' => 'on-line'];

        TypeShop::insert($data);
    }
}
