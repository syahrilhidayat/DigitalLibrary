<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Http\Requests\KategoriRequest;

class KategoriController extends Controller
{
    public function index()
    {
        return view('kategori.index',[
            'kategoris'  =>   Kategori::orderBy('id', 'ASC')->get()
        ]);
    }

    public function store(KategoriRequest $request)
    {
        $kategori = $request->all();
        Kategori::create($kategori);

        session()->flash('success');
        return redirect()->route('kategori.index');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(KategoriRequest $request,$id)
    {
        $kategori = Kategori::find($id);
        $kategori->update($request->all());

        session()->flash('update');
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        session()->flash('delete');
        return redirect()->route('kategori.index');
    }
}
