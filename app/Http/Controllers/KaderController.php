<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Kader;
use App\Models\Level;
use App\Models\Roless;
use App\Models\Jurusan;
use App\Models\Pelatihan;
use App\Models\Komisariat;
use App\Models\Perkaderan;
use App\Exports\KaderExport;
use Illuminate\Http\Request;
use App\Models\Pelatihan_Kader;
use App\Models\Perkaderan_Kader;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;



class KaderController extends Controller
{
    public function index(Request $request){
        
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        if ($user->roles->id === 1) {
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->logo_komisariat);
        }
        $j = $request->segment(2);
        $kmst = Komisariat::where('komisariat.id', $j)->get();
        $kader = Kader::leftJoin('komisariat', 'kader.komisariat_id', '=', 'kader.id')
        ->select('kader.*')
        ->where('kader.komisariat_id', $kmst[0]->id)->get();
        $komisariat = Komisariat::get();
        $roles = Level::get();
        $jurusan = Jurusan::get();
        $user = Auth::user();
    }   
        if ($user->roles->id === 2) {
            $j = $request->segment(2);
            $kmst = Komisariat::where('komisariat.kode_komisariat', $username)
            ->get();
            if ($komisariat->isNotEmpty()) {
                $foto = $komisariat[0]->foto;
            }
            if ($kmst) {
                $kader = Kader::where('komisariat_id', $kmst[0]->id)->paginate();
                $roles = Level::get();
                $jurusan = Jurusan::get();
                return view('admin.kader.index')->with([
                    'kader' => $kader,
                    'jurusan' => $jurusan,
                    'kmst' => $kmst,
                    'foto' => $foto,
                    'user' => $user,
                    'roles' => $roles]);
            }
        }
     
        return view('admin.kader.index', [
            'kader' => $kader,
            'kmst' => $kmst,
            'jurusan' => $jurusan,
            'komisariat' => $komisariat,
            'foto' => $foto,
            'user' => $user,
            'roles' => $roles]);


    }
    public function show(Request $request){
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = $komisariat[0]->foto;
        }
        $segment = $request->segment(3);
        $kader = Kader::where('id', $segment)->get();
        $roles = Level::get();
        $komisariat = Komisariat::get();
        $perkaderan = DB::table('perkaderan_kader')
        ->select('kader_id', DB::raw('GROUP_CONCAT(DISTINCT perkaderan_id) as perkaderan_ids'))
        ->groupBy('kader_id')
        ->get();
        $pelatihan = DB::table('pelatihan_kader')
        ->select('kader_id', DB::raw('GROUP_CONCAT(DISTINCT pelatihan_id) as pelatihan_ids'))
        ->groupBy('kader_id')
        ->get();
     
        return view('admin.kader.show', [
            'kader' => $kader,
            'roles' => $roles,
            'foto' => $foto,
              'komisariat' => $komisariat,
            'user' => $user,
            'perkaderan' => $perkaderan,
            'pelatihan' => $pelatihan,
        ]);
    }
	public function create(Request $request) {
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = $komisariat[0]->foto;
        }
        $j = $request->segment(3);
        $kmst = Komisariat::where('komisariat.id', $j)->get();
		$kader = Kader::get();
        $perkaderan = Perkaderan::get();
        $jurusan = Jurusan::get();
        $komisariat = Komisariat::get();
        $pelatihan = Pelatihan::get();
       
		return view('admin.kader.create')->with([
            'kader' => $kader,
            'perkaderan' => $perkaderan,
            'pelatihan' => $pelatihan,
            'jurusan' => $jurusan,
            'komisariat' => $komisariat,
            'kmst' => $kmst,
            'foto' => $foto,
            'user' => $user,
          ]);
	}
    
    public function edit($id, Request $request) {
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->logo_komisariat);
        }
        $j = $request->segment(3);
		$kader = Kader::where('kader.id', $j)->get();
		$komisariats = Kader::where('kader.id', $j)->get();

        $perkaderan = Perkaderan_Kader::where('kader_id', $kader[0]->id)->pluck('perkaderan_id')->toArray();
        $perkaderanIds = Perkaderan_Kader::where('perkaderan_kader.kader_id', $j)->pluck('perkaderan_id')->toArray();
        $perkaderanOptions = Perkaderan::pluck('nama', 'id')->toArray();
        
        $pelatihan = Pelatihan_Kader::where('kader_id', $kader[0]->id)->pluck('pelatihan_id')->toArray();
        $pelatihanIds = Pelatihan_Kader::where('pelatihan_kader.kader_id', $j)->pluck('pelatihan_id')->toArray();
        $pelatihanOptions = Pelatihan::pluck('nama', 'id')->toArray();

        $jurusan = Jurusan::get();
        $komisariat = Komisariat::get();
       
 
		return view('admin.kader.edit')->with([
            'kader' => $kader,
            'perkaderan' => $perkaderan,
            'pelatihan' => $pelatihan,
            'jurusan' => $jurusan,
            'komisariat' => $komisariat,
            'komisariats' => $komisariats,
            'perkaderanIds' => $perkaderanIds,
            'perkaderanOptions' => $perkaderanOptions,
            'pelatihanIds' => $pelatihanIds,
            'pelatihanOptions' => $pelatihanOptions,
            'foto' => $foto,
            'user' => $user,
          ]);
	}


    public function store(Request $request)
    {
        $j = $request->segment(3);
		$kader = Kader::where('kader.id', $j)->get();
        
        $fotos = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = date('YmdHi') . $file->getClientOriginalName();
    
            // Simpan file gambar ke direktori storage dengan nama yang unik
            Storage::putFileAs('public', $file, $filename);
    
            // Ambil URL gambar yang dapat diakses publik
            $fotos = Storage::url($filename);
        }
    
        $kader = new Kader();
        $kader->nama = $request->nama;
        $kader->nim = $request->nim;
        $kader->angkatan = $request->angkatan;
        $kader->tempat_tanggal_lahir = $request->tempat_tanggal_lahir;
        $kader->jurusan_id = $request->jurusan;
        $kader->jenis_kelamin = $request->jenis_kelamin;
        $kader->no_telp = $request->no_telp;
        $kader->alamat = $request->alamat;
        $kader->nama_bapak = $request->nama_bapak;
        $kader->nama_ibu = $request->nama_ibu;
        $kader->tahun_berkader = $request->tahun_berkader;
        $kader->jabatan = $request->jabatan;
        $kader->komisariat_id = $request->komisariat;
        $kader->foto = $fotos;
        $kader->created_by = auth()->user()->id;
        $kader->save();
        
        $selectedPerkaderan = $request->input('perkaderan');
        foreach ($selectedPerkaderan as $perkaderanId) {
            Perkaderan_Kader::create([
                'kader_id' => $kader->id,
                'perkaderan_id' => $perkaderanId,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id
            ]);
        }    
        $selectedPelatihan = $request->input('pelatihan');

        if ($selectedPelatihan) {
            foreach ($selectedPelatihan as $pelatihanId) {
                Pelatihan_Kader::create([
                    'kader_id' => $kader->id,
                    'pelatihan_id' => $pelatihanId,
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id
                ]);
            }
        }
         
        if (Auth::user()->roles->id == 1) {
            Toastr::success('Berhasil Menambah Data Kader', 'Sukses !!!');
            return redirect()->back();
        } elseif (Auth::user()->roles->id == 2){
            return redirect('/kaderKmst')->with('sukses', 'Berhasil Menambah Data Kader');
        }
    }
    public function update(Request $request)
    {
        $fotos = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = date('YmdHi') . $file->getClientOriginalName();
    
            // Simpan file gambar ke direktori storage dengan nama yang unik
            Storage::putFileAs('public', $file, $filename);
    
            // Ambil URL gambar yang dapat diakses publik
            $foto = Storage::url($filename);
        }
        $kader = Kader::find($request->id);
        $kader->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'angkatan' => $request->angkatan,
            'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
            'jurusan_id' => $request->jurusan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'nama_bapak' => $request->nama_bapak,
            'nama_ibu' => $request->nama_ibu,
            'tahun_berkader' => $request->tahun_berkader,
            'jabatan' => $request->jabatan,
            'komisariat_id' => $request->komisariat,
            'foto' => $fotos,
            'updated_by' => auth()->user()->id
            
        ]);
        
        $existingPerkaderanKader = Perkaderan_Kader::where('kader_id', $kader->id)->get();
        $selectedPerkaderan = $request->input('perkaderan');

        // Validasi apakah $selectedPerkaderan adalah array sebelum melanjutkan
        if (is_array($selectedPerkaderan)) {
            foreach ($selectedPerkaderan as $perkaderanId) {
                // Periksa apakah $perkaderanId memiliki nilai yang valid
                if (is_numeric($perkaderanId) && Perkaderan::where('id', $perkaderanId)->exists()) {
                    $existingData = $existingPerkaderanKader->where('perkaderan_id', $perkaderanId)->first();

                    if ($existingData) {
                        // Jika sudah ada data, maka lakukan pembaruan (update)
                        $existingData->update([
                            'updated_by' => auth()->user()->id
                        ]);
                    } else {
                        // Jika belum ada data, maka buat data baru
                        Perkaderan_Kader::create([
                            'kader_id' => $kader->id,
                            'perkaderan_id' => $perkaderanId,
                            'created_by' => auth()->user()->id,
                            'updated_by' => auth()->user()->id
                        ]);
                    }
                } else {
                    return redirect()->back()->with('error', 'Data Perkaderan Kader ini tidak valid');
                }
            }
        } else {
            $j = $request->segment(3);
            if (Auth::user()->roles->id == 1) {
                return redirect('/kader/'.$j )->with('success', 'Berhasil mengedit data Kader');
            } elseif (Auth::user()->roles->id == 2){
                return redirect('/kader' )->with('success', 'Berhasil mengedit data Kader');
            }
            return redirect()->with('success', 'Data Perkaderan Kader ini tidak bisa dihapus lewat form edit');
        }

        $existingPelatihanKader = Pelatihan_Kader::where('kader_id', $kader->id)->get();
        $selectedPelatihan = $request->input('pelatihan');
        
        // Validasi apakah $selectedpelatihan adalah array sebelum melanjutkan
        if (is_array($selectedPelatihan)) {
            foreach ($selectedPelatihan as $pelatihanId) {
                // Periksa apakah $pelatihanId memiliki nilai yang valid
                if (is_numeric($pelatihanId) && pelatihan::where('id', $pelatihanId)->exists()) {
                    $existingData = $existingPelatihanKader->where('pelatihan_id', $pelatihanId)->first();
        
                    if ($existingData) {
                        // Jika sudah ada data, maka lakukan pembaruan (update)
                        $existingData->update([
                            'updated_by' => auth()->user()->id
                        ]);
                    } else {
                        // Jika belum ada data, maka buat data baru
                        pelatihan_Kader::create([
                            'kader_id' => $kader->id,
                            'pelatihan_id' => $pelatihanId,
                            'created_by' => auth()->user()->id,
                            'updated_by' => auth()->user()->id
                        ]);
                    }
                } else {
                    Toastr::error('Data Pelatihan Kader ini tidak valid', 'Error !!!');

                    return redirect()->back();               
                }
            }
        } else {
            return redirect()->back()->with('error', 'Data Pelatihan Kader ini tidak bisa dihapus lewat form edit');
        }
        if (Auth::user()->roles->id == 1) {
            Toastr::success('Berhasil Mengedit Data Kader', 'Sukses !!!');
            return redirect()->back();
        } elseif (Auth::user()->roles->id == 2){
            Toastr::success('Berhasil Mengedit Data Kader', 'Sukses !!!');
            return redirect('/kaderKmst');
        }  }

    public function filter(Request $request)
    {
        $kader = Kader::paginate();
        $roles = Level::get();
        $jurusan = Jurusan::get();
        // Ambil data dari permintaan filter
        $jurusann = $request->input('jurusan');
        $year = $request->input('year');
        $jenis_kelamin = $request->input('jenis_kelamin');
    
        // Lakukan pengambilan data berdasarkan filter
        $filteredData = Kader::query();
        // dd($filteredData);
        if ($jurusann) {
            $filteredData->where('jurusan_id', $jurusann);
        }
    
        if ($year) {
            $filteredData->where('tahun_berkader', $year);
        }
    
        // Periksa apakah input 'jenis_kelamin' ada dalam permintaan sebelum menggunakan where
        if ($jenis_kelamin !== null && $jenis_kelamin !== '') {
            $filteredData->where('jenis_kelamin', $jenis_kelamin);
        }
    
        $filteredData = $filteredData->get();
    
        // Kirim data yang difilter ke tampilan
        return view('admin.kader.index', compact('filteredData', 'jurusan', 'kader', 'roles'));
    }
    public function search(Request $request)
    {
        $cari = $request->cari;
        $roles = Level::get();
        $cari = // Ambil kata kunci pencarian dari permintaan HTTP, misalnya $request->input('cari');

        $kader = Kader::where(function ($query) use ($cari) {
            $query->where('nama', 'like', '%' . $cari . '%')
                  ->orWhereHas('jurusan', function ($subquery) use ($cari) {
                      $subquery->where('nama', 'like', '%' . $cari . '%');
                  });
        })->paginate(10);
        
      
        return view('admin.kader.index', [
            'kader' =>  $kader,
            'roles' => $roles
        ]);
    }

    public function destroy($id)
    {
        $kader = Kader::find($id);
        $isKetuaKomisariat = DB::table('komisariat')->where('kader_id', $id)->exists();
        
        if ($isKetuaKomisariat) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus kader karena masih menjadi ketua komisariat');
        }
    
        // Hapus perkaderan kader terkait
        Perkaderan_Kader::where('kader_id', $id)->delete();
    
        // Hapus pelatihan kader terkait
        Pelatihan_Kader::where('kader_id', $id)->delete();
    
        // Hapus kader
        $kader->delete();
    
    
    
        return redirect()->back()->with('success', 'Data Kader Berhasil dihapus');
    }

    public function export_excel(Request $request)
    {
        $j = $request->segment(2);
        $kmst = Komisariat::where('komisariat.id', $j)->get();
        $export = new KaderExport($j);

        return Excel::download($export, 'kader.xlsx');
    }
    public function print(Request $request)
    {
        $j = $request->segment(2);
        $kader = Kader::where('kader.komisariat_id', $j)->get();

        return view('admin.kader.print', compact('kader'));
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
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->logo_komisariat);
        }
        
        $cari = $request->input('cari');
        $kader = Kader::where('kader.komisariat_id', $j)->where('nama', 'like', '%' . $cari . '%')->get();
        $kaderLain = Kader::where('kader.komisariat_id', $kmst[0]->id)->get();

        // Gabungkan hasil dari kedua kueri
        $kaderList = $kader->concat($kaderLain);
        
        if ($kader->isEmpty()) {
          
            Toastr::warning('Data tidak ditemukan', 'Warning !!!');
        } else {
            if ($komisariat->isEmpty()) {
                Toastr::info('Data tidak ditemukan pada komisariat lain.', 'Warning !!!');
            }
        }
    
        return view('admin.kader.index', compact('kader', 'kaderList', 'kmst', 'roles', 'foto', 'komisariat', 'user'));
    }
    
    
}


