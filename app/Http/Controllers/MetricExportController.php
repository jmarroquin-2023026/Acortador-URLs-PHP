<?php

namespace App\Http\Controllers;

use App\Exports\MetricsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MetricExportController extends Controller
{
    public function export(Request $request, $urlId)
    {
        $request->validate([
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
        ]);

        $filename = "metrics_{$request->from}_{$request->to}.xlsx";

        return Excel::download(
            new MetricsExport($urlId, $request->from, $request->to),
            $filename
        );
    }
}
