<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategoriler;
use Illuminate\Support\Carbon;
use Intervention\Image\Laravel\Facades\Image;

class KategoriController extends Controller
{
    public function KategoriHepsi(){

       //latest() ile son eklenen veriyi getiririz
        $kategorihepsi = Kategoriler::latest()->get();
        return view('admin.kategoriler.kategoriler_hepsi', compact('kategorihepsi'));
    }// fonksiyon bitti


    public function KategoriEkle() {

    return view ('admin.kategoriler.kategori_ekle');

    }

    public function KategoriEkleForm(Request $request) {
        $request->validate([
            'kategori_adi'=>'required',
            'anahtar'=>'required',
            'sirano'=>'required|integer',
        ],[
            'kategori_adi.required'=>'Kategori adı boş geçilemez.',
            'anahtar.required'=>'Anahtar boş geçilemez.',
            'sirano.required'=>'Sıra no boş geçilemez.',
            'sirano.integer'=>'Sıra no bir tam sayı olmalıdır.'
        ]);

        if($request->file('resim')){
            $resim=$request->file('resim');
            $resimadi=hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();

            Image::read($resim)->resize(700,400)->save('upload/kategoriler/'.$resimadi);
            $resim_kaydet='upload/kategoriler/'.$resimadi;

            
            Kategoriler::insert([
                'kategori_adi'=>$request->kategori_adi,
                'kategori_url'=>str()->slug( $request->kategori_adi),
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'resim'=>$resim_kaydet,
                'durum'=>1,
                'sirano'=>$request->sirano,
                'created_at'=>Carbon::now(),
                
            ]);

             $mesaj=array(
                    'bildirim'=>'Kategori başarıyla eklendi.',
                    'alert-type'=>'success',
            
            );

            return Redirect()->route('kategori.hepsi')->with($mesaj);
        } else {
            Kategoriler::insert([
                'kategori_adi'=>$request->kategori_adi,
                'kategori_url'=>str()->slug( $request->kategori_adi),
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'durum'=>1,
                'sirano'=>$request->sirano,
                'created_at'=>Carbon::now(),

                
            ]);

                $mesaj=array(
                        'bildirim'=>'Kategori başarıyla eklendi. Resim eklenmedi.',
                        'alert-type'=>'success',
                
                );

                return Redirect()->route('kategori.hepsi')->with($mesaj);
        }
    }

    public function KategoriDuzenle($id){
        $KategoriDuzenle=Kategoriler::findOrFail($id);
        return view('admin.kategoriler.kategori_duzenle', compact('KategoriDuzenle'));
    }

    public function KategoriGuncelleForm(Request $request){

          $request->validate([
            'kategori_adi'=>'required',
            'anahtar'=>'required',
            'aciklama'=>'required',
            'resim'=>'required|mimes:jpg,jpeg,png',
            'sirano'=>'required|integer',
        ],[
            'kategori_adi.required'=>'Kategori adı boş geçilemez.',
            'anahtar.required'=>'Anahtar boş geçilemez.',
            'aciklama.required'=>'Açıklama boş geçilemez.',
            'resim.required'=>'Resim boş geçilemez.',
            'resim.mimes'=>'Resim formatı jpg, jpeg veya png olmalıdır.',
            'sirano.required'=>'Sıra no boş geçilemez.',
            'sirano.integer'=>'Sıra no bir tam sayı olmalıdır.'
        ]);


        $kategori_id=$request->id;
        $eski_resim=$request->onceki_resim;

        if($request->file('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();

            Image::read($resim)->resize(700, 400)->save('upload/kategoriler/' . $resimadi);
            $resim_kaydet='upload/kategoriler/' . $resimadi;

            //eski resim varsa sil
            if(file_exists($eski_resim)){
                unlink($eski_resim);
            }

            Kategoriler::findOrFail($kategori_id)->update([
                'kategori_adi' => $request->kategori_adi,
                'kategori_url' => str()->slug($request->kategori_adi),
                'anahtar' => $request->anahtar,
                'aciklama' => $request->aciklama,
                'resim' => $resim_kaydet,
                'sirano' => $request->sirano,
            ]);
             $mesaj=array(
                    'bildirim'=>'Resim ile güncelleme başarılı.',
                    'alert-type'=>'success',
            
            );
            return Redirect()->route('kategori.hepsi')->with($mesaj);
           
        } 
        else {
            Kategoriler::findOrFail($kategori_id)->update([
                'kategori_adi' => $request->kategori_adi,
                'kategori_url' => str()->slug($request->kategori_adi),
                'anahtar' => $request->anahtar,
                'aciklama' => $request->aciklama,
                'sirano' => $request->sirano,
            ]);
             $mesaj=array(
                    'bildirim'=>'Resim olmadan güncelleme başarılı.',
                    'alert-type'=>'success',
            
            );
            return Redirect()->route('kategori.hepsi')->with($mesaj);
        }
    }

    public function KategoriSil($id){

        $kategori_id=Kategoriler::findOrFail($id);

        //resmi sil klasörden
        $resim=$kategori_id->resim;
        if(file_exists($resim)){
            unlink($resim);
        }
        //veritabanından sil
         Kategoriler::findOrFail($id)->delete();

  

         $mesaj=array(
                'bildirim'=>'Kategori başarıyla silindi.',
                'alert-type'=>'success',
        
        );

        return Redirect()->back()->with($mesaj);
    }
    public function KategoriDurum(Request $request){
        $urun = Kategoriler::find($request->id);
        $urun->durum = $request->durum;
        $urun->save();

        Kategoriler::where('id', $kategori_id)->update(['durum'=>$durum]);
    }



} //class bitti
