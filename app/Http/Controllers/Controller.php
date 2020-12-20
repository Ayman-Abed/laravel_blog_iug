<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $validationRules = [];

    protected $validationMessages = [];




    // For Upplode Images
    protected function uploadImage($file, $path = '')
    {
        $fileName = $file->getClientOriginalName();
        $file_exe = $file->getClientOriginalExtension();
        $new_name = uniqid() . '.' . $file_exe;
        $directory = 'uploads' . '/' . $path; //.'/'.date("Y").'/'.date("m").'/'.date("d");
        $destienation = public_path($directory);
        $file->move($destienation, $new_name);
        return  $directory . '/' . $new_name;
    }


    // Hleper Function For Api
    protected function sendResponse($result, $message = 'success', $code = 200)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
            'status' => $code,
        ];
        return response()->json($response, 200);
    }

    protected function sendError($error, $code = 422, $errorMessages = [])
    {
        $response = [
            'success' => false,
            'message' => $error,
            'status' => $code,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
