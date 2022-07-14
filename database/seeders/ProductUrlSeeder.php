<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\Product;
use App\Models\ProductUrl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductUrlSeeder extends Seeder
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
            foreach($item['urls'] as $index => $url) {
                $data[] = ['url' => $url, 'product_id' => Product::where('code', $code)->first()->id];
            }
        }

        ProductUrl::insert($data);
    }
}
