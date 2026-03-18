<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hakkimizda;
use App\Models\Cokluresim;

use Image;
use Illuminate\Support\Carbon;


class HakkimizdaController extends Controller
{
    public function Hakkimizda()
    {
        $hakkimizda = Hakkimizda::find(1);
        return view('admin.anasayfa.hakkimizda_duzenle', compact('hakkimizda'));
    }

    public function HakkimizdaGuncelle(Request $request)
    {
        $hakkimizda_id = $request->id;
        $eski_resim = $request->onceki_resim;

        if ($request->file('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();

            Image::read($resim)->resize(523, 605)->save('upload/hakkimizda/' . $resimadi);
            $resim_kaydet = 'upload/hakkimizda/' . $resimadi;
                if (file_exists($eski_resim)) {
                    unlink($eski_resim);
                }

            Hakkimizda::findOrFail($hakkimizda_id)->update([
                'baslik' => $request->baslik,
                'kisa_baslik' => $request->kisa_baslik,
                'kisa_aciklama' => $request->kisa_aciklama,
                'aciklama' => $request->aciklama,
                
                'resim' => $resim_kaydet,
            ]);
            $mesaj = array(
                'bildirim' => 'Resim ile güncelleme başarılı.',
                'alert-type' => 'success',

            );
            return Redirect()->back()->with($mesaj);

        } else {
            Hakkimizda::findOrFail($hakkimizda_id)->update([
                'baslik' => $request->baslik,
                'kisa_baslik' => $request->kisa_baslik,
                'kisa_aciklama' => $request->kisa_aciklama,
                'aciklama' => $request->aciklama,
                
            ]);
            $mesaj = array(
                'bildirim' => 'Resim olmadan güncelleme başarılı.',
                'alert-type' => 'success',

            );
            return Redirect()->back()->with($mesaj);
        }
    } 
    
    public function HakkimizdaFront()
    {
        $hakkimizda = Hakkimizda::find(1);
        return view('frontend.anasayfa.hakkimizda', compact('hakkimizda'));
    }

    // cıklu resim alanı
    public function Cokluresim(){
        return view('admin.anasayfa.coklu_resim');
    }

    public function CokluForm(Request $request){

        $request->validate([
            'resim' => 'required|array|min:1',
            'resim.*' => 'image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        ],[
            'resim.required' => 'Lutfen en az bir resim seciniz.',
            'resim.array' => 'Resim alani gecersiz.',
            'resim.min' => 'Lutfen en az bir resim seciniz.',
            'resim.*.image' => 'Yuklenen dosyalar resim olmalidir.',
            'resim.*.mimes' => 'Resimler jpg, jpeg, png, webp veya gif formatinda olmalidir.',
            'resim.*.max' => 'Her bir resim en fazla 2MB olabilir.',
        ]);

        $resimler = $request->file('resim', []);

        foreach($resimler as $resim){
            

            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            Image::read($resim)->resize(220, 220)->save('upload/coklu/' . $resimadi);
            $resim_kaydet = 'upload/coklu/' . $resimadi;

            Cokluresim::insert([
                'resim' => $resim_kaydet,
                'created_at' => Carbon::now(),
            ]);
        }
        

        $mesaj = array(
            'bildirim' => 'Çoklu resimler başarıyla eklendi.',
            'alert-type' => 'success',

        );
        return Redirect()->route('coklu.liste')->with($mesaj);
    }

    public function CokluListe(){
        $coklu_resimler = Cokluresim::all();   
        return view('admin.anasayfa.coklu_liste', compact('coklu_resimler'));
    }

        public function CokluDuzenle(Request $request, $id){

            $request->validate([
                'resim' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            ],[
                'resim.required' => 'Lutfen bir resim seciniz.',
                'resim.image' => 'Yuklenen dosya resim olmalidir.',
                'resim.mimes' => 'Resim jpg, jpeg, png, webp veya gif formatinda olmalidir.',
                'resim.max' => 'Resim en fazla 2MB olabilir.',
            ]);

            $id=$request->id;
            $eski_resim=$request->onceki_resim;

            if($request->file('resim')) {
                $resim = $request->file('resim');
                $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();

                Image::read($resim)->resize(222, 222)->save('upload/coklu/' . $resimadi);
                $resim_kaydet = 'upload/coklu/' . $resimadi;

                    if (file_exists($eski_resim)) {
                        unlink($eski_resim);
                    }

                Cokluresim::findOrFail($id)->update([
                    'resim' => $resim_kaydet,
                    'updated_at' => Carbon::now(),
                ]);
                $mesaj = array(
                    'bildirim' => 'Çoklu resim başarıyla güncellendi.',
                    'alert-type' => 'success',

                );
                return Redirect()->route('coklu.liste')->with($mesaj);

            } 
        }

        public function CokluSil($id){
            $coklu_resimler = Cokluresim::findOrFail($id);
            $resim_yolu = $coklu_resimler->resim;

            if (file_exists($resim_yolu)) {
                unlink($resim_yolu);
            }

            Cokluresim::findOrFail($id)->delete();

            $mesaj = array(
                'bildirim' => 'Çoklu resim başarıyla silindi.',
                'alert-type' => 'success',

            );
            return Redirect()->back()->with($mesaj);
        }
}
