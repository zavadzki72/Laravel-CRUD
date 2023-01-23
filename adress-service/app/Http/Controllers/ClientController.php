<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index')->with('clients', $clients);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $client = new Client();

        $client->cpf = $request->input('cpf');
        $client->name = $request->input('name');
        $client->phone = $request->input('phone');
        $client->email = $request->input('email');

        $client->save();

        $clients = Client::all();
        return view('clients.index')->with('clients', $clients)->with('msg', 'Cliente cadastrado com sucesso!');      
    }

    public function show($cpf)
    {
        $client = Client::where('cpf', '=', $cpf)->firstOrFail();

        if ($client) {
            return view('clients.show')->with('client', $client);
        } else {
            return view('clients.show')->with('msg', 'Cliente não encontrado!');
        }
    }

    public function edit($cpf)
    {
        $client = Client::where('cpf', '=', $cpf)->firstOrFail();

        if ($client) {
            return view('clients.edit')->with('client', $client);
        } else {
            $clients = Client::all();            
            return view('clients.index')->with('clients', $clients)->with('msg', 'Cliente não encontrado!');
        }
    }

    public function update(Request $request, $cpf)
    {
        $client = Client::where('cpf', '=', $cpf)->firstOrFail();

        $client->cpf = $request->input('cpf');
        $client->name = $request->input('name');
        $client->phone = $request->input('phone');
        $client->email = $request->input('email');

        $client->save();

        $clients = Client::all();
        return view('clients.index')->with('clients', $clients)->with('msg', 'Cliente atualizado com sucesso!');
    }

    public function destroy($cpf)
    {
        $client = Client::where('cpf', '=', $cpf)->firstOrFail();

        $client->delete();

        $clients = Client::all();
        return view('clients.index')->with('clients', $clients)->with('msg', "Cliente excluído com sucesso!");
    }
}
