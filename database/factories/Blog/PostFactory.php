<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => [
                'en' => fake('en_US')->sentence(),
                'es' => fake('es_ES')->sentence()
            ],
            'slug' => fake('en_US')->unique()->slug(12),
            'short_description' => [
                'en' => fake('en_US')->text(),
                'es' => fake('es_ES')->text()
            ],
            'image' => str(fake()->image('storage/app/public/posts', 1024, 512))->afterLast('public/'),
            'author' => fake()->name(),
            'published_at' => fake()->dateTimeBetween('-2 week', '-1 week'),
            'expired_at' => fake()->dateTimeBetween('-1 week', '+1 week'),
            'is_active' => fake()->boolean()
        ];
    }

    /**
     * active posts
     * 
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function active(): Factory
    {
        return $this->state(function(array $attributes): array {
            return [
                'is_active' => true,
                'published_at' => fake()->dateTimeBetween('-2 week'),
                'expired_at' => fake()->randomElement([null, fake()->dateTimeBetween('+1 week', '+4 week')]),
            ];
        });
    }

    /**
     * inactive posts
     * 
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function inactive(): Factory
    {
        return $this->state(function(array $attributes): array {
            return [
                'is_active' => $isActive = fake()->boolean(),
                'published_at' => fake()->dateTimeBetween('-2 week'),
                'expired_at' => $isActive ? fake()->dateTimeBetween('-2 week', 'now') : fake()->dateTimeBetween('-1 week', '+1 week'),
            ];
        });
    }
}
