<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surec;
use Illuminate\Support\Carbon;

class SurecController extends Controller
{
    public function SurecListe(){
        $surecler = Surec::latest()->get();
        return view('admin.surecler.surec_liste', compact('surecler'));
    }

    public function SurecDurum(Request $request){
        $surec = Surec::find($request->urun_id);
        if (!$surec) {
            return response()->json(['error' => 'Süreç bulunamadı.'], 404);
        }

        $surec->durum = $request->durum;
        $surec->save();
        return response()->json(['success' => 'Süreç durumu başarıyla güncellendi.']);
    }

    public function SurecEkle(){
        return view('admin.surecler.surec_ekle');
    }

    public function SurecForm(Request $request){

        $request->validate([
            'surec' => 'required',
            
            'aciklama' => 'max:220',
           

           
        ]
        ,[
            'surec.required' => 'Süreç adı alanı zorunludur.',

            'aciklama.max' => 'Açıklama alanı en fazla 220 karakter olabilir.',
           
        ]);

        Surec::insert([
            'surec' => $request->surec,
            'baslik' => $request->baslik,
            'aciklama' => $request->aciklama,
            'sirano' => $request->sirano,

            'durum' => 1,
        
            'created_at' => Carbon::now('Europe/Istanbul'),
        ]);

        //bildirm
        $mesaj=array(
                'bildirim'=>'Süreç başarıyla eklendi.',
                'alert-type'=>'success',    
        );
        //bildirim
        return redirect()->route('surec.liste')->with('success', 'Süreç başarıyla eklendi.');
    }

    public function SurecDuzenle($id){
        $surecduzenle = Surec::findOrFail($id);
        return view('admin.surecler.surec_duzenle', compact('surecduzenle'));
    }

    public function SurecGuncelle(Request $request){
        $surec_id = $request->id;

        $request->validate([
            'aciklama' => 'max:220',
        ]
        ,[
            'aciklama.max' => 'Açıklama alanı en fazla 220 karakter olabilir.',
        ]);

        $surec_id = $request->id;

        Surec::findOrFail($surec_id)->update([
            'surec' => $request->surec,
            'baslik' => $request->baslik,
            'aciklama' => $request->aciklama,
            'sirano' => $request->sirano,
            'updated_at' => Carbon::now('Europe/Istanbul'),
        ]);

        //bildirm
        $mesaj=array(
                'bildirim'=>'Süreç başarıyla güncellendi.',
                'alert-type'=>'success',    
        );
        //bildirim
        return redirect()->route('surec.liste')->with($mesaj);
    }



    public function SurecSil($id){
        Surec::findOrFail($id)->delete();

        //bildirm
        $mesaj=array(
                'bildirim'=>'Süreç başarıyla silindi.',
                'alert-type'=>'success',    
        );
        //bildirim
        return redirect()->back()->with($mesaj);
    }
}
