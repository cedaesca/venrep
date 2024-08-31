<?php

namespace Database\Factories;

use App\Models\Reputation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reputation>
 */
class ReputationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->pickOne(Reputation::TYPES['positive'], Reputation::TYPES['negative']),
            'given_by' => User::factory(),
            'given_to' => User::factory(),
            'recommends_zelle' => $this->pickOne(true, false),
            'recommends_binance' => $this->pickOne(true, false),
            'recommends_ves' => $this->pickOne(true, false),
            'recommends_cash' => $this->pickOne(true, false),
            'recommends_paypal' => $this->pickOne(true, false),
            'recommends_others' => $this->pickOne(true, false),
        ];
    }

    private function pickOne($option1, $option2)
    {
        $randomInt = random_int(0, 1);

        if ($randomInt) {
            return $option1;
        }

        return $option2;
    }
}
