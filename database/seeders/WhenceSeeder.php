<?php

namespace Database\Seeders;

use App\Models\Whence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[] = ['name' => 'z reklamy w internecie'];
        $data[] = ['name' => 'z reklamy w sklepie'];
        $data[] = ['name' => 'od sprzedawcy'];
        $data[] = ['name' => 'od rodziny/znajomych'];
        $data[] = ['name' => 'inne'];

        Whence::insert($data);
    }
}
