<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\Adress;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('adress')->where('is_active', '=', true)->get();
        return view('clients.index')->with('clients', $clients);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $cpf = $request->input('cpf');
        $client = Client::with('adress')->where('cpf', '=', $cpf)->first();

        if ($client) {
            $this->updateClient($request, $cpf);
            return redirect('clients')->with('msg', 'Cliente cadastrado com sucesso!')->with('isError', false);    
        }

        $client = new Client();
        $client->insert([
            'cpf' => $cpf,
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ]);

        $adress = new Adress();
        $adress->insert([
            'street' => $request->input('street'),
            'neighborhood' => $request->input('neighborhood'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'number' => $request->input('number'),
            'cep' => $request->input('cep'),
            'client_cpf' => $cpf,
        ]);

        return redirect('clients')->with('msg', 'Cliente cadastrado com sucesso!')->with('isError', false);
    }

    public function show($cpf)
    {
        $client = Client::with('adress')->where('cpf', '=', $cpf)->first();

        if ($client) {
            return view('clients.show')->with('client', $client);
        } else {
            return redirect('clients')->with('msg', 'Cliente não encontrado!')->with('isError', true);
        }
    }

    public function edit($cpf)
    {
        $client = Client::with('adress')->where('cpf', '=', $cpf)->first();

        if ($client) {
            return view('clients.edit')->with('client', $client);
        } else {
            return redirect('clients')->with('msg', 'Cliente não encontrado!')->with('isError', true);
        }
    }

    public function update(Request $request, $cpf)
    {
        $this->updateClient($request, $cpf);
        return redirect('clients')->with('msg', 'Cliente atualizado com sucesso!')->with('isError', false);
    }

    private function updateClient(Request $request, $cpf)
    {
        Client::with('adress')
            ->where('cpf', '=', $cpf)
            ->update([
                'cpf' => $request->input('cpf'),
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'is_active' => true,
                'inactive_at' => null
            ]);

        $client = Client::with('adress')->where('cpf', '=', $cpf)->first();

        if($client->adress == null){
            $adress = new Adress();
            $adress->client_cpf = $client->cpf;
        }else{
            $adress = $client->adress;
        }

        $adress->street = $request->input('street');
        $adress->neighborhood = $request->input('neighborhood');
        $adress->city = $request->input('city');
        $adress->state = $request->input('state');
        $adress->country = $request->input('country');
        $adress->number = $request->input('number');
        $adress->cep = $request->input('cep');

        $adress->save();
    }

    public function destroy($cpf)
    {
        Client::where('cpf', '=', $cpf)
            ->update([
                'is_active' => false,
                'inactive_at' => Carbon::now()
            ]);

        return redirect('clients')->with('msg', 'Cliente excluído com sucesso!')->with('isError', false);
    }
}
