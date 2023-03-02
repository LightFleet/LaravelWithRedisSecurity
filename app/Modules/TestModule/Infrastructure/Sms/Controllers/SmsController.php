<?php

namespace App\Modules\TestModule\Infrastructure\Sms\Controllers;

use App\Models\User;
use App\Modules\Messaging\Infrastructure\RabbitMqService;
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
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class SmsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(public SmsService $smsService, public RabbitMqService $rabbitMqService)
    {
    }

    public function showSomething(Request $request)
    {
        if (!empty($_COOKIE['name'])) {
            $name = $_COOKIE['name'];
            Auth::attempt($name);
        }

//        $this->rabbitMqService->publish('hello', 'Hello World!');
//
//        $this->rabbitMqService->consume('hello', function ($mgs) {
//            dd($mgs);
//        });

//        $connection = new AMQPStreamConnection('localhost', 80, 'guest', 'guest');
//        $channel = $connection->channel();
//        $channel->queue_declare('hello', false, false, false, false);
//
//        $msg = new AMQPMessage('asdasd');
//        $channel->basic_publish($msg, '', 'hello');
//        $channel->close();
//        $connection->close();

//        dd(1);

//        return [];
        return view('sms.list');
    }
}
