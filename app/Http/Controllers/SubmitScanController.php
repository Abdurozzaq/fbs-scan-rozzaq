<?php

namespace App\Http\Controllers;

use App\Models\ScannedCode;
use Illuminate\Http\Request;

class SubmitScanController extends Controller
{
    public function insert(Request $request)
    {
        $data = $request->input('scan_result');

        $scanExisted = ScannedCode::where('code', $data)->exists();
        if ($scanExisted) {
            // Sudah ada di database return error exist
            return response()->json([
                'success' => false,
                'message' => 'Failed to save data to database! Maybe Code already used.'
            ]);
        } else {
            // Insert data into 'scanned_codes' table
            $scannedData = new ScannedCode();
            $scannedData->code = $data;
            $scannedData->save();

            return response()->json([
                'success' => true,
                'message' => 'Success to save data to database!'
            ]);
        }
    }
}
