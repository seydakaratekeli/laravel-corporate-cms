<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogicerik;
use App\Models\Blogkategori;

use Illuminate\Support\Carbon;
use Intervention\Image\Laravel\Facades\Image;

class BlogicerikController extends Controller
{
    public function IcerikListe(){
        $blogicerik=Blogicerik::latest()->get();
        return view('admin.blogicerik.blog_icerik_liste', compact('blogicerik'));
    }

    public function BlogicerikEkle(){
        $kategoriler = Blogkategori::latest()->get();
        return view('admin.blogicerik.blog_icerik_ekle', compact('kategoriler'));
    }


    public function BlogicerikEkleForm(Request $request){
        $request->validate([
            'baslik'=>'required',
            'resim'=>'required|mimes:jpg,jpeg,png,webp',
        ],[
            'baslik.required'=>'Başlık boş olamaz.',
            'resim.required'=>'Resim boş olamaz.',
            'resim.mimes'=>'Resim formatı jpg, jpeg, png veya webp olmalıdır.',
        ]);

        $resim = $request->file('resim');
        $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();

        Image::read($resim)->resize(700, 370)->save('upload/blogicerik/' . $resimadi);
        $resim_kaydet='upload/blogicerik/' . $resimadi;

                Blogicerik::insert([
                    'kategori_id'=>$request->kategori_id,
                    'baslik'=>$request->baslik,
                   'url'=>str()->slug( $request->baslik),
                    'tag'=>$request->tag,
                    'metin'=>$request->metin,
                    'anahtar'=>$request->anahtar,
                    'aciklama'=>$request->aciklama,
                    'resim'=>$resim_kaydet,
                    'sirano'=>$request->sirano,
                    'durum'=>1,
                    'created_at'=>Carbon::now(),
                    
                ]);
    
                $mesaj=array(
                        'bildirim'=>'Blog içerik başarıyla eklendi.',
                        'alert-type'=>'success',
                );
                return Redirect()->route('icerik.liste')->with($mesaj);
    }

    public function BlogicerikDuzenle($id){
        $kategoriler = Blogkategori::latest()->get();
        $icerikler=Blogicerik::findOrFail($id);
        return view('admin.blogicerik.blog_icerik_duzenle', compact('kategoriler','icerikler'));
    }







    public function BlogicerikGuncelleForm(Request $request){
        $request->validate([
            'baslik'=>'required',
        ],[
            'baslik.required'=>'Başlık boş olamaz.',
        ]);

        $urun_id=$request->id;
        $eski_resim=$request->onceki_resim;

        if($request->file('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();

            Image::read($resim)->resize(700, 370)->save('upload/blogicerik/' . $resimadi);
            $resim_kaydet='upload/blogicerik/' . $resimadi;

            if (file_exists($eski_resim)) {
                unlink($eski_resim);
            }




            Blogicerik::findOrFail($urun_id)->update([
                'kategori_id'=>$request->kategori_id,
                'baslik'=>$request->baslik,
                'url'=>str()->slug( $request->baslik),
                'tag'=>$request->tag,
                'metin'=>$request->metin,
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'resim'=>$resim_kaydet,
                'sirano'=>$request->sirano,
                
            ]);
             $mesaj=array(
                    'bildirim'=>'Resim ile güncelleme başarılı.',
                    'alert-type'=>'success',
            
            );
            return Redirect()->route('icerik.liste')->with($mesaj);
           
        } 
        else {

            Blogicerik::findOrFail($urun_id)->update([
                'kategori_id'=>$request->kategori_id,
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
            return Redirect()->route('icerik.liste')->with($mesaj);
        }
    }   

public function BlogicerikDurum(Request $request){


    $urun =Blogicerik::findOrFail($request->urun_id);
    $urun->durum=$request->durum;
    $urun->save();

    return response()->json(['success'=>'Durum güncellendi.']);
   

}















    public function BlogicerikSil($id){
        $urun_id=Blogicerik::findOrFail($id);

        $resim=$urun_id->resim;

        if (file_exists($resim)) {
            unlink($resim);
        }


        Blogicerik::findOrFail($id)->delete();

        $mesaj=array(
            'bildirim'=>'Blog içerik başarıyla silindi.',
            'alert-type'=>'success',
    
    );
    return Redirect()->back()->with($mesaj);
    }   


}
