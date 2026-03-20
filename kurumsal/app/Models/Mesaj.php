<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailGonder;

class Mesaj extends Model
{
    use HasFactory;

    protected $fillable = ['adi', 'email', 'telefon', 'konu', 'mesaj'];

    public static function boot()
    {
        parent::boot();

        static::created(function ($bilgi) {
            
           $adminEmail = 'seyda@gmail.com';

            Mail::to($adminEmail)->send(new MailGonder($bilgi));

        });
    }
}
