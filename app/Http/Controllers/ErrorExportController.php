<?php

namespace App\Http\Controllers;

use App\Models\ErrorVisit;
use Illuminate\Http\Response;

class ErrorExportController extends Controller
{
    public function export()
    {
        $errors = ErrorVisit::orderBy('id', 'asc')->get();

        $filename = "error_logs_" . date('Y-m-d_H-i-s') . ".csv";


        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate",
            "Expires" => "0"
        ];


        $callback = function () use ($errors) {

            $file = fopen('php://output', 'w');


            fputcsv($file, [
                'ID',
                'Error Code',
                'URL',
                'IP Address',
                'User Agent',
                'Message',
                'Date'
            ]);


            foreach ($errors as $error) {

                fputcsv($file, [

                    $error->id,
                    $error->error_code,
                    $error->url,
                    $error->ip_address,
                    $error->user_agent,
                    $error->message,
                    $error->created_at

                ]);
            }


            fclose($file);
        };


        return response()->stream($callback, 200, $headers);
    }
}
