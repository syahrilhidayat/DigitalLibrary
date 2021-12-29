<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Http\Requests\BukuRequest;

class BukuController extends Controller
{
    public function index()
    {
        return view('buku.index',[
            'bukus'     => Buku::orderBy('id','DESC')->get(),
            'kategoris' => Kategori::orderBy('id','ASC')->get()
        ]);
    }
    public function store(BukuRequest $request)
    {
        $buku = $request->all();
        Buku::create($buku);
        session()->flash('success');
        return redirect()->route('buku.index');
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        $kategoris = Kategori::orderBy('id','ASC')->get();
        return view('buku.edit', compact('buku','kategoris'));
    }
    public function update(BukuRequest $request, $id)
    {
        $buku = Buku::find($id);
        $buku->update($request->all());
        session()->flash('update');
        return redirect()->route('buku.index');
    }
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        session()->flash('delete');
        return redirect()->route('buku.index');
    }
}
