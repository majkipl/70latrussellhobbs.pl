<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $jsonPath = resource_path('json/products.json');
        $jsonData = File::get($jsonPath);

        $dataJson = json_decode($jsonData, true);

        foreach ($dataJson as $code => $item) {
            $data[] = ['name' => $item['title'], 'code' => $code, 'collection_id' => Collection::where('name', $item['collection'])->first()->id];
        }

        Product::insert($data);
    }
}
