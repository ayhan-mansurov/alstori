<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Cookie::queue('applocale', $lang, 60 * 24 * 30); // хранить куки в течение 30 дней

        }

        return Redirect::back();
    }
}
