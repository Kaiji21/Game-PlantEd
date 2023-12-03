<?php

namespace App\Http\Traits;

trait GeneralTrait
{

    public function getCurrentLang()
    {
        return app()->getLocale();
    }

    public function returnError($error_number, $message)
    {
        return response()->json([
            'status' => false,
            'error_number' => $error_number,
            'message' => $message
        ]);
    }


    public function returnSuccessMessage($message = "", $error_number = "S000")
    {
        return [
            'status' => true,
            'error_number' => $error_number,
            'message' => $message
        ];
    }

    public function returnData($key, $value, $message = "")
    {
        return response()->json([
            'status' => true,
            'error_number' => "S000",
            'message' => $message,
            $key => $value
        ]);
    }
}
