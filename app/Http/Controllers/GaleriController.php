<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use App\Models\Galeri;
use App\Models\Komisariat;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(){
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->logo_komisariat);
        }
        $galeri = Galeri::get();
        $roles = Level::get();
      
     
        return view('admin.galeri.index', [
            'galeri' => $galeri,
            'komisariat' => $komisariat,
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
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->logo_komisariat);
        }
        $galeri = Galeri::paginate();
        $roles = Level::get();
      
     
        return view('admin.galeri.create', [
            'galeri' => $galeri,
            'komisariat' => $komisariat,
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
         Galeri::create(
                [                        
                    'judul' => $request->input('judul'),
                    'keterangan' => $request->input('keterangan'),
                    'foto' => $filename, // Simpan nama file gambar
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]
            );
            Toastr::success('Galeri berhasil ditambahkan', 'Sukses !!!');

            return redirect('/galeri');
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
        $galeri = Galeri::where('galeri.id', $j)->get();
        $roles = Level::get();
      
     
        return view('admin.galeri.edit', [
            'galeri' => $galeri,
            'komisariat' => $komisariat,
            'roles' => $roles,
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

        Galeri::where('galeri.id', $request->id)->update(
                [                        
                    'judul' => $request->input('judul'),
                    'keterangan' => $request->input('keterangan'),
                    'foto' => $filename, // Simpan nama file gambar
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]
            );
            Toastr::success('Galeri berhasil ditambahkan', 'Sukses !!!');
      //     // Redirect kembali ke halaman daftar galeri atau halaman yang sesuai
            return redirect('/galeri');
    
    } 
    public function destroy($id){
		$galeri= Galeri::find($id);
		$galeri->delete();
        Toastr::warning('Data Komisariat Berhasil dihapus', 'Sukses !!!');
        return redirect()->back();
	}

    public function cari(Request $request)
    {
        $j = $request->segment(2);
        $roles = Level::get();
        $kmst = Komisariat::where('komisariat.id', $j)->get();
        $komisariat = Komisariat::get();
        $user = Auth::user();
        $foto = null;
            
        if ($komisariat->isNotEmpty()) {
            $foto = $komisariat[0]->foto;
        }
        
        $cari = $request->input('cari');
        $galeri = Galeri::where('judul', 'like', '%' . $cari . '%')->get();
        
        if ($galeri->isEmpty()) {
          
            Toastr::warning('Data tidak ditemukan', 'Warning !!!');
        } else {
            if ($komisariat->isEmpty()) {
                Toastr::info('Data tidak ditemukan pada komisariat lain.', 'Warning !!!');
            }
        }
    
        return view('admin.galeri.index', compact('galeri', 'kmst', 'roles', 'foto', 'komisariat', 'user'));
    }

}
