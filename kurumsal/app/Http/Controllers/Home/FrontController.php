<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\Kategoriler;
use App\Models\Altkategoriler;
use App\Models\Urunler;
use App\Models\Blogicerik;
use App\Models\Blogkategori;





class FrontController extends Controller
{
    public function urunDetay($id, $url)
    {
        $urunler = Urunler::findOrFail($id);
        $etiketler =$urunler->tag;
        
        $etiket = explode(',', $etiketler);
        return view('frontend.urunler.urun_detay', compact('urunler', 'etiket'));
    }

    public function kategoriDetay(Request $request, $id, $url)
    {
        $urunler = Urunler::where('durum', 1)->where('kategori_id', $id)->orderBy('sirano', 'ASC')->get();
         $kategoriler = Kategoriler::orderBy('kategori_adi', 'ASC')->get();
         $kategori= Kategoriler::where('id', $id)->first();

       
        return view('frontend.urunler.kategori_detay', compact('urunler', 'kategoriler', 'kategori'));
    }


    public function AltDetay(Request $request, $id, $url)
    {
        $urunler = Urunler::where('durum', 1)->where('altkategori_id', $id)->orderBy('sirano', 'ASC')->get();
         $altkategoriler = Altkategoriler::orderBy('altkategori_adi', 'ASC')->get();

         $altkategoriler = Altkategoriler::where('id', $id)->first();

        return view('frontend.urunler.altkategori_detay', compact('urunler', 'altkategoriler', 'altkategori'));
    }

    public function IcerikDetay($id, $url)
    {
        $icerikHepsi=Blogicerik::where('durum', 1)->orderBy('sirano', 'ASC')->limit(5)-> get();
         $kategoriler = Blogkategori::where('durum', 1)->orderBy('sirano', 'ASC')-> get();
         $icerik= Blogicerik::with('kategoriler')->findOrFail($id);

        if ($icerik->url !== $url) {
            return redirect(url('post/' . $icerik->id . '/' . $icerik->url), 301);
        }

        $etiket =$icerik->tag;
        
        $etiketler = explode(',', $etiket);


        return view('frontend.blog.icerik_detay', compact('icerikHepsi','icerik','kategoriler', 'etiketler'));
    }

    public function BlogKategoriDetay($id, $url){
        $kategoriAdi= Blogkategori::findOrfail($id);

        if ($kategoriAdi->url !== $url) {
            return redirect(url('blog/' . $kategoriAdi->id . '/' . $kategoriAdi->url), 301);
        }
        
        $blogpost= Blogicerik::where('durum', 1)->where('kategori_id', $id)->orderBy('sirano', 'ASC')-> paginate(2);
        $icerikHepsi=Blogicerik::where('durum', 1)->orderBy('sirano', 'ASC')-> get();
        $kategoriler = Blogkategori::where('durum', 1)->orderBy('sirano', 'ASC')-> get();

        return view('frontend.blog.blog_kategori_detay', compact('blogpost','icerikHepsi','kategoriler', 'kategoriAdi'));
    }

    public function BlogHepsi(){
        $kategoriler= Blogkategori::where('durum', 1)->orderBy('sirano', 'ASC')-> get();
        $icerikHepsi=Blogicerik::where('durum', 1)->orderBy('sirano', 'ASC')-> paginate(2);
        return view('frontend.blog.blog_hepsi', compact('kategoriler','icerikHepsi'));
    }








    public function iletisim(){
        return view('frontend.iletisim');
    }
    public function iletisimForm(Request $request){
        //form işlemleri
    }
    public function hakkimizda(){
        return view('frontend.hakkimizda');
    }
    public function referanslar(){
        return view('frontend.referanslar');
    }
    public function kategoriler(){
        $kategoriler = Kategoriler::orderBy('kategori_adi', 'ASC    ')->get();
        return view('frontend.kategoriler.kategoriler', compact('kategoriler'));
    }
       
    
}