<?php

namespace App\Http\Controllers;

use App\Models\PriceList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceListController extends Controller
{
    public function index()
    {
        $priceList = PriceList::all();
        return view('price_lists.index', compact('priceList'));
    }

    public function create()
    {
        return view('price_lists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required',
            'price' => 'required|numeric',
        ]);

        PriceList::create($request->all());

        return redirect()->route('price_lists.index')->with('success', 'Harga berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $priceList = PriceList::findOrFail($id);
        return view('price_lists.edit', compact('priceList'));
    }

    public function update(Request $request, PriceList $priceList)
    {
        $request->validate([
            'service_name' => 'required',
            'price' => 'required|numeric',
        ]);

        $priceList->update($request->all());

        return redirect()->route('price_lists.index')->with('success', 'Harga berhasil diperbarui.');
    }

    public function destroy(PriceList $priceList)
    {
        $priceList->delete();
        return redirect()->route('price_lists.index')->with('success', 'Harga berhasil dihapus.');
    }
}
