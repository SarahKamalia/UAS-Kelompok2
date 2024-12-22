<?php
namespace App\Http\Controllers;

use App\Models\DataAnggota;

class LandingPageController extends Controller
{
    public function index()
    {
        $dataAnggota = DataAnggota::all(); // Mengambil semua data
        return view('landing', compact('dataAnggota'));
    }
}
