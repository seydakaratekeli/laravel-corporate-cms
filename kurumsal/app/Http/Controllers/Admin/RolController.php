<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use DB;
class RolController extends Controller
{
    public function IzinListe(){
        $izinler = Permission::latest('id')->paginate(10);
         return view('admin.rol.izin_liste', compact('izinler'));
    }

    public function KullaniciDurum(Request $request){
        $surec = User::find($request->urun_id);
        if (!$surec) {
            return response()->json(['error' => 'Kullanıcı bulunamadı.'], 404);
        }

        $surec->durum = $request->durum;
        $surec->save();
        return response()->json(['success' => 'Kullanıcı durumu başarıyla güncellendi.']);
    }

    public function IzinEkle(){
        return view('admin.rol.izin_ekle');
    }

    public function IzinForm(Request $request){
        
        $rol= Permission::create([
            'name' => $request->name,
            'grup_adi' => $request->grup_adi
        ]);

          $mesaj=array(
                    'bildirim'=>'İzin başarıyla eklendi.',
                    'alert-type'=>'success',
            
            );

            return Redirect()->route('izin.liste')->with($mesaj);
    }


        public function IzinDuzenle($id){


            $izinler = Permission::findOrFail($id);
            return view('admin.rol.izin_duzenle', compact('izinler'));
        }

        

        public function IzinGuncelle(Request $request){

            $izin_id = $request->id;

            Permission::findOrFail($izin_id)->update([
                'name' => $request->name,
                'grup_adi' => $request->grup_adi
            ]);

             $mesaj=array(
                    'bildirim'=>'İzin başarıyla güncellendi.',
                    'alert-type'=>'success',
            
            );

            return Redirect()->route('izin.liste')->with($mesaj);
        }

        public function IzinSil($id){
            
            Permission::findOrFail($id)->delete();

             $mesaj=array(
                    'bildirim'=>'İzin başarıyla silindi.',
                    'alert-type'=>'success',
            
            );

            return Redirect()->route('izin.liste')->with($mesaj);
        }


        //roller


        
        public function RolListe(){
            $rol = Role::orderBy('id', 'asc')->paginate(10);
            return view('admin.rol.rol_liste', compact('rol'));
        }

        public function RolEkle(){
            return view('admin.rol.rol_ekle');
        }


        public function RolForm(Request $request){
        
            $rol= Role::create([
                'name' => $request->name,
            ]);

              $mesaj=array(
                        'bildirim'=>'Rol başarıyla eklendi.',
                        'alert-type'=>'success',
                
                );

                return Redirect()->route('rol.liste')->with($mesaj);
        }

            public function RolDuzenle($id){    
                $rol = Role::findOrFail($id);
                return view('admin.rol.rol_duzenle', compact('rol'));
            }   

            public function RolGuncelle(Request $request){

                $rol_id = $request->id;

                Role::findOrFail($rol_id)->update([
                    'name' => $request->name,
                ]);

                 $mesaj=array(
                        'bildirim'=>'Rol başarıyla güncellendi.',
                        'alert-type'=>'success',
                
                );

                return Redirect()->route('rol.liste')->with($mesaj);
            }

            public function RolSil($id){
            
                Role::findOrFail($id)->delete();

                 $mesaj=array(
                        'bildirim'=>'Rol başarıyla silindi.',
                        'alert-type'=>'success',
                
                );

                return Redirect()->route('rol.liste')->with($mesaj);
            }

            //rolleree izin verme
            public function RolIzinVerme(){

                $roller = Role::all();
                $izinler = Permission::all();
                $izin_gruplari = User::IzinGruplari();
                
                return view('admin.rol.rol_izin_ver', compact('roller', 'izinler', 'izin_gruplari'));
            }

            public function RolYetkiVer(Request $request){

                $yetkiler = $request->yetki;

                if($request->rol_id && !empty($yetkiler)){
                    $rol = Role::findOrFail($request->rol_id);
                    $int_yetkiler = array_map('intval', $yetkiler);
                    $rol->syncPermissions($int_yetkiler);
                }


                 $mesaj=array(
                        'bildirim'=>'Rol izinleri başarıyla güncellendi.',
                        'alert-type'=>'success',
                
                );

                return Redirect()->route('rol.liste')->with($mesaj);
            }

