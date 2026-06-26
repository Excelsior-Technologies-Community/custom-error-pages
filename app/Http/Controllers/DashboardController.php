<?php

namespace App\Http\Controllers;

use App\Models\ErrorVisit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request)
    {

        $query = ErrorVisit::query();

        // Search filter
        if ($request->search) {

            $query->where(function ($q) use ($request) {

                $q->where('error_code', 'like', '%' . $request->search . '%')
                    ->orWhere('url', 'like', '%' . $request->search . '%')
                    ->orWhere('message', 'like', '%' . $request->search . '%')
                    ->orWhereDate('created_at', $request->search);

            });

        }

        // Error code filter
        if ($request->error) {

            $query->where(
                'error_code',
                $request->error
            );

        }

        $visits = $query
            ->orderBy('id', 'asc')
            ->paginate(5)
            ->withQueryString();

        return view('dashboard', [

            'visits' => $visits,

            'totalErrors' => ErrorVisit::count(),

            'total404' => ErrorVisit::where('error_code',404)->count(),

            'total403' => ErrorVisit::where('error_code',403)->count(),

            'total500' => ErrorVisit::where('error_code',500)->count(),

        ]);

    }

    public function show($id)
    {
        $error = ErrorVisit::findOrFail($id);

        return view(
            'error-details',
            compact('error')
        );
    }

}