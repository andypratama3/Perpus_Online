<?php

// database/factories/JurnalFactory.php

namespace Database\Factories;

use App\Models\Jurnal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JurnalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jurnal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'jurnal' => 'path/to/your/jurnal/file.pdf', // Example path to a PDF file
            'user_add' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'slug' => $this->faker->unique()->slug,
            
        ];
    }
}
