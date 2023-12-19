<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * 启动一个应用的服务
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('api', function ($msg = '', $code = 200, $data = '')
        {
            $retData = [
                'msg' => $msg,
                'code' => $code,                                
                'time' => time(),
                'data' => $data,
            ];
            return response()->json($retData);
        });
    }
}


