<?php

namespace App\Http\Controllers\Dene;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeneController extends Controller
{
    public function iletfonksiyon()
    {
        return view('iletisim');
    }
    public function hakfonksiyon()
    {
        return view('hakkimizda');
    }
}
