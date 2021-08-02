<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                    'name' => $this->faker->name(),
                    'share_user_id' => $this->faker->userName(),
                    'name_kanji1' => $this->faker->lastName(),
                    'name_kanji2' => $this->faker->firstName(),
                    'name_kana1' => $this->faker->lastKanaName(),
                    'name_kana2' => $this->faker->firstKanaName(),
                    'birth_day' => $this->faker->dateTimeBetween('-80 years', '-20years')->format('Ymd'),
                    'age' => 24,
                    'sex' => $this->faker->randomElement(['男性','女性']),
                    'area_country' => $this->faker->country(),
                    'prefecture_name' =>$this->faker->prefecture(),
                    'tel' => $this->faker->phoneNumber(),
                    'email' => $this->faker->unique()->safeEmail(),
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
