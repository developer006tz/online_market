<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Conversation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConversationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conversation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => \App\Models\Post::factory(),
            'seller_id' => \App\Models\User::factory(),
            'customer_id' => \App\Models\User::factory(),
        ];
    }
}
