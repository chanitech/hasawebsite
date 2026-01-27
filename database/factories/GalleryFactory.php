<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Gallery;

class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'image_path' => 'gallery/' . $this->faker->image('public/storage/gallery', 640, 480, null, false),
        ];
    }
}
