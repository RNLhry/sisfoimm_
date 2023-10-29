<?php

namespace App\Http\Controllers;

use App\Models\CategoriInformasi;
use Carbon\Carbon;
use App\Models\Level;
use App\Models\Galeri;
use App\Models\Informasi;
use App\Models\Kader;
use App\Models\Komisariat;
use App\Models\Perkaderan_kader;
use App\Models\Pelatihan_kader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index(){
        // Mengambil semua gambar dari tabel galeri
        $galeri = Galeri::get();
        $komisariat = Komisariat::get();
        $jumlahKader = Kader::count('kader.id');
        $jumlahKomisariat = Komisariat::count('komisariat.id');
    
        // Mengacak urutan gambar
        $shuffledGaleri = $galeri->shuffle();
    
        // Mengambil 3 gambar pertama yang telah diacak
        $randomGaleri = $shuffledGaleri->take(3);
    
        return view('landingPage.beranda', [
            'galeri' => $randomGaleri,
            'komisariat' => $komisariat,
            'jumlahKader' => $jumlahKader,
            'jumlahKomisariat' => $jumlahKomisariat
        ]);
    }
    public function galery(){
        // Mengambil semua gambar dari tabel galeri
        $galeri = Galeri::get();
        $komisariat = Komisariat::get();
    
        return view('landingPage.galeri', [
            'galeri' => $galeri,
            'komisariat' => $komisariat
        ]);
    }
    public function informasi() {
        // Mengambil semua informasi dari tabel informasi
        $informasi = Informasi::get();
        $info = Informasi::get();
        $komisariat = Komisariat::get();
        $categoriInfo = CategoriInformasi::get();
        
        // Mengelompokkan informasi berdasarkan tahun
        $archivedYears = $informasi->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y');
        });
    
        return view('landingPage.informasi', [
            'informasi' => $informasi,
            'info' => $info,
            'categoriInfo' => $categoriInfo,
            'komisariat' => $komisariat,
            'archivedYears' => $archivedYears,
        ]);
    }
    public function informasiTampil(Request $request) {
        // Mengambil semua informasi dari tabel informasi
        $j = $request->segment(2);
        $informasi = Informasi::where('informasi.id', $j)->get();
        $info = Informasi::get();
        $komisariat = Komisariat::get();
        $categoriInfo = CategoriInformasi::get();
        
        // Mengelompokkan informasi berdasarkan tahun
        $archivedYears = $informasi->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y');
        });
    
        return view('landingPage.informasi', [
            'informasi' => $informasi,
            'info' => $info,
            'categoriInfo' => $categoriInfo,
            'komisariat' => $komisariat,
            'archivedYears' => $archivedYears,
        ]);
    }
    
    public function kader(Request $request){
        $j = $request->segment(2);
        $kader = Kader::leftJoin('komisariat', 'kader.komisariat_id', '=', 'kader.id')
                        ->select('kader.*')
                        ->where('kader.komisariat_id', $j)
                        ->get(10);
                        $foto = null;
        $jumlahKader = Kader::where('komisariat_id', $j)->count();
        $jumlahKaderDad = Perkaderan_Kader::leftJoin('kader', 'perkaderan_kader.kader_id', '=', 'kader.id')
        ->leftJoin('perkaderan', 'perkaderan_kader.perkaderan_id', '=', 'perkaderan.id')
        ->where('perkaderan_kader.perkaderan_id', 1)
        ->select('kader.*')
        ->where('kader.komisariat_id', $j)
        ->count();
        $jumlahKaderDam = Perkaderan_Kader::leftJoin('kader', 'perkaderan_kader.kader_id', '=', 'kader.id')
        ->leftJoin('perkaderan', 'perkaderan_kader.perkaderan_id', '=', 'perkaderan.id')
        ->where('perkaderan_kader.perkaderan_id', 2)
        ->select('kader.*')
        ->where('kader.komisariat_id', $j)
        ->count();

        $jumlahKaderPid = Pelatihan_Kader::leftJoin('kader', 'pelatihan_kader.kader_id', '=', 'kader.id')
        ->leftJoin('pelatihan', 'pelatihan_kader.pelatihan_id', '=', 'pelatihan.id')
        ->where('pelatihan_kader.pelatihan_id', 1)
        ->select('kader.*')
        ->where('kader.komisariat_id', $j)
        ->count();
        // $komisariats = Komisariat::get();
        // $jumlahKaderFh = Kader::where('kader.komisariat_id', $komisariats->id)->count();
        
        if ($kader->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($kader[0]->foto);
        } else {
            // Jika tidak ada foto, berikan URL gambar default di sini
            $foto = asset('assets/img/product/avatar.png');
        }
        $komisariat = Komisariat::get();
        $kmst = Komisariat::where('komisariat.id', $j)->get();

    
        return view('landingPage.kader', [
            'kader' => $kader,
            'jumlahKader' => $jumlahKader,
            'jumlahKaderDad' => $jumlahKaderDad,
            'jumlahKaderDam' => $jumlahKaderDam,
            'jumlahKaderPid' => $jumlahKaderPid,
            'komisariat' => $komisariat,
            'kmst' => $kmst,
            'j' => $j,
            'foto' => $foto
        ]);
    }
    public function cariKaderJson(Request $request)
    {
        $nama = $request->input('nama');
        $j = $request->segment(2);
    
        $kader = Kader::leftJoin('komisariat', 'kader.komisariat_id', '=', 'kader.id')
            ->select('kader.*')
            ->where('kader.komisariat_id', $j)
            ->where('kader.nama', 'LIKE', '%' . $nama . '%') 
            ->get();
    
            return view('landingPage.kader', [
                'kaders' => $kader,
                'j' => $j,
                'nama' => $nama,
            ]);
    }
}
