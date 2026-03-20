<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Yorumlar;
use Illuminate\Support\Carbon;

class YorumController extends Controller
{
    //Yorumlar
    public function Yorumlar(Request $request){
        $yorumlar = Yorumlar::latest()->get();
        return view('admin.anasayfa.yorum_liste', compact('yorumlar'));
    }

    //Yorum Ekle
    public function YorumEkle(){
      
        return view('admin.anasayfa.yorum_ekle');
    }


    public function YorumForm(Request $request){

        $request->validate([
            'adi' => 'required',
         
        ],[
            'adi.required' => 'Ad Soyad boş olamaz',
          
        ]);

        Yorumlar::insert([
            'adi' => $request->adi,
            'metin' => $request->metin,
            'sirano' => $request->sirano,
            'durum' => 1,
            'created_at' => Carbon::now('Europe/Istanbul'),
        ]);

        //bildirm
        $mesaj=array(
                'bildirim'=>'Yorum başarıyla eklendi.',
                'alert-type'=>'success',
          
        );
        return Redirect()->route('yorum.liste')->with($mesaj);
    }

    public function YorumDurum(Request $request){
        $urun = Yorumlar::find($request->urun_id);
        $urun->durum = $request->durum;
        $urun->save();

        return response()->json(['success' => 'Yorum durumu başarıyla güncellendi.']);
        
    }



    public function YorumDuzenle($id){
        $yorumduzenle = Yorumlar::findOrFail($id);
        return view('admin.anasayfa.yorum_duzenle', compact('yorumduzenle'));
    
        }

    public function YorumGuncelle(Request $request){
        $request->validate([
            'metin' => 'required',
         
        ],[
            'metin.required' => 'Yorum boş olamaz',
          
        ]);
        $yorum_id=$request->id;
        Yorumlar::findOrFail($yorum_id)->update([
            'adi' => $request->adi,
            'metin' => $request->metin,
            'sirano' => $request->sirano,
            'updated_at' => Carbon::now('Europe/Istanbul'),
        ]);
        $mesaj=array(
                'bildirim'=>'Yorum başarıyla güncellendi.',
                'alert-type'=>'success',
          
        );
        return Redirect()->route('yorum.liste')->with($mesaj);
    }

     public function YorumSil($id){
        Yorumlar::findOrFail($id)->delete();

        $mesaj=array(
                'bildirim'=>'Yorum başarıyla silindi.',
                'alert-type'=>'success',
          
        );
        return redirect()->back()->with($mesaj);    
     }

}
