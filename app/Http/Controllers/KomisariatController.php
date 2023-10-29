<?php

namespace App\Http\Controllers;

use index;
use App\Models\User;
use App\Models\Kader;
use App\Models\Level;
use App\Models\Komisariat;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KomisariatExport;

class KomisariatController extends Controller
{
    public function index(){
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->logo_komisariat);
        }
        $komisariat = Komisariat::paginate();
        $roles = Level::get();
        $kader = Kader::get();
     
        return view('admin.komisariat.index', [
            'komisariat' => $komisariat,
            'kader' => $kader,
            'roles' => $roles,
            'foto' => $foto,
            'user' => $user,]);
    }
    public function sidebar(){
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->logo_komisariat);
        }
        $komisariat = Komisariat::get();
        $roles = Level::get();
        $kader = Kader::get();
        dd($komisariat);
     
    return view('master', [
            'komisariat' => $komisariat,
            'kader' => $kader,
            'roles' => $roles,
            'foto' => $foto,
            'user' => $user,]);
    }
    public function create() {
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->logo_komisariat);
        }
        $komisariat = Komisariat::get();
		$kader = Kader::where('kader.komisariat_id', $komisariat[0]->id)->get();
 
		return view('admin.komisariat.create')->with([
            'komisariat' => $komisariat,
            'kader' => $kader,
            'foto' => $foto,
            'user' => $user,
          ]);
	}
    public function store(Request $request) 
    {     
        $logo_komisariat = null;
        if ($request->hasFile('logo_komisariat')) {
            $file = $request->file('logo_komisariat');
            $filename = date('YmdHi') . $file->getClientOriginalName();
        
            // Simpan file gambar ke direktori storage dengan nama yang unik
            Storage::putFileAs('public', $file, $filename);
        
            // Ambil URL gambar yang dapat diakses publik
            $logo_komisariat = Storage::url($filename);
        }
        $komisariat = new Komisariat();
        $komisariat->kode_komisariat = $request->kode_komisariat;
        $komisariat->nama_komisariat = $request->nama_komisariat;
        $komisariat->kader_id = $request->kader_id;
        $komisariat->akun_media_sosial = $request->akun_media_sosial;
        $komisariat->asal_fakultas = $request->asal_fakultas;
        $komisariat->struktur_organisasi = $request->struktur_organisasi;
        $komisariat->logo_komisariat = $logo_komisariat;
        $komisariat->created_by = auth()->user()->id;
        $komisariat->save();

        $user = new User();
        $user->nama = $request->nama_komisariat; // Atur nama sesuai kebutuhan
        $user->username = $request->kode_komisariat; // Atur username sesuai kebutuhan
        $user->password = Hash::make($request->kode_komisariat); // Atur password sesuai kebutuhan
        $user->roles_id = 2; // Atur role sesuai kebutuhan
        $user->save();
       

        Toastr::success('Berhasil Menambah Data Komisariat', 'Sukses !!!');
        return redirect('/komisariat');    
	}
    public function edit(Request $request) {
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->logo_komisariat);
        }
        $j = $request->segment(3);
        $komisariat = Komisariat::where('komisariat.id', $j)->get();
        $kader = Kader::where('kader.komisariat_id', $komisariat[0]->id)->get();
 
 
		return view('admin.komisariat.edit')->with([
            'komisariat' => $komisariat,
            'kader' => $kader,
            'foto' => $foto,
            'user' => $user,
          ]);
	}
  public function update(Request $request) {     
    $request->validate([
        'struktur' => 'required|mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:20000',
        'foto' => 'required|mimes:jpeg,jpg,png|max:20000',
    ]);

    if ($request->hasFile('foto') && $request->hasFile('struktur')) {
        $filenameFoto = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('foto')->getClientOriginalName());
        $filenameStruktur = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('struktur')->getClientOriginalName());

        $request->file('foto')->move(public_path('images'), $filenameFoto);
        $request->file('struktur')->move(public_path('images'), $filenameStruktur);

        Komisariat::where('komisariat.id', $request->id)->update([
            'kode_komisariat' => $request->input('kode'),
            'nama_komisariat' => $request->input('nama'),
            'kader_id' => $request->input('kaderId'),
            'akun_media_sosial' => $request->input('akun'),
            'asal_fakultas' => $request->input('asal'),
            'struktur_organisasi' => $filenameStruktur, // Simpan nama file gambar struktur
            'foto' => $filenameFoto, // Simpan nama file gambar
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);
        
        Toastr::success('Berhasil Mengedit Data Komisariat', 'Sukses !!!');
        
        return redirect('/komisariat');
    }else{
    return 'Gagal';
    }
}

    public function export_excel()
    {
        
        return Excel::download(new KomisariatExport(), 'Komisariat.xlsx');
    }
    public function destroy($id)
    {
        $komisariat = Komisariat::find($id);
    
        // Periksa apakah ada data kader terkait dengan komisariat yang akan dihapus
        if ($komisariat->kader()->count() > 0) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus komisariat karena masih terdapat kader terkait.');
        }
    
        // Jika tidak ada data terkait, maka hapus komisariat
        $komisariat->delete();
    
        return redirect()->back()->with('sukses', 'Data Komisariat Berhasil dihapus');
    }
    public function cari(Request $request)
    {
    $j = $request->segment(2);
    $roles = Level::get();
    $kmst = Komisariat::where('komisariat.id', $j)->get();
    $k = Komisariat::get();
    $kader = Kader::get();
    $user = Auth::user();
    $foto = null;
        
        if ($k->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($k[0]->logo_komisariat);
        }
    
    $cari = $request->input('cari');
    $komisariat = Komisariat::where('komisariat.nama_komisariat', 'like', '%' . $cari . '%')->get();
  
    
    return view('admin.komisariat.index', compact('kmst', 'kader', 'roles', 'foto', 'komisariat', 'user', 'cari'));
}
public function print(Request $request)
{
    $komisariat = Komisariat::leftJoin('kader', 'komisariat.kader_id', '=', 'kader.id')
                ->select('komisariat.*')
                ->get();

    return view('admin.komisariat.print', compact('komisariat'));
}

   
}
