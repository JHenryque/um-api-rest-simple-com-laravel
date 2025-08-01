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
        if (!$request->id) {
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

    public function addClient(Request $request)
    {
        // create a new client
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->save();

        return response()->json([
            'status' => 'OK',
            'message' => 'success',
            'data' => $client
        ],200);
    }

    public function updateClient(Request $request)
    {
        //  check if id is provided
        if (!$request->id) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Client Id is invalid',
            ],400);
        }

        // update client
        $client = Client::find($request->id);
        $client->name = $request->name;
        $client->email = $request->email;
        $client->save();

        return response()->json([
            'status' => 'OK',
            'message' => 'success',
            'data' => $client
        ],200);
    }

    public function deleteClient($id)
    {
        $client = Client::find($id);
        $client->delete();

        return response()->json([
            'status' => 'OK',
            'message' => 'success',
        ],200);
    }
}
