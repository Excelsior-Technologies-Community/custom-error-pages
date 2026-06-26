<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ErrorVisit;

class TestErrorController extends Controller
{
    private function logError($code, $message)
    {
        ErrorVisit::create([

            'error_code' => $code,

            'url' => request()->fullUrl(),

            'ip_address' => request()->ip(),

            'user_agent' => request()->userAgent(),

            'message' => $message

        ]);
    }

    public function test404()
    {
        $this->logError(
            404,
            'Page not found'
        );

        abort(404);
    }

    public function test500()
    {
        $this->logError(
            500,
            'Internal server error'
        );

        abort(500);
    }

    public function test403()
    {
        $this->logError(
            403,
            'Forbidden access'
        );

        abort(403);
    }

    public function testJson404(Request $request)
    {
        $this->logError(
            404,
            'JSON page not found'
        );

        if ($request->expectsJson()) {

            abort(404);

        }

        abort(404);
    }

    public function testJson500(Request $request)
    {
        $this->logError(
            500,
            'JSON server error'
        );

        if ($request->expectsJson()) {

            abort(500);

        }

        abort(500);
    }
}