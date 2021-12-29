<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
class LaporanController extends Controller
{
    public function pdf()
    {
        $pdf = Transaksi::orderBy('id','ASC')->get();

        return view('transaksi.laporanPDF', compact('pdf'));
    }
}
