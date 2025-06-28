<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $contacts = Contact::all();
    return view('contacts.index', compact('contacts'));
}

public function create()
{
    return view('contacts.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'maps' => 'required',
        'whatsapp' => 'required',
        'instagram' => 'required',
        'tiktok' => 'required',
    ]);

    Contact::create($validated);
    return redirect()->route('contacts.index')->with('success', 'Kontak berhasil ditambahkan.');
}

public function edit(Contact $contact)
{
    return view('contacts.edit', compact('contact'));
}

public function update(Request $request, Contact $contact)
{
    $validated = $request->validate([
        'maps' => 'required',
        'whatsapp' => 'required',
        'instagram' => 'required',
        'tiktok' => 'required',
    ]);

    $contact->update($validated);
    return redirect()->route('contacts.index')->with('success', 'Kontak berhasil diperbarui.');
}

public function destroy(Contact $contact)
{
    $contact->delete();
    return redirect()->route('contacts.index')->with('success', 'Kontak berhasil dihapus.');
}
}
