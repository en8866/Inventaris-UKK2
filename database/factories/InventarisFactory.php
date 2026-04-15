<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Inventaris;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventaris>
 */
class InventarisFactory extends Factory
{
    protected $model = Inventaris::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'kode_inventaris' => 'INV-' . str_pad($this->faker->unique()->numberBetween(1, 9999), 4, '0', STR_PAD_LEFT),
            'deskripsi' => $this->faker->sentence(),
            'jumlah' => $this->faker->numberBetween(1, 50),
            'lokasi' => $this->faker->city(),
            'kondisi' => $this->faker->randomElement(['baik', 'rusak', 'hilang']),
            'tanggal_masuk' => $this->faker->date(),
            'harga' => $this->faker->numberBetween(100000, 10000000),
        ];
    }
}
