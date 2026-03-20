<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

            //rollere izin verme
            public function RolIzinVerme(){

                $roller = Role::all();
                $izinler = Permission::all();
                $izin_gruplari = User::IzinGruplari();
                
                return view('admin.rol.rol_izin_ver', compact('roller', 'izinler', 'izin_gruplari'));
            }

            public function RolYetkiVer(Request $request){
                $data=array();

                $yetkiler = $request->yetki;

                foreach($yetkiler as $key => $item){
                    $data['role_id'] = $request->rol_id;
                    $data['permission_id'] = $item;
                    DB::table('role_has_permissions')->insert($data);
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





}
