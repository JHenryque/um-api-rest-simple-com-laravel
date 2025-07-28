<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function status()
    {
        return response()->json([
            'status' => 'OK',
            'message' => 'Api is running OK!',
        ],200);
    }

    public function clients()
    {
       $clients = Client::all();
        return response()->json([
            'status' => 'OK',
            'message' => 'success',
            'data' => $clients
        ],200);
    }
}
