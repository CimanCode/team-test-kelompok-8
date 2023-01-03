<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aspirasi>
 */
class AspirasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'topik' => $this->faker->sentence(mt_rand(5, 8)),
            'jenis_laporan' => mt_rand(1, 2),
            'alamat' => $this->faker->address(),
            'kecamatan' => $this->faker->citySuffix(),
            'kabupaten' => $this->faker->city(),
            'cerita' => $this->faker->paragraph(mt_rand(10, 30)),
            'foto' => 'img/Aspirasi/error.PNG',
            'status' => mt_rand(0, 1)
        ];
    }
}
