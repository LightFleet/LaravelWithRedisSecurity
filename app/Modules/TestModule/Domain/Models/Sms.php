<?php

namespace App\Modules\TestModule\Domain\Models;

use App\Models\User;
use App\Modules\TestModule\Infrastructure\Sms\Factories\SmsFactory;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    use HasTimestamps;

    protected $fillable = [
        '*'
    ];

    private string $text;

    public static function newFactory(): SmsFactory
    {
        return SmsFactory::new();
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
