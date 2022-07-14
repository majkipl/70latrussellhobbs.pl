<?php

namespace Database\Seeders;

use App\Models\Collection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $data[] = ['name' => 'news'];
        $data[] = ['name' => 'breakfast'];
        $data[] = ['name' => 'cooking'];
        $data[] = ['name' => 'ironing'];

        Collection::insert($data);
    }
}
