<?php

namespace App\Providers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 自定义 json 响应格式
        Response::macro('formatJson', function ($success, $data, $message, $status = 200) {
            return new JsonResponse([
                'success' => $success,
                'data'    => $data,
                'message' => $message,
                'status'  => $status,
            ], $status);
        });
    }
}
