<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Intervention\Image\Laravel\Facades\Image;
class BannerController extends Controller
{
    public function HomeBanner(){

    $homeBanner = Banner::find(1);

        return view('admin.anasayfa.banner_duzenle', compact('homeBanner'));
    }

    public function BannerGuncelle(Request $request){
        $banner_id=$request->id;

        if($request->file('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();

            Image::read($resim)->resize(636, 852)->save('upload/banner/' . $resimadi);
            $resim_kaydet='upload/banner/' . $resimadi;

            Banner::findOrFail($banner_id)->update([
                'baslik' => $request->baslik,
                'alt_baslik' => $request->alt_baslik,
                'url' => $request->url,
                'video_url' => $request->video_url,
                'resim' => $resim_kaydet,
            ]);
             $mesaj=array(
                    'bildirim'=>'Resim ile güncelleme başarılı.',
                    'alert-type'=>'success',
            
            );
            return Redirect()->back()->with($mesaj);
           
        } 
        else {
            Banner::findOrFail($banner_id)->update([
                'baslik' => $request->baslik,
                'alt_baslik' => $request->alt_baslik,
                'url' => $request->url,
                'video_url' => $request->video_url,
            ]);
             $mesaj=array(
                    'bildirim'=>'Resim olmadan güncelleme başarılı.',
                    'alert-type'=>'success',
            
            );
            return Redirect()->back()->with($mesaj);
        }



    }
}
