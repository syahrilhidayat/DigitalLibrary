<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class DashboardController extends Controller
{
    public function index()
    {
        $anggota = Anggota::count()->get();
        return view('dashboard', compact('anggota'));
    }
}
