<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ErrorVisit;

class TestErrorController extends Controller
{
    private function logError($code)
    {
        ErrorVisit::create([
            'error_code' => $code,
            'url' => request()->fullUrl()
        ]);
    }

    public function test404()
    {
        $this->logError(404);
        abort(404);
    }

    public function test500()
    {
        $this->logError(500);
        abort(500);
    }

    public function test403()
    {
        $this->logError(403);
        abort(403);
    }

    public function testJson404(Request $request)
    {
        $this->logError(404);

        if ($request->expectsJson()) {
            abort(404);
        }

        abort(404);
    }

    public function testJson500(Request $request)
    {
        $this->logError(500);

        if ($request->expectsJson()) {
            abort(500);
        }

        abort(500);
    }
}