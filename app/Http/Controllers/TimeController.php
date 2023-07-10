<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function trackTime(Request $request)
    {
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');

        // Calculate the duration, update the database, or perform any other required actions

        return response()->json(['message' => 'Time tracked successfully']);
    }

}
