<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\Altkategoriler;
use App\Models\Kategoriler;

use Illuminate\Support\Carbon;

class AltkategoriController extends Controller
{


   

    public function AltkategoriListe(){
        $altkategoriler = Altkategoriler::orderBy('sirano', 'asc')->orderBy('id', 'desc')->get();
        return view('admin.altkategoriler.altkategori_liste', compact('altkategoriler'));
    }


     public function AltkategoriEkle(){
        $kategorigoster = Kategoriler::orderBy('kategori_adi', 'ASC')->get();
        return view('admin.altkategoriler.altkategori_ekle', compact('kategorigoster'));
    }



     
    

     public function AltkategoriEkleForm(Request $request){

        $request->validate([
            'altkategori_adi'=>'required',
            'anahtar'=>'required',
            'aciklama'=>'required',
            'resim'=>'required|mimes:jpg,jpeg,png',
            'sirano'=>'required|integer',
        ],[
            'altkategori_adi.required'=>'Alt kategori adı boş geçilemez.',
            'anahtar.required'=>'Anahtar boş geçilemez.',
            'aciklama.required'=>'Açıklama boş geçilemez.',
            'resim.required'=>'Resim boş geçilemez.',
            'resim.mimes'=>'Resim formatı jpg, jpeg veya png olmalıdır.',
            'sirano.required'=>'Sıra no boş geçilemez.',
            'sirano.integer'=>'Sıra no bir tam sayı olmalıdır.'
        ]);

        if($request->file('resim')){
            $resim=$request->file('resim');
            $resimadi=hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();

            Image::read($resim)->resize(700,400)->save('upload/altkategoriler/'.$resimadi);
            $resim_kaydet='upload/altkategoriler/'.$resimadi;

            Altkategoriler::insert([
                'altkategori_adi'=>$request->altkategori_adi,
                'altkategori_url'=>str()->slug( $request->altkategori_adi),
                'kategori_id'=>$request->kategori_id,
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'resim'=>$resim_kaydet,
                'durum'=>1,
                'sirano'=>$request->sirano,
                'created_at'=>Carbon::now(),
                
            ]);

             $mesaj=array(
                    'bildirim'=>'Alt kategori başarıyla eklendi.',
                    'alert-type'=>'success',
            
            );

            return Redirect()->route('altkategori.liste')->with($mesaj);
        } else {
            Altkategoriler::insert([
                'altkategori_adi'=>$request->altkategori_adi,
                'altkategori_url'=>str()->slug( $request->altkategori_adi),
                'kategori_id'=>$request->kategori_id,
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'durum'=>1,
                'sirano'=>$request->sirano,
                'created_at'=>Carbon::now(),
                
            ]);

                $mesaj=array(
                        'bildirim'=>'Alt kategori başarıyla eklendi. Resim eklenmedi.',
                        'alert-type'=>'success',
                
                );

                return Redirect()->route('altkategori.liste')->with($mesaj);
        }


     }

      public function AltkategoriDuzenle($id){
        $kategoriler = Kategoriler::orderBy('kategori_adi', 'ASC')->get();
         $altkategoriler = Altkategoriler::findOrFail($id);
        return view('admin.altkategoriler.altkategori_duzenle', compact('altkategoriler','kategoriler'));
    }



     public function AltkategoriGuncelle(Request $request){
         
          $request->validate([
            'altkategori_adi'=>'required',
            'anahtar'=>'required',
            'aciklama'=>'required',
            'resim'=>'nullable|mimes:jpg,jpeg,png',
                        'sirano'=>'required|integer',
        ],[
            'altkategori_adi.required'=>'Alt kategori adı boş geçilemez.',
            'anahtar.required'=>'Anahtar boş geçilemez.',
            'aciklama.required'=>'Açıklama boş geçilemez.',
                        'resim.mimes'=>'Resim formatı jpg, jpeg veya png olmalıdır.',
                        'sirano.required'=>'Sıra no boş geçilemez.',
                        'sirano.integer'=>'Sıra no bir tam sayı olmalıdır.'
        ]);


        $altkategori_id=$request->id;
        $eski_resim=$request->onceki_resim;

        if($request->file('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();

            Image::read($resim)->resize(700, 400)->save('upload/altkategoriler/' . $resimadi);
            $resim_kaydet='upload/altkategoriler/' . $resimadi;

            //eski resim varsa sil
            if(file_exists($eski_resim)){
                unlink($eski_resim);
            }

            Altkategoriler::findOrFail($altkategori_id)->update([
                'kategori_id' => $request->kategori_id,
                'altkategori_adi' => $request->altkategori_adi,
                'altkategori_url' => str()->slug($request->altkategori_adi),
                'anahtar' => $request->anahtar,
                'aciklama' => $request->aciklama,
                'resim' => $resim_kaydet,
                'sirano' => $request->sirano,
            ]);
             $mesaj=array(
                    'bildirim'=>'Resim ile güncelleme başarılı.',
                    'alert-type'=>'success',
            
            );
            return Redirect()->route('altkategori.liste')->with($mesaj);
           
        } 
        else {
            Altkategoriler::findOrFail($altkategori_id)->update([
                'kategori_id' => $request->kategori_id,
                'altkategori_adi' => $request->altkategori_adi,
                'altkategori_url' => str()->slug($request->altkategori_adi),
                'anahtar' => $request->anahtar,
                'aciklama' => $request->aciklama,
                'sirano' => $request->sirano,
            ]);
             $mesaj=array(
                    'bildirim'=>'Resim olmadan güncelleme başarılı.',
                    'alert-type'=>'success',
            
            );
            return Redirect()->route('altkategori.liste')->with($mesaj);
        }
    }

      public function AltkategoriSil($id){
         $altkategori_id=Altkategoriler::findOrFail($id);

        //resmi sil klasörden
        $resim=$altkategori_id->resim;
        if(file_exists($resim)){
            unlink($resim);
        }
        //veritabanından sil
         Altkategoriler::findOrFail($id)->delete();

  

         $mesaj=array(
                'bildirim'=>'Alt kategori başarıyla silindi.',
                'alert-type'=>'success',
        
        );

        return Redirect()->back()->with($mesaj);
        
     } //fonks bitti

     public function AltkategoriAjax($kategori_id){
        $altkgetir = Altkategoriler::where('kategori_id', $kategori_id)->orderBy('altkategori_adi', 'ASC')->get();
        return json_encode($altkgetir);
     }

     public function AltkategoriDurum(Request $request){
          $id = $request->id ?? $request->urun_id;
          $urun = Altkategoriler::find($id);
          if (!$urun) {
                return response()->json(['error' => 'Alt kategori bulunamadı.'], 404);
          }
        $urun->durum = $request->durum;
        $urun->save();

          return response()->json(['success' => 'Alt kategori durumu güncellendi.']);
     }

}
