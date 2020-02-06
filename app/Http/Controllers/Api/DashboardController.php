<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'email' => $request->user()->email,
            'name' => $request->user()->name
        ], 200);
    }
}
