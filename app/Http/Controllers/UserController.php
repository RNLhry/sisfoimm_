<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use App\Models\Komisariat;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->logo_komisariat);
        }
        $roles = Level::get();
        $users = User::where('users.roles_id', 2)->get();
        
        // $user = User::where('id', $roles->id =2
       
     
        return view('admin.user.index', [
            'users' => $users,
            'roles' => $roles,
            'foto' => $foto,
            'komisariat' => $komisariat,
            'user' => $user,]);
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
        $users = User::where('users.id', $j)->get();
        $roles = Level::get();
        $j = $request->segment(3);
        $i = Auth::user('users.id', $j);
 
		return view('admin.user.edit')->with([
            'user' => $user,
            'users' => $users,
            'roles' => $roles,
            'komisariat' => $komisariat,
            'foto' => $foto,
            'i' => $i
          ]);
	}
    public function profil(Request $request) {
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = $komisariat[0]->foto;
        }
        $segment = Auth::user()->id;
        $j = $request->segment(3);
        $user = Auth::user('users.id', $j);
        $roles = Level::get();
 
		return view('profil.index')->with([
            'user' => $user,
            'roles' => $roles,
            'segment' => $segment,
            'foto' => $foto,
            'komisariat' => $komisariat
          ]);
	}
    public function create(Request $request) {
        $username = Auth::user()->username;
        $komisariat = Komisariat::where('kode_komisariat', $username)->get();
        $user = Auth::user();
        $foto = null;
        
        if ($komisariat->isNotEmpty()) {
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->logo_komisariat);
        }
        
        $users = User::get();
        $roles = Level::get();
 
		return view('admin.user.create')->with([
            'user' => $user,
            'users' => $users,
            'roles' => $roles,
            'foto' => $foto,
            'komisariat' => $komisariat,
          ]);
	}
    public function update(Request $request){
        $password = $request->input('password');
        $hashedPassword = bcrypt($password);

        $j = $request->segment(3);
        $user = Auth::user('users.id', $j);
        $i = User::where('users.username', $user->username)->first();
        $username = $request->has('username') ? $request->input('username') : $request->input('existing_username');

        // Ambil peran (role) dari user yang saat ini terautentikasi
        $authenticatedUser = Auth::user();
        $authenticatedUserRole = $authenticatedUser->roles_id;
    
        // Tentukan nilai default untuk rolesId berdasarkan peran yang terautentikasi
        $defaultRolesId = $authenticatedUserRole == 1 ? 1 : 2;
    
        User::where('id', $request->id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $hashedPassword,
            'roles_id' => $request->has('rolesId') ? $request->input('rolesId') : $defaultRolesId,
        ]);
       
    
        Toastr::success('Berhasil mengedit data user', 'Sukses !!!');
        return redirect('/user');
    }
    
    public function store(Request $request){
        $password = $request->input('password');
        $hashedPassword = bcrypt($password);
        User::where('id', $request->id)->create([
            'nama' => $request->nama,
            'username' =>$request->username,
            'password' =>$hashedPassword,
            'roles_id' => $request->roles_id,
        ]);   
        dd($request->all());  
      Toastr::success('Berhasil mengedit data user', 'Sukses !!!');
      return redirect('/user');    

    }
    public function destroy($id){
		$komisariat= User::find($id);
		$komisariat->delete();
		return redirect()->back()->with('sukses','Data Komisariat Berhasil dihapus');
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
            $foto = 'data:image/jpeg/JPG;base64,' . base64_encode($komisariat[0]->foto);
        }
    
    $cari = $request->input('cari');
    $users = User::where('users.nama', 'like', '%' . $cari . '%')->get();
  
    
    return view('admin.user.index', compact('kmst', 'roles', 'foto', 'komisariat', 'users', 'user', 'cari'));
}


}
