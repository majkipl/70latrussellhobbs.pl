<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Product;
use App\Models\Shop;
use App\Models\TypeShop;
use App\Models\Whence;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{

    protected $model = Application::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $shop_id = Shop::select('id')->inRandomOrder()->pluck('id')->first();
        $product_1_id = Product::select('id')->inRandomOrder()->pluck('id')->first();
        $product_2_id = Product::select('id')->inRandomOrder()->pluck('id')->first();
        $whence_id = Whence::select('id')->inRandomOrder()->pluck('id')->first();
        $type_shop_id = TypeShop::select('id')->inRandomOrder()->pluck('id')->first();

        return [
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'address' => fake()->streetAddress,
            'address_nb' => fake()->buildingNumber(),
            'city' => fake()->city(),
            'zip' => fake()->numberBetween(10,99) . '-' . fake()->numberBetween(100,999),
            'email' => fake()->unique()->safeEmail(),
            'phone' => '+48' . fake()->numberBetween('123456789', '999999999'),
            'img_receipt' => fake()->md5() . '.jpg',
            'img_ean_1' => fake()->md5() . '.jpg',
            'is_product_2' => fake()->boolean,
            'img_ean_2' => fake()->md5() . '.jpg',
            'where_other' => fake()->words(3, true),
            'legal_1' => true,
            'legal_2' => true,
            'legal_3' => fake()->boolean,
            'legal_4' => fake()->boolean,
            'shop_id' => $shop_id,
            'product_1_id' => $product_1_id,
            'product_2_id' => $product_2_id,
            'whence_id' => $whence_id,
            'type_shop_id' => $type_shop_id,
        ];
    }
}
