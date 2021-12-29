<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Jurusan;
use App\Http\Requests\AnggotaRequest;

class AnggotaController extends Controller
{
    public function index()
    {
        return view('anggota.index',[
            'anggotas'      => Anggota::orderBy('id','DESC')->get(),
            'jurusans'      => Jurusan::orderBy('id','ASC')->get()
        ]);
    }
    public function store(AnggotaRequest $request)
    {
        $anggota = $request->all();
        Anggota::create($anggota);
        session()->flash('success');
        return redirect()->route('anggota.index');
    }
    public function edit($id)
    {
        $anggota = Anggota::find($id);
        $jurusans = Jurusan::get();
        return view('anggota.edit', compact('anggota','jurusans'));
    }
    public function update(AnggotaRequest $request, $id)
    {
        $anggota = Anggota::find($id);
        $anggota->update($request->all());
        session()->flash('update');
        return redirect()->route('anggota.index');
    }
    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();
        session()->flash('delete');
        return redirect()->route('anggota.index');
    }
}
