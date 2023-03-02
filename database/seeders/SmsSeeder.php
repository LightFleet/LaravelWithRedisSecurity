<?php

namespace Database\Seeders;

use App\Models\User;
use App\Modules\TestModule\Domain\Models\Sms;
use App\Modules\TestModule\Infrastructure\Sms\Factories\SmsFactory;
use Illuminate\Database\Seeder;

class SmsSeeder extends Seeder
{
    public function run()
    {
        Sms::newFactory()
            ->count(50)
            ->create();
    }
}
