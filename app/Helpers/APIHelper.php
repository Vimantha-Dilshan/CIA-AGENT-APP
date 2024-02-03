<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/**
 * Class APIHelper
 * @package App\Helpers
 */
class APIHelper{

    const HTTP_CODE_SUCCESS          = 200;
    const HTTP_NO_DATA_FOUND         = 204;
    const HTTP_CODE_BAD_REQUEST      = 400;
    const HTTP_CODE_UNAUTHERIZED     = 401;
    const HTTP_CODE_BAD_AUTH_REQUEST = 403;
    const HTTP_CODE_NOT_FOUND        = 404;
    const INVALID_DATA               = 422;
    const HTTP_CODE_SERVER_ERROR     = 500;
    const FUNCTIONAL_ERROR_COMDE     = 501;
    const PERMISSION_ERROR           = 502;

    /**
     * Make API Response
     *
     * @param string $message
     * @param int $responseCode
     * @param string $process
     * @param array $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function makeAPIresponse(
        $message,
        $responseCode,
        $process,
        $data,
        Request $request=null
    ){

        $status = ($responseCode == APIHelper::HTTP_CODE_SUCCESS) ? true : false;

        $data = [
            "success"     => $status,
            "status_code" => $responseCode,
            "message"     => $message,
            "process"     => $process,
            "data"        => $data,
        ];

        if(!$status){
            APIHelper::generateErrorLogs($message, $process);
        }
        return response()->json($data, $responseCode);
    }

    /**
     * Generate Error Logs in XMLs
     * NOTE: File storage -> storage/logs/errors
     *
     * @param string $error
     * @param string $processName
     */
    public static function generateErrorLogs($error, $processName)
    {
        $logDirectory = storage_path('logs/errors');
        $fileName = Carbon::now()->format('Y-m-d') . '.xml';
        $filePath = $logDirectory . '/' . $fileName;

        $xml = '';

        if (File::exists($filePath)) {
            $xml .= File::get($filePath);
            $xml .= "\n";
        } else {
            $xml .= "<?xml version='1.0' encoding='UTF-8'?>\n";
            $xml .= "<errors>\n";
        }

        $xml .= "\t<error>\n";
        $xml .= "\t\t<datetime>" . Carbon::now()->toDateTimeString() . "</datetime>\n";
        $xml .= "\t\t<process>" . $processName . "</process>\n";
        $xml .= "\t\t<log>" . $error . "</log>\n";
        $xml .= "\t</error>\n";
        $xml .= "</errors>\n";

        File::put($filePath, $xml);
    }
}
