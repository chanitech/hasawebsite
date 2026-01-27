<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SiteContent;

class SiteContentFactory extends Factory
{
    protected $model = SiteContent::class;

    public function definition()
    {
        return [
            'section_name' => $this->faker->unique()->word(),
            'content' => $this->faker->paragraph(5),
        ];
    }
}
