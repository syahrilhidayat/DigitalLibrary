<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransaksiRequest;
use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi.index',[
            'transaksis' => Transaksi::orderBy('id','desc')->get(),
            'anggotas'   => Anggota::orderBy('id','desc')->get(),
            'bukus'      => Buku::orderBy('id','desc')->get()
        ]);
    }

    public function store(TransaksiRequest $request)
    {
        $transaksi = $request->all();
        Transaksi::create($transaksi);
        session()->flash('success');
        return redirect()->route('transaksi.index');
    }
    public function update($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi = Transaksi::where('status','=', 0);
        $transaksi->update(['status' => 1]);
        session()->flash('update');
        return redirect()->route('transaksi.index');
    }

    // public function chart()
    // {
    //     $anggota = Anggota::count();
    //     return view('dashboard',compact('anggota'));
    // }

    public function pdf()
    {
        $pdf = Transaksi::orderBy('id','ASC')->get();

        return view('transaksi.laporanPDF', compact('pdf'));
    }
}
