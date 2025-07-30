<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Client::withCount('projects')->orderBy('name');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('phone', 'like', '%' . $search . '%');
            });
        }

        $clients = $query->paginate(15);

        return view('clients.index', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $client = Client::create($validated);

        // Handle AJAX request
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Klien berhasil ditambahkan.',
                'client' => $client
            ]);
        }

        return redirect()->route('clients.index')->with('success', 'Klien berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $client->load('projects');
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $client->update($validated);

        // Handle AJAX request
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Klien berhasil diperbarui.',
                'client' => $client
            ]);
        }

        return redirect()->route('clients.index')->with('success', 'Klien berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Klien berhasil dihapus.');
    }
}
