<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Http\Requests\JurusanRequest;

class JurusanController extends Controller
{
    public function index()
    {
        return view('jurusan.index',[
            'jurusans'  => Jurusan::orderBy('id','ASC')->get()
        ]);
    }

    public function store(JurusanRequest $request)
    {
        $jurusan = $request->all();
        Jurusan::create($jurusan);
        session()->flash('success');
        return redirect()->route('jurusan.index');
    }

    public function edit($id)
    {
        $jurusan = Jurusan::find($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(JurusanRequest $request, $id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->update($request->all());
        session()->flash('update');
        return redirect()->route('jurusan.index');
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        session()->flash('delete');
        return redirect()->route('jurusan.index');
    }
}
