<?php

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



if (!function_exists('generate_otp')) {
    /**
     * Generate random OTP
     *
     * @param int $length
     *
     * @return string
     */
    function generate_otp(int $length = 6)
    {
        $pool = '0123456789';

        do {
            $code = substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
        } while (strlen((string)((int)$code)) < $length);

        return $code;
    }
}

if (!function_exists('success')) {
    /**
     * Return successful response from the application.
     *
     * @param string $message
     * @param null $object
     * @param int $status
     *
     * @return JsonResponse
     */
    function success(string $message = '', $object = null, int $status = 200)
    {
        return response()->json(['success' => true, 'message' => $message, 'data' => $object], $status);
    }
}

if (!function_exists('failed')) {
    /**
     * Return failed response from the application.
     *
     * @param string $message
     * @param int $status
     *
     * @return JsonResponse
     */
    function failed(string $message = '', int $status = 500)
    {
        return response()->json(['success' => false, 'message' => $message, 'statusCode' => $status], $status);
    }
}
