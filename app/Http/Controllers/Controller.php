<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function success($result, $statusCode = 200, $statusValue = 'OK') {
        $response = [
            'success' => true,
            'data' => $result,
            'statusCode' => $statusCode,
            'statusValue' => $statusValue,
            'executeDate' => Carbon::now()->toDateTimeLocalString()
        ];

        return response()->json($response);
    }

    protected function error($result, $statusCode = 500, $statusValue = 'ERROR') {
        $response = [
            'success' => false,
            'data' => $result,
            'statusCode' => $statusCode,
            'statusValue' => $statusValue,
            'executeDate' => Carbon::now()->toDateTimeLocalString()
        ];

        return response()->json($response);
    }

}
