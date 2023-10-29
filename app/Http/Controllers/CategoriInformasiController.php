<?php

namespace App\Http\Controllers;

use App\Models\CategoriInformasi;
use App\Models\Level;
use App\Models\Informasi;
use App\Models\Komisariat;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CategoriInformasiController extends Controller
{
    public function index(){
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->logo_komisariat);
        }
        $categoriInfo = CategoriInformasi::get();
        $kmst = Komisariat::get();

        $roles = Level::get();
      
     
        return view('admin.categoriInformasi.index', [
            'categoriInfo' => $categoriInfo,
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
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->logo_komisariat);
        }
        $categoriInfo = CategoriInformasi::paginate();
        $roles = Level::get();
        $kmst = Komisariat::get();
      
     
        return view('admin.categoriInformasi.create', [
            'categoriInfo' => $categoriInfo,
            'komisariat' => $komisariat,
            'kmst' => $kmst,
            'roles' => $roles,
            'foto' => $foto,
            'user' => $user,]);
    }
    public function store(Request $request)
    {
     CategoriInformasi::create(
                [                        
                    'nama' => $request->input('nama'),
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]
            );
            Toastr::success('Galeri berhasil ditambahkan', 'Sukses !!!');

            return redirect('/categoriInformasi');
   
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
        $categoriInfo = CategoriInformasi::where('categori_informasi.id', $j)->get();
        $kmst = Komisariat::get();
        $roles = Level::get();
      
     
        return view('admin.categoriInformasi.edit', [
            'categoriInfo' => $categoriInfo,
            'komisariat' => $komisariat,
            'roles' => $roles,
            'kmst' => $kmst,
            'foto' => $foto,
            'user' => $user,]);
    }
    public function update(Request $request)
    {
  
        CategoriInformasi::where('categori_informasi.id', $request->id)->update(
                [                        
                    'nama' => $request->input('nama'),
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]
            );
            Toastr::success('Kategori Informasi berhasil diubah', 'Sukses !!!');
            //     // Redirect kembali ke halaman daftar galeri atau halaman yang sesuai
            return redirect('/categoriInformasi');

    }  
    public function destroy($id){
		$categoriInfo= CategoriInformasi::find($id);
		$categoriInfo->delete();
        Toastr::warning('Data Kategori Informasi Berhasil dihapus', 'Sukses !!!');
        return redirect()->back();
	}


}