            public function RolYetkiListe(){

                $rol = Role::all();
                return view('admin.rol.rol_yetki_liste', compact('rol'));
            }

            public function RolYetkiDuzenle($id){

                $rol = Role::findOrFail($id);
                $yetkiler = Permission::all();
                $izin_gruplari = User::IzinGruplari();

                return view('admin.rol.rol_yetki_duzenle', compact('rol', 'yetkiler', 'izin_gruplari'));
            }

            public function RolYetkiSil($id){

                DB::table('role_has_permissions')->where('role_id', $id)->delete();

                 $mesaj=array(
                        'bildirim'=>'Rol izinleri başarıyla silindi.',
                        'alert-type'=>'success',
                
                );

                return Redirect()->route('rol.liste')->with($mesaj);
            }

            public function RolYetkiGuncelle(Request $request, $id){

                $rol = Role::findOrFail($id);
                $secili_yetkiler = $request->yetki;

                if(!empty($secili_yetkiler)){
                    $int_yetkiler = array_map('intval', $secili_yetkiler);
                    $rol->syncPermissions($int_yetkiler);
                }
                 $mesaj=array(
                        'bildirim'=>'Rol izinleri başarıyla güncellendi.',
                        'alert-type'=>'success',
                
                );

                return Redirect()->route('rol.yetki.liste')->with($mesaj);
            }



             public function AdminRolSil($id){

                $rol = Role::findOrFail($id);
                if(!is_null($rol)){

                    $rol->delete();
                }

                 $mesaj=array(
                        'bildirim'=>'Rol başarıyla silindi.',
                        'alert-type'=>'success',
                
                );

                return Redirect()->back()->with($mesaj);
            }

            
             public function KullaniciListe(){
                $kullanici_liste = User::where('rol', 'admin')->latest()->get();

                return view('admin.kullanicilar.kullanici_liste', compact('kullanici_liste'));
            }

                public function KullaniciEkle(){

                $roller = Role::all();
                    return view('admin.kullanicilar.kullanici_ekle', compact('roller'));
                }


                public function KullaniciEkleForm(Request $request){

                    $request->validate([
                        'email' => 'required|unique:users',
                        'username' => 'required|unique:users',
                        'telefon' => 'required|unique:users',
                    ]);

                    $user = new User();
                    $user->name=$request->name;
                    $user->email=$request->email;
                    $user->username=$request->username;
                    $user->telefon=$request->telefon;
                    $user->password=Hash::make($request->password);
                    $user->rol='admin';
                    $user->durum = 1;

                    $user->save();

                    if($request->rol){
                        $user->assignRole((int)$request->rol);
                    }

                    $mesaj=array(
                            'bildirim'=>'Kullanıcı başarıyla eklendi.',
                            'alert-type'=>'success',
                    
                    );

                    return Redirect()->route('kullanici.liste')->with($mesaj);
                }
    
                public function KullaniciDuzenle($id){


                    $user = User::findOrFail($id);
                    $roller= Role::all();
                    return view('admin.kullanicilar.kullanici_duzenle', compact('user', 'roller'));
                }
    
                public function KullaniciGuncelle(Request $request, $id){

                     $request->validate([
                        'email' => 'required|unique:users',
                        'username' => 'required|unique:users',
                        'telefon' => 'required|unique:users',
                    ]);

                    $user = User::findOrFail($id);
                    $user->name=$request->name;
                    $user->email=$request->email;
                    $user->username=$request->username;
                    $user->telefon=$request->telefon;
                    $user->rol='admin';
                    $user->save();


                    $user->roles()->detach();
                     if($request->rol){
                        $user->assignRole((int)$request->rol);
                    }
    
                    
                    $mesaj=array(
                            'bildirim'=>'Kullanıcı başarıyla güncellendi.',
                            'alert-type'=>'success',
                    
                    );
    
                    return Redirect()->route('kullanici.liste')->with($mesaj);
                }
    
                public function KullaniciSil($id){

                    $user = User::findOrFail($id);
                    
                    if(!is_null($user)){
    
                        $user->delete();
                    }
    
                    $mesaj=array(
                            'bildirim'=>'Kullanıcı başarıyla silindi.',
                            'alert-type'=>'success',
                    
                    );
    
                    return Redirect()->back()->with($mesaj);
                }



}
