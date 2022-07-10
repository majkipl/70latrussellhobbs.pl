<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $data[] = ['name' => 'AGDPERFEKT.PL'];
        $data[] = ['name' => 'AL.TO'];
        $data[] = ['name' => 'AVANS'];
        $data[] = ['name' => 'DLADOMUDLACIEBIE.PL'];
        $data[] = ['name' => 'ELECTRO '];
        $data[] = ['name' => 'EMPIK'];
        $data[] = ['name' => 'GARNECZKI.PL'];
        $data[] = ['name' => 'KAKTO.PL'];
        $data[] = ['name' => 'KAREN'];
        $data[] = ['name' => 'KOMPUTRONIK '];
        $data[] = ['name' => 'LECLERC '];
        $data[] = ['name' => 'MAMBONUS.PL'];
        $data[] = ['name' => 'MAXELEKTRO'];
        $data[] = ['name' => 'MAXKUCHNIE.PL'];
        $data[] = ['name' => 'MEDIA EXPERT'];
        $data[] = ['name' => 'MEDIA MARKT '];
        $data[] = ['name' => 'MEDIADOMEK.PL'];
        $data[] = ['name' => 'MORELE.NET'];
        $data[] = ['name' => 'MYCENTER.PL'];
        $data[] = ['name' => 'NEO24 '];
        $data[] = ['name' => 'NEONET '];
        $data[] = ['name' => 'OLEOLE! '];
        $data[] = ['name' => 'PEPCO'];
        $data[] = ['name' => 'PROGRAM LOJALNOŚCIOWY ENEA'];
        $data[] = ['name' => 'PROGRAM LOJALNOŚCIOWY ENERGA'];
        $data[] = ['name' => 'PROGRAM LOJALNOŚCIOWY PAYBACK'];
        $data[] = ['name' => 'RTV EURO AGD'];
        $data[] = ['name' => 'ZADOWOLENIE.PL'];


        Shop::insert($data);
    }
}
