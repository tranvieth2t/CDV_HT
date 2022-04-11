<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait Logging
{
    public function writeExceptionLog($action, \Exception $e)
    {
        $params = [
            'Error' => $e->getMessage(),
            'Line'  => $e->getLine(),
            'File'  => $e->getFile(),
        ];
        Log::channel('errorlog')->info($action, $params);
    }
}
