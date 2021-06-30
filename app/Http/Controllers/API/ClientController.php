<?php

namespace App\Http\Controllers\API;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:clients.index')->only(['index', 'show']);
        $this->middleware('permission:clients.store')->only('store');
        $this->middleware('permission:clients.update')->only('update');
        $this->middleware('permission:clients.destroy')->only('destroy');
    }

    public function index()
    {
        return Client::all();
    }

    public function store(ClientRequest $request)
    {
        $client = Client::create($request->all());

        return $client;
    }

    public function show(Client $client)
    {
        return $client;
    }

    public function update(ClientRequest $request, Client $client)
    {
        $client = $client->fill($request->all());
        $client->save();

        return $client;
    }

    public function destroy(Client $client)
    {
        return $client->delete();
    }
}
