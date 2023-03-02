<?php

namespace App\Modules\TestModule\Application\Service;

use Illuminate\Http\Request;

class SmsService
{
    private array $filters;

    public function __construct(
        public Request $request,
        public $timezone,
        int ...$filters
    )
    {
        $this->filters = $filters;
    }

    public function dumpRequest()
    {
        return $this->filters;
    }
}
