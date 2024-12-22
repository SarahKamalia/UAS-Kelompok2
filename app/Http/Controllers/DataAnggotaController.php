<?php
namespace App\Http\Controllers;

use App\Models\DataAnggota;
use Illuminate\Http\Request;

class DataAnggotaController extends Controller
{
    public function index()
    {
        // Mengambil semua data anggota
        $data = DataAnggota::all();
        return response()->json($data);
    }
}
