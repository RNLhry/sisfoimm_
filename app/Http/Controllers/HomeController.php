<?php

namespace App\Http\Controllers;

use App\Models\Kader;
use App\Models\Komisariat;
use App\Models\Pelatihan;
use App\Models\Pelatihan_Kader;
use App\Models\Perkaderan;
use App\Models\Perkaderan_Kader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();

        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->foto);
        }
        View::share('foto', $foto);
        $dad = Perkaderan::where('id', 2)->first();
        $kader = Kader::select('*', DB::raw('(SELECT COUNT(kader.id ) FROM kader ) AS jumlah'))->get();
        $komisariat = Komisariat::select('*', DB::raw('(SELECT COUNT(komisariat.id ) FROM komisariat ) AS jumlah'))->get();
        $dataUser = User::select('*', DB::raw('(SELECT COUNT(users.id ) FROM users ) AS jumlah'))->get();
        $kaderdad = Perkaderan_Kader::select('*', DB::raw('(SELECT COUNT(*) FROM perkaderan_kader WHERE perkaderan_id = 1) AS jumlah'))->get();
        $kaderdam = Perkaderan_Kader::select('*', DB::raw('(SELECT COUNT(*) FROM perkaderan_kader WHERE perkaderan_id = 2) AS jumlah'))->get();
        $kaderdap = Perkaderan_Kader::select('*', DB::raw('(SELECT COUNT(*) FROM perkaderan_kader WHERE perkaderan_id = 3) AS jumlah'))->get();

        $kaderpid = Pelatihan_Kader::select('*', DB::raw('(SELECT COUNT(*) FROM pelatihan_kader WHERE pelatihan_id = 1) AS jumlah'))->get();
        $kaderpim = Pelatihan_Kader::select('*', DB::raw('(SELECT COUNT(*) FROM pelatihan_kader WHERE pelatihan_id = 2) AS jumlah'))->get();
        $kaderpip = Pelatihan_Kader::select('*', DB::raw('(SELECT COUNT(*) FROM pelatihan_kader WHERE pelatihan_id = 3) AS jumlah'))->get();
       
        $jumlahKader = 0; // Inisialisasi variabel jumlahKader
        $user = Auth::user();
        if ($user->roles->id === 2) {
            $username = $user->username;
            $komisariats = Komisariat::where('kode_komisariat', $username)->first();
            $komisariat = Komisariat::where('kode_komisariat', $username)->get();
    
            $foto = null;
            
            if ($komisariat->isNotEmpty()) {
               
                $foto = $komisariats->foto;
            }
            
            if ($komisariats) {
                $jumlahKader = Kader::where('kader.komisariat_id', $komisariats->id)->count();
                
                $jumlahKaderDad = Perkaderan_Kader::leftJoin('kader', 'perkaderan_kader.kader_id', '=', 'kader.id')
                ->leftJoin('perkaderan', 'perkaderan_kader.perkaderan_id', '=', 'perkaderan.id')
                ->where('kader.komisariat_id', $komisariats->id)
                ->where('perkaderan_kader.perkaderan_id', 1)
                ->count();

                $jumlahKaderDam = Perkaderan_Kader::leftJoin('kader', 'perkaderan_kader.kader_id', '=', 'kader.id')
                ->leftJoin('perkaderan', 'perkaderan_kader.perkaderan_id', '=', 'perkaderan.id')
                ->where('kader.komisariat_id', $komisariats->id)
                ->where('perkaderan_kader.perkaderan_id', 2)
                ->count();
                $jumlahKaderDap = Perkaderan_Kader::leftJoin('kader', 'perkaderan_kader.kader_id', '=', 'kader.id')
                ->leftJoin('perkaderan', 'perkaderan_kader.perkaderan_id', '=', 'perkaderan.id')
                ->where('kader.komisariat_id', $komisariats->id)
                ->where('perkaderan_kader.perkaderan_id', 3)
                ->count();

                // --------Pelatihan
                $jumlahKaderPid = Pelatihan_Kader::leftJoin('kader', 'pelatihan_kader.kader_id', '=', 'kader.id')
                ->leftJoin('pelatihan', 'pelatihan_kader.pelatihan_id', '=', 'pelatihan.id')
                ->where('kader.komisariat_id', $komisariats->id)
                ->where('pelatihan_kader.pelatihan_id', 1)
                ->count();
                $jumlahKaderPim = Pelatihan_Kader::leftJoin('kader', 'pelatihan_kader.kader_id', '=', 'kader.id')
                ->leftJoin('pelatihan', 'pelatihan_kader.pelatihan_id', '=', 'pelatihan.id')
                ->where('kader.komisariat_id', $komisariats->id)
                ->where('pelatihan_kader.pelatihan_id', 2)
                ->count();
                $jumlahKaderPip = Pelatihan_Kader::leftJoin('kader', 'pelatihan_kader.kader_id', '=', 'kader.id')
                ->leftJoin('pelatihan', 'pelatihan_kader.pelatihan_id', '=', 'pelatihan.id')
                ->where('kader.komisariat_id', $komisariats->id)
                ->where('pelatihan_kader.pelatihan_id', 3)
                ->count();
                
                return view('home')->with([
                    'user' => $user,
                    'foto' => $foto,
                    'jumlahKader' => $jumlahKader,
                    'jumlahKaderDad' => $jumlahKaderDad,
                    'jumlahKaderDam' => $jumlahKaderDam,
                    'jumlahKaderDap' => $jumlahKaderDap,
                    'jumlahKaderPid' => $jumlahKaderPid,
                    'jumlahKaderPim' => $jumlahKaderPim,
                    'jumlahKaderPip' => $jumlahKaderPip,
                ]);
            }
        }
        
        // Hapus 'foto' dari array yang dikirim ke tampilan
        return view('home')->with([
            'komisariat' => $komisariat,
            'user' => $user,
            'dataUser' => $dataUser,
            'foto' => $foto,
            'kader' => $kader,
            'kaderdad' => $kaderdad,
            'kaderdam' => $kaderdam,
            'kaderdap' => $kaderdap,
            'kaderpid' => $kaderpid,
            'kaderpim' => $kaderpim,
            'kaderpip' => $kaderpip,
            
        ]);
    }
    public function index2(Request $request){
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = User::get();
        $foto = null;

        if ($komisariat->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->logo_komisariat);
        }
        
        // Menggunakan View::share() untuk berbagi variabel $foto ke semua tampilan
        View::share('foto', $foto);

        // Hapus 'foto' dari array yang dikirim ke tampilan
        return view('template.navbar')->with([
            'komisariat' => $komisariat,
            'user' => $user,
            'foto' => $foto
        ]);
    }
}

