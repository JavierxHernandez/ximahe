<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $filepath = storage_path('companies');

        // if(!File::exists($filepath)){
        //     File::makeDirectory($filepath);
        // }

        return [
            'name' => $this->faker->name(),
            'image' => 'images/default-placeholder.png',
            'description' => $this->faker->paragraph()
        ];
    }
}
