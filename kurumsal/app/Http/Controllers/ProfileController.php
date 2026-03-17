<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */

    //resim yükle
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $id = Auth::user()->id;
        $bilgi=User::find($id);

        if ($request->file('resim')) {
           
        $resim = $request->file('resim');
        $resimadi=date('YmdHis').'.'.$resim->getClientOriginalExtension();
        $resim->move(public_path('upload/admin'),$resimadi);
        $bilgi['resim']=$resimadi;

        }

        $bilgi->save();
//resim yükle
//bildirim
         $mesaj=array(
                'bildirim'=>'Profiliniz başarıyla güncellendi.',
                'alert-type'=>'success',
          
        );

//bildirim


        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated')->with($mesaj);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        //bildirim
         $mesaj=array(
                'bildirim'=>'Hesap Kalıcı Olarak Silindi.',
                'alert-type'=>'error',
          
        );

//bildirim

        return Redirect::to('/login')->with($mesaj);
    }
}
