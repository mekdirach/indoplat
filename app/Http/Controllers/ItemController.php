<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\opch;
use App\Models\pch1;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = pch1::orderBy('id', 'desc')->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $opchEntries = opch::all();
        return view('items.create', compact('opchEntries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'docentry' => 'required|exists:opch,docentry',
            'itemcode' => 'required',
            'itemname' => 'required',
            'price' => 'required|numeric',
        ]);
        //dd($request);
        $pch1 = new pch1();
        $pch1->docentry = $request->input('docentry');
        $pch1->itemcode = $request->input('itemcode');
        $pch1->itemname = $request->input('itemname');
        $pch1->price = $request->input('price');
        $pch1->save();



        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }




    public function show(pch1 $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(pch1 $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, pch1 $item)
    {
        $request->validate([
            'itemcode' => 'required',
            'itemname' => 'required',
            'price' => 'required|numeric',
        ]);

        // Memisahkan atribut yang valid untuk diupdate
        $data = [
            'itemcode' => $request->input('itemcode'),
            'itemname' => $request->input('itemname'),
            'price' => $request->input('price'),
            // tambahkan atribut lainnya sesuai kebutuhan
        ];

        $item->update($data);

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(pch1 $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
