<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('client.index',compact('clients'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'child_first_name' => 'required|string|regex:/^[A-Za-z\s]+$/',
            'child_middle_name' => 'nullable|string|regex:/^[A-Za-z\s]*$/',
            'child_last_name' => 'required|string|regex:/^[A-Za-z\s]+$/',
            'child_age' => 'required|integer',
            'gender' => 'required|in:male,female,other',
            'different_address' => 'boolean',
            'child_address' => 'nullable|string|regex:/^[A-Za-z0-9\s]+$/',
            'child_city' => 'nullable|string|regex:/^[A-Za-z\s]+$/',
            'child_state' => 'nullable|string|regex:/^[A-Za-z\s]+$/',
            'country' => 'nullable|string',
            'child_zip_code' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $clients = new client();
        $clients->child_first_name = $request->input('child_first_name');
        $clients->child_middle_name = $request->input('child_middle_name');
        $clients->child_last_name = $request->input('child_last_name');
        $clients->child_age = $request->input('child_age');
        $clients->gender = $request->input('gender');
        $clients->different_address = $request->input('different_address', false);
        $clients->child_address = $request->input('child_address');
        $clients->child_city = $request->input('child_city');
        $clients->child_state = $request->input('child_state');
        $clients->country = $request->input('country');
        $clients->child_zip_code = $request->input('child_zip_code');
        $clients->save();

        return redirect()->route('client.create')
            ->with('success', ' information saved successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client $client)
    {
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'child_first_name' => 'required|string|regex:/^[A-Za-z\s]+$/',
            'child_middle_name' => 'nullable|string|regex:/^[A-Za-z\s]*$/',
            'child_last_name' => 'required|string|regex:/^[A-Za-z\s]+$/',
            'child_age' => 'required|integer',
            'gender' => 'required|in:male,female,other',
            'different_address' => 'boolean',
            'child_address' => 'nullable|string|regex:/^[A-Za-z0-9\s]+$/',
            'child_city' => 'nullable|string|regex:/^[A-Za-z\s]+$/',
            'child_state' => 'nullable|string|regex:/^[A-Za-z\s]+$/',
            'country' => 'nullable|string',
            'child_zip_code' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $client = Client::find($id);

        if (!$client) {
            return redirect()->route('client.index')
                ->with('error', 'Client not found.');
        }

        $client->update([
            'child_first_name' => $request->input('child_first_name'),
            'child_middle_name' => $request->input('child_middle_name'),
            'child_last_name' => $request->input('child_last_name'),
            'child_age' => $request->input('child_age'),
            'gender' => $request->input('gender'),
            'different_address' => $request->input('different_address', false),
            'child_address' => $request->input('child_address'),
            'child_city' => $request->input('child_city'),
            'child_state' => $request->input('child_state'),
            'country' => $request->input('country'),
            'child_zip_code' => $request->input('child_zip_code'),
        ]);

        return redirect()->route('client.index')
            ->with('success', 'Information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client=Client::find($id);
        $client->delete();
        return redirect()->route('client.index');
    }
}
