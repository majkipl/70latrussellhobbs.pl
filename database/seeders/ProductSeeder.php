<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        $data[] = ['name' => '26050-70 Honeycomb Kettle White'];
        $data[] = ['name' => '26051-70 Honeycomb Kettle Black'];
        $data[] = ['name' => '26053-70 Honeycomb Kettle Grey'];
        $data[] = ['name' => '26080-70 Classic Glass Kettle'];
        $data[] = ['name' => '26380-70 Groove Kettle Black'];
        $data[] = ['name' => '26381-70 Groove Kettle White'];
        $data[] = ['name' => '26382-70 Groove Kettle Grey'];
        $data[] = ['name' => '24360-70 Inspire Kettle - White'];
        $data[] = ['name' => '24361-70 Inspire Kettle - Black'];
        $data[] = ['name' => '28130-70 Stylevia Kettle St Steel'];
        $data[] = ['name' => '26300-70 Quiet Kettle'];
        $data[] = ['name' => '28080-70 Structure Kettle White'];
        $data[] = ['name' => '28081-70 Structure Kettle Black'];
        $data[] = ['name' => '26140-70 Matte Black Kettle'];
        $data[] = ['name' => '21600-57 Glass Kettle'];
        $data[] = ['name' => '20760-57 Clarity (Brita) Glass Kettle'];
        $data[] = ['name' => '25240-70 Geo Steel Kettle'];
        $data[] = ['name' => '26960-70 Luna Stone Kettle '];
        $data[] = ['name' => '26200-70 Attentiv Kettle'];
        $data[] = ['name' => '23830-70 Elegance Glass Kettle'];
        $data[] = ['name' => '26420-70 Distinctions Kettle Black'];
        $data[] = ['name' => '26421-70 Distinctions Kettle Ocean'];
        $data[] = ['name' => '26422-70 Distinctions Kettle Titanium'];
        $data[] = ['name' => '22591-70 Textures Plus+ Kettle - Black'];
        $data[] = ['name' => '22850-70 Purity Kettle  Black'];
        $data[] = ['name' => '26060-56 Honeycomb 2S Toaster White'];
        $data[] = ['name' => '26061-56 Honeycomb 2S Toaster Black'];
        $data[] = ['name' => '26390-56 Groove 2S Toaster Black'];
        $data[] = ['name' => '26391-56 Groove 2S Toaster White'];
        $data[] = ['name' => '26392-56 Groove 2S Toaster Grey'];
        $data[] = ['name' => '24370-56 Inspire Toaster - White'];
        $data[] = ['name' => '24371-56 Inspire Toaster - Black'];
        $data[] = ['name' => '28090-56 Structure 2 Slice Toaster White '];
        $data[] = ['name' => '28091-56 Structure 2 Slice Toaster Black'];
        $data[] = ['name' => '26150-56 Matte Black 2 Slice Toaster'];
        $data[] = ['name' => '26970-56 Luna Stone 2SL Toaster '];
        $data[] = ['name' => '25250-56 Geo Steel 2S Toaster'];
        $data[] = ['name' => '26210-56 Attentiv 2S Toaster'];
        $data[] = ['name' => '23380-56 Elegance Glass Toaster'];
        $data[] = ['name' => '26430-56 Distinctions 2S Toaster Black'];
        $data[] = ['name' => '26431-56 Distinctions 2S Toaster Ocean'];
        $data[] = ['name' => '26432-56 Distinctions 2S Toaster Titanium'];
        $data[] = ['name' => '22601-56 Textures Plus+ 2 slice toaster - Black'];
        $data[] = ['name' => '27010-56 Honeycomb Coffee Maker White'];
        $data[] = ['name' => '27011-56 Honeycomb Coffee Maker Black'];
        $data[] = ['name' => '24390-56 Inspire Coffee Maker - White'];
        $data[] = ['name' => '26160-56 Matte Black Coffee Maker'];
        $data[] = ['name' => '25270-56 Geo Steel Coffee Maker'];
        $data[] = ['name' => '26990-56 Luna Stone Coffee Maker '];
        $data[] = ['name' => '23370-56 Elegance Glass Coffee Maker'];
        $data[] = ['name' => '26230-56 Attentiv Coffee Bar'];
        $data[] = ['name' => '26450-56 Distinctions Espresso Machine Black'];
        $data[] = ['name' => '26451-56 Distinctions Espresso Machine Ocean'];
        $data[] = ['name' => '26452-56 Distinctions Espresso Machine Titanium'];
        $data[] = ['name' => '22620-56 Textures Plus+ Coffee Maker - Black'];
        $data[] = ['name' => '25610-56 Grind & Brew '];
        $data[] = ['name' => '25620-56 Grind & Brew Thermal Carafe'];
        $data[] = ['name' => '28270-56 Good-to-go Multicooker'];
        $data[] = ['name' => '26500-56 Satisfry Air Small 1.8L Air Fryer'];
        $data[] = ['name' => '26510-56 Satisfry Air Large 5L Air Fryer'];
        $data[] = ['name' => '26520-56 Satisfry Air & Grill Multicooker'];
        $data[] = ['name' => '28241-56 Sensigence Intelligent Blender'];
        $data[] = ['name' => '24672-56 Matte Black Hand Mixer'];
        $data[] = ['name' => '24702-56 Matte Black 3in1 Hand Blender'];
        $data[] = ['name' => '23120-56 Coffee Grinder'];
        $data[] = ['name' => '23460-56 Salt & Pepper grinders'];
        $data[] = ['name' => '28010-56 Black Salt & Pepper Grinders'];
        $data[] = ['name' => '17888-56 Cook@Home 3-in-1 Panini Maker'];
        $data[] = ['name' => '24530-56 Cook@Home Deep Fill Sandwich Maker'];
        $data[] = ['name' => '24540-56 Fiesta 3in1 Deep Fill Sandwich/ Waffle/ Grill'];
        $data[] = ['name' => '25890-56 Swirl Hand Mixer Onyx'];
        $data[] = ['name' => '25891-56 Swirl Hand Mixer Turquoise'];
        $data[] = ['name' => '25892-56 Swirl Hand Mixer Smoky Quartz'];
        $data[] = ['name' => '25893-56 Swirl Hand Mixer Sapphire'];
        $data[] = ['name' => '19750-56 Cook@Home Rice Cooker'];
        $data[] = ['name' => '22760-56 Classics Citrus Press'];
        $data[] = ['name' => '25160-56 Explore Mix & Go Cool'];
        $data[] = ['name' => '25592-56 Steam Genie Essentials'];
        $data[] = ['name' => '23975-56 Copper Express Iron'];
        $data[] = ['name' => '23986-56 Copper Express Pro Iron'];
        $data[] = ['name' => '25600-56 Steam Genie Handheld Steamer'];
        $data[] = ['name' => '27220-56 Steam Genie Handheld Steamer'];
        $data[] = ['name' => '28040-56 Steam Genie Aroma Handheld Steamer'];
        $data[] = ['name' => '25400-56 Colour Control Supreme Iron'];
        $data[] = ['name' => '25090-56 One Temperature Iron'];
        $data[] = ['name' => '27000-56 Diamond Elite Iron'];
        $data[] = ['name' => '26340-56 Powersteam Ultra Coconut Smooth iron '];
        $data[] = ['name' => '28370-56 Steam Genie 2in1'];
        $data[] = ['name' => '20630-56 Power Steam Ultra'];
        $data[] = ['name' => '24460-56 Quiet Super Steam Pro Generator'];
        $data[] = ['name' => '23971-56 Supreme Steam Pro'];

        Product::insert($data);
    }
}
