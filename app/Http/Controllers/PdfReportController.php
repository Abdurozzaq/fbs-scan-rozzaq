<?php

namespace App\Http\Controllers;

use App\Models\ScannedCode;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfReportController extends Controller
{
    public function generatePDF(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $data = ScannedCode::whereBetween('created_at', [$startDate, $endDate])->get();

        $pdf = PDF::loadView('export-pdf-template', ['data' => $data, 'endDate' => $endDate, 'startDate' => $startDate]);
        return $pdf->download('exported-data.pdf');
    }
}
