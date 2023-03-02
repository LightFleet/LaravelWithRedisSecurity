<?php

namespace App\Modules\TestModule\Infrastructure\Sms\Controllers\Api;

use App\Models\User;
use App\Modules\Security\Infrastructure\RedisUserProvider;
use App\Modules\TestModule\Application\Service\SmsService;
use App\Modules\TestModule\Domain\Models\Sms;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class SmsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function list()
    {
        return Sms::all()->take(1);
    }
}
