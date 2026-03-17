<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategoriler;
use App\Models\Altkategoriler;
use App\Models\Urunler;
use Illuminate\Support\Carbon;
use Intervention\Image\Laravel\Facades\Image;

class UrunController extends Controller
{
     public function UrunListe(){

       //latest() ile son eklenen veriyi getiririz
        $urunliste = Urunler::latest()->get();
        return view('admin.urunler.urun_liste', compact('urunliste'));
    }// fonksiyon bitti

    public function UrunDurum(Request $request){
        $urun = urunler::find($request->urun_id);
        $urun->durum = $request->durum;
        $urun->save();

        return response()->json(['success' => 'Başarılı.']);

    }


        public function UrunEkle() {
            $kategoriler = Kategoriler::latest()->get();
            return view ('admin.urunler.urun_ekle', compact('kategoriler'));
    
        }


 public function UrunEkleForm(Request $request){

        $request->validate([
            'baslik'=>'required',
           
        ],[
            'baslik.required'=>'Başlık boş geçilemez.',
          
        ]);




            $resim=$request->file('resim');
            $resimadi=hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();

            Image::read($resim)->resize(700,370)->save('upload/urunler/'.$resimadi);
            $resim_kaydet='upload/urunler/'.$resimadi;

                Urunler::insert([
                    'kategori_id'=>$request->kategori_id,
                    'altkategori_id'=>$request->altkategori_id,
                    'baslik'=>$request->baslik,
                    'url'=>str()->slug( $request->baslik),
                    'tag'=>$request->tag,
                    'metin'=>$request->metin,
                    'anahtar'=>$request->anahtar,
                    'aciklama'=>$request->aciklama,
                    'sirano'=>$request->sirano,
                    'resim'=>$resim_kaydet,
                    'durum'=>1,
                    'created_at'=>Carbon::now(),
                    
                ]);
    
                $mesaj=array(
                        'bildirim'=>'Ürün başarıyla eklendi.',
                        'alert-type'=>'success',
                
                );
           

             

            return Redirect()->route('urun.liste')->with($mesaj);
        


     }

        public function UrunDuzenle($id){
            $kategoriler = Kategoriler::latest()->get();
            $altkategoriler = Altkategoriler::latest()->get();
             $urunler = Urunler::findOrFail($id);
            return view('admin.urunler.urun_duzenle', compact('kategoriler','altkategoriler','urunler'));

}


public function UrunGuncelle(Request $request){
        $request->validate([
            'baslik'=>'required',
           
        ],[
            'baslik.required'=>'Başlık boş geçilemez.',
          
        ]);
        $urun_id=$request->id;
        $eski_resim=$request->onceki_resim;

        if($request->file('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();

            Image::read($resim)->resize(700,370)->save('upload/urunler/' . $resimadi);
            $resim_kaydet='upload/urunler/' . $resimadi;

            $eskiResimPath = public_path($eski_resim);
            if(file_exists($eskiResimPath)) {
                unlink($eskiResimPath);
            } elseif(file_exists($eski_resim)) {
                unlink($eski_resim);
            }

            Urunler::findOrFail($urun_id)->update([
                'kategori_id'=>$request->kategori_id,
                'altkategori_id'=>$request->altkategori_id,
                'baslik'=>$request->baslik,
                'url'=>str()->slug( $request->baslik),
                'tag'=>$request->tag,
                'metin'=>$request->metin,
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'sirano'=>$request->sirano,
                'resim'=>$resim_kaydet,
            ]);
            $mesaj=array(
                'bildirim'=>'Resim ile güncelleme başarılı.',
                'alert-type'=>'success',
            );
            return Redirect()->route('urun.liste')->with($mesaj);
        }
        else {
            Urunler::findOrFail($urun_id)->update([
                'kategori_id'=>$request->kategori_id,
                'altkategori_id'=>$request->altkategori_id,
                'baslik'=>$request->baslik,
                'url'=>str()->slug( $request->baslik),
                'tag'=>$request->tag,
                'metin'=>$request->metin,
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'sirano'=>$request->sirano,
            ]);
            $mesaj=array(
                'bildirim'=>'Resim olmadan güncelleme başarılı.',
                'alert-type'=>'success',
            );
            return Redirect()->route('urun.liste')->with($mesaj);
        }
}

    public function UrunSil($id){
        $urun_id=Urunler::findOrFail($id);

        //resmi sil klasörden
        $resim=$urun_id->resim;
        if(file_exists($resim)){
            unlink($resim);
        }
        //veritabanından sil
        Urunler::findOrFail($id)->delete();

         $mesaj=array(
                'bildirim'=>'Ürün başarıyla silindi.',
                'alert-type'=>'success',
          
        );
        return Redirect()->back()->with($mesaj);
    }
}