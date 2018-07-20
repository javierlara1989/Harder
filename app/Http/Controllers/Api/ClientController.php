<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use App\Client;
use App\ClientType;


class ClientController extends Controller
{
    public function createUpdateClient(Request $request) {
        $rules = ($request->client_id)? Client::$edition_rules: Client::$creation_rules;
        $validator = Validator::make($request->all(), $rules); 
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $client = Client::updateOrCreate([
            'id' => $request->client_id
        ], [
            'name' => $request->name,
            'social_security_number' => $request->social_security_number,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'client_type_id' => $request->client_type_id
        ]);
        return response()->json(['success' => $client], 200);
    }

    public function getActives() {
        $clients = Client::Actives()->get();
        return response()->json(['success' => $clients], 200);
    }

    public function getAll() {
        $clients = Client::all();
        return response()->json(['success' => $clients], 200);
    }

    public function deactivate(Request $request) {
        $client = Client::find($request->client_id);
        $client->activated = 0;
        return response()->json(['success' => $client], 200);
    }

    public function activate(Request $request) {
        $client = Client::find($request->client_id);
        $client->activated = 1;
        return response()->json(['success' => $client], 200);
    }

    public function getTypes() {
        $types = ClientType::all();
        return response()->json(['success' => $types], 200);
    }
}

