<?php

namespace App\Http\Controllers;

use App\Models\ScannedCode;
use Illuminate\Http\Request;

class ListDataController extends Controller
{
    public function getListData(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $data = ScannedCode::whereBetween('created_at', [$startDate, $endDate])->get();

        return view('get-list-data-table', ['data' => $data]);
    }
}
