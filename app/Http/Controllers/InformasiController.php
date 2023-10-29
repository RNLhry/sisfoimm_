<?php

namespace App\Http\Controllers;

use App\Models\CategoriInformasi;
use App\Models\Level;
use App\Models\Informasi;
use App\Models\Komisariat;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class InformasiController extends Controller
{
    public function index(){
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->foto);
        }
        $informasi = Informasi::get();
        if ($user->roles->id === 2) {
            if ($komisariat->isNotEmpty()) {
                $foto = $komisariat[0]->foto;
            }
            $informasi = Informasi::where('komisariat_id', $komisariat[0]->id)->get();
            $kmst = Komisariat::get();

            $roles = Level::get();
          
         
            return view('admin.informasi.index', [
                'informasi' => $informasi,
                'komisariat' => $komisariat,
                'kmst' => $kmst,
                'roles' => $roles,
                'foto' => $foto,
                'user' => $user,]);
            }
        $kmst = Komisariat::get();

        $roles = Level::get();
      
     
        return view('admin.informasi.index', [
            'informasi' => $informasi,
            'komisariat' => $komisariat,
            'kmst' => $kmst,
            'roles' => $roles,
            'foto' => $foto,
            'user' => $user,]);
    }
    public function create(){
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = $komisariat[0]->foto;
        }
        $informasi = Informasi::get();
        $categoriInfo = CategoriInformasi::get();
        $roles = Level::get();
        $kmst = Komisariat::get();
      
     
        return view('admin.informasi.create', [
            'informasi' => $informasi,
            'categoriInfo' => $categoriInfo,
            'komisariat' => $komisariat,
            'kmst' => $kmst,
            'roles' => $roles,
            'foto' => $foto,
            'user' => $user,]);
    }
    public function store(Request $request)
    {
    $request->validate([
        'foto' => 'required',
        'foto.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
    ]);
    if ($request->hasfile('foto')) {            
        $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
        $request->file('foto')->move(public_path('images'), $filename);
         Informasi::create(
                [                        
                    'judul' => $request->input('judul'),
                    'isi_informasi' => $request->input('isi_informasi'),
                    'quotes' => $request->input('quotes'),
                    'isi_informasi2' => $request->input('isi_informasi2'),
                    'komisariat_id' => $request->input('komisariat'),
                    'categori_informasi_id' => $request->input('categori_informasi'),
                    'foto' => $filename, // Simpan nama file gambar
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]
            );

            
            Toastr::success('Informasi berhasil ditambahkan', 'Sukses !!!');
            if(auth()->user()->roles_id === 1){
            return redirect('/informasi');}
            else{
                return redirect('/informasi2');}
    }else{
        echo'Gagal';
    }
    }
    public function edit(Request $request){
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->logo_komisariat);
        }
        $j = $request->segment(3);
        $informasi = Informasi::where('informasi.id', $j)->get();
        $categoriInfo = CategoriInformasi::get();
        $kmst = Komisariat::get();
        $roles = Level::get();
      
     
        return view('admin.informasi.edit', [
            'informasi' => $informasi,
            'categoriInfo' => $categoriInfo,
            'komisariat' => $komisariat,
            'roles' => $roles,
            'kmst' => $kmst,
            'foto' => $foto,
            'user' => $user,]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'foto.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:20000'
        ]);
    
        $filename = $request->input('foto_existing'); // Ambil nama file gambar yang ada
    
        if ($request->hasfile('foto')) {            
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('foto')->getClientOriginalName());
            $request->file('foto')->move(public_path('images'), $filename);
        }
    
        Informasi::where('informasi.id', $request->id)->update(
            [                        
                'judul' => $request->input('judul'),
                'isi_informasi' => $request->input('isi_informasi'),
                'quotes' => $request->input('quotes'),
                'isi_informasi2' => $request->input('isi_informasi2'),
                'komisariat_id' => $request->input('komisariat'),
                'categori_informasi_id' => $request->input('categori_informasi'),
                'foto' => $filename, // Simpan nama file gambar
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]
        );
        
        Toastr::success('Informasi berhasil Diedit', 'Sukses !!!');
    
        if (auth()->user()->roles_id === 1) {
            return redirect('/informasi');
        } else {
            return redirect('/informasi2');
        }
    }
    
    public function destroy($id){
		$informasi= Informasi::find($id);
		$informasi->delete();
        Toastr::warning('Data Informasi Berhasil dihapus', 'Sukses !!!');
        return redirect()->back();
	}

    public function cari(Request $request)
    {
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        $j = $request->segment(2);
        $roles = Level::get();
        $kmst = Komisariat::where('komisariat.id', $j)->get();
        $user = Auth::user();
        $foto = null;
            
        if ($komisariat->isNotEmpty()) {
            $foto = $komisariat[0]->foto;
        }
        
        $cari = $request->input('cari');
        $informasi = Informasi::where('informasi.komisariat_id', $komisariat[0]->id)->where('judul', 'like', '%' . $cari . '%')->get();
        
        if ($informasi->isEmpty()) {
          
            Toastr::warning('Data tidak ditemukan', 'Warning !!!');
        } else {
            if ($komisariat->isEmpty()) {
                Toastr::info('Data tidak ditemukan pada komisariat lain.', 'Warning !!!');
            }
        }
    
        return view('admin.informasi.index', compact('informasi', 'kmst', 'roles', 'foto', 'komisariat', 'user'));
    }

    // ------------------------
}
