<?php

namespace App\Http\Controllers;

use App\Models\Capster;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CapsterController extends Controller
{
    public function index()
{
    $capsters = Capster::all();
    return view('capsters.index', compact('capsters'));
}

public function create()
{
    return view('capsters.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'instagram' => 'required|string|max:255',
        'photo' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('photo')) {
        $validated['photo'] = $request->file('photo')->store('capsters', 'public');
    }

    Capster::create($validated);
    return redirect()->route('capsters.index')->with('success', 'Capster berhasil ditambahkan.');
}

public function edit(Capster $capster)
{
    return view('capsters.edit', compact('capster'));
}

public function update(Request $request, Capster $capster)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'instagram' => 'required|string|max:255',
        'photo' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('photo')) {
        $validated['photo'] = $request->file('photo')->store('capsters', 'public');
    }

    $capster->update($validated);
    return redirect()->route('capsters.index')->with('success', 'Capster berhasil diperbarui.');
}

public function destroy(Capster $capster)
{
    $capster->delete();
    return redirect()->route('capsters.index')->with('success', 'Capster berhasil dihapus.');
}
}
