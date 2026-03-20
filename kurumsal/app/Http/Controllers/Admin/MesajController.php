<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mesaj;
use Illuminate\Support\Carbon;

class MesajController extends Controller
{
    public function Iletisim(){
        $mesajlar = Mesaj::latest()->get();
        return view('frontend.mesaj.iletisim');
    }

    public function TeklifFormu(Request $request){
        $validated = $request->validate([
            'adi' => 'required',
            'email' => 'required|email',
            'telefon' => 'required|digits:11|numeric',
            'konu' => 'required',
            'mesaj' => 'required',
        ],[
            'adi.required' => 'Ad alanı zorunludur.',
            'email.required' => 'Email alanı zorunludur.',
            'email.email' => 'Geçerli bir email adresi giriniz.',
            'telefon.required' => 'Telefon alanı zorunludur.',
            'telefon.digits' => 'Telefon numarası 11 haneden oluşmalıdır.',
            'telefon.numeric' => 'Telefon numarası sadece rakamlardan oluşmalıdır.',
            'konu.required' => 'Konu alanı zorunludur.',
            'mesaj.required' => 'Mesaj alanı zorunludur.',
        ]);

        Mesaj::create($validated);

        //bildirm
        $mesaj=array(
                'bildirim'=>'Teklifiniz başarıyla gönderildi.',
                'alert-type'=>'success',
          
        );
//bildirim      

        return redirect()->back()->with($mesaj);
    }   
}
