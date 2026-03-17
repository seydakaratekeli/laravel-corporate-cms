<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogkategori;

use Illuminate\Support\Carbon;



class BlogkategoriController extends Controller
{
    //
        public function BlogListe(){
            $blogListe = Blogkategori::latest()->get();
            return view('admin.blogkategoriler.blog_liste', compact('blogListe'));
        }


        public function BlogKategoriDurum(Request $request){
            $urun    = Blogkategori::find($request->urun_id);
            $urun->durum = $request->durum;
            $urun->save();

            return response()->json(['success' => 'Başarılı.']);

        }



        public function BlogKategoriEkle(){
            return view('admin.blogkategoriler.blog_kategori_ekle');
        }



        public function BlogKategoriForm(Request $request){

        $request->validate([
            'kategori_adi'=>'required',
           
        ],[
            'kategori_adi.required'=>'Kategori adı boş geçilemez.',
          
        ]);

                Blogkategori::insert([
                    'kategori_adi'=>$request->kategori_adi,
                    'url'=>str()->slug( $request->kategori_adi),
                    'sirano'=>$request->sirano,
                   
                    'durum'=>1,
                    'created_at'=>Carbon::now(),
                    
                ]);
    
                $mesaj=array(
                        'bildirim'=>'Blog Kategori başarıyla eklendi.',
                        'alert-type'=>'success',
                
                );
           
            return Redirect()->route('blog.liste')->with($mesaj);
        
     }

   public function BlogKategoriDuzenle($id){
            $BlogKategoriDuzenle = Blogkategori::findOrFail($id);
            return view('admin.blogkategoriler.blog_kategori_duzenle', compact('BlogKategoriDuzenle'));
        }

    public function BlogKategoriGuncelle(Request $request){
        $request->validate([
    
            'kategori_adi' => 'required',
        ],[
            'kategori_adi.required' => 'Kategori adı boş geçilemez.',
        ]);

        $kategori_id = $request->id;

        Blogkategori::findOrFail($kategori_id)->update([
            'kategori_adi' => $request->kategori_adi,
            'url' => str()->slug($request->kategori_adi),
            'sirano' => $request->sirano,
        ]);

        $mesaj = array(
            'bildirim' => 'Blog kategori başarıyla güncellendi.',
            'alert-type' => 'success',
        );

        return Redirect()->route('blog.liste')->with($mesaj);
    }





        public function BlogKategoriSil($id){

            Blogkategori::findOrFail($id)->delete();
    
            $mesaj = array(
                'bildirim' => 'Blog kategori başarıyla silindi.',
                'alert-type' => 'success',
            );
    
            return Redirect()->back()->with($mesaj);
        }



}
