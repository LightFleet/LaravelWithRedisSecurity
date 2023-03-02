<?php

namespace App\Modules\TestModule\Domain\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MatchMessagesToUsersCommand extends Command
{
    protected $signature = 'matcher:run';
    protected $description = 'Matches users with messages';

    public function handle()
    {
        dd(User::all());
    }
}
