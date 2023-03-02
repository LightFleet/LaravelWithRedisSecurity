<?php

namespace App\Modules\TestModule\Infrastructure\Sms\Factories;

use App\Modules\TestModule\Domain\Models\Sms;
use Illuminate\Database\Eloquent\Factories\Factory;

class SmsFactory extends Factory
{
    protected $model = Sms::class;

    public function definition()
    {
        return [
            'text' => $this->faker->realText(400)
        ];
    }
}
