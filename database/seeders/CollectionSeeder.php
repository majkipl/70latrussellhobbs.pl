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

        $data[] = ['name' => 'Nowości', 'slug' => 'nowosci'];
        $data[] = ['name' => 'Produkty śniadaniowe', 'slug' => 'produkty-sniadaniowe'];
        $data[] = ['name' => 'Produkty do gotowania', 'slug' => 'produkty-do-gotowania'];
        $data[] = ['name' => 'Prasowanie', 'slug' => 'prasowanie'];

        Collection::insert($data);
    }
}
