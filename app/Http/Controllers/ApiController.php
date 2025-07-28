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
       $clients = Client::paginate(10);
        return response()->json([
            'status' => 'OK',
            'message' => 'success',
            'data' => $clients
        ],200);
    }

    public function clientById($id)
    {
        $client = Client::find($id);
        return response()->json([
            'status' => 'OK',
            'message' => 'success',
            'data' => $client
        ],200);
    }

    public function client(Request $request)
    {
        // ckeck if id is provided
        if ($request->id) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Client Id is invalid',
            ],400);
        }

        $client = Client::find($request->id);
        return response()->json([
            'status' => 'OK',
            'message' => 'success',
            'data' => $client
        ],200);
    }
}
