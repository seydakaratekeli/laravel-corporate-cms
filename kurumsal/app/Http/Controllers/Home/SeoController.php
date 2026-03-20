<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;
use Image;
use Illuminate\Support\Carbon;

class SeoController extends Controller
{
    public function SeoDuzenle()
    {
        $seo = Seo::find(1);
        return view('admin.anasayfa.seo', compact('seo'));
    }

    public function SeoGuncelle(Request $request)
    {
        $seo_id = $request->id;
        $eski_resim = $request->onceki_resim;

         if ($request->file('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();

            Image::read($resim)->resize(197,47)->save('upload/' . $resimadi);
            $resim_kaydet = 'upload/' . $resimadi;

            if (file_exists($eski_resim)) {
                unlink($eski_resim);
            }

            Seo::findOrFail($seo_id)->update([
                'title' => $request->title,
                'site_adi' => $request->site_adi,
                'aciklama' => $request->aciklama,
                 'author' => $request->author,
                'keywords' => $request->keywords,
                'logo' => $resim_kaydet,
                'harita' => $request->harita,
                'created_at' => Carbon::now('Europe/Istanbul'),

                
            ]);

            $mesaj = array(
                'bildirim' => 'Seo ayarları resim ile başarıyla güncellendi.',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($mesaj);
        } 
        else {
             Seo::findOrFail($seo_id)->update([
                'title' => $request->title,
                'site_adi' => $request->site_adi,
                'aciklama' => $request->aciklama,
                 'author' => $request->author,
                'keywords' => $request->keywords,
                'harita' => $request->harita,
                'created_at' => Carbon::now('Europe/Istanbul'),
            ]);

        $mesaj = array(
            'bildirim' => 'Seo ayarları başarıyla güncellendi.',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($mesaj);
    }
}
}