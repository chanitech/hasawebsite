<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductImage;
use App\Models\Product;

class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;

    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id ?? Product::factory(),
            'image_path' => 'products/' . $this->faker->image('public/storage/products', 640, 480, null, false),
        ];
    }
}
