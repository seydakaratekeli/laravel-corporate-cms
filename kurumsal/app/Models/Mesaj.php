<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailGonder;
use App\Models\Footer;


class Mesaj extends Model
{
    use HasFactory;

    protected $fillable = ['adi', 'email', 'telefon', 'konu', 'mesaj'];

    public static function boot()
    {
        parent::boot();

        static::created(function ($bilgi) {
            
            $email = Footer::first(1); // Footer modelinden ilk kaydı al
            
           $adminEmail = $email->mail; // Admin email adresini Footer modelinden al

            Mail::to($adminEmail)->send(new MailGonder($bilgi));

        });
    }
}
