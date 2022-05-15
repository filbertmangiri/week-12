<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    private static $booksCount = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => 'Buku Ke-' . ++self::$booksCount,
            'slug' => 'buku-ke-' . self::$booksCount,
            'category_id' => mt_rand(1, Category::count()),
            'author' => $this->faker->name(),
            'publisher' => 'PT. Gramedia',
            'synopsis' => $this->faker->words(mt_rand(20, 30), true),
        ];
    }
}
