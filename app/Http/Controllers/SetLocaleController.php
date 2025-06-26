<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class SetLocaleController extends Controller
{
    public function index($locale)
    {
        // Vérifie que la langue demandée est bien prise en charge
        if (!in_array($locale, ['fr', 'en'])) {
            $locale = 'fr';
        }

        // Change la locale et stocke-la en session
        App::setLocale($locale);
        Session::put('locale', $locale);

        // Redirige vers la page précédente
        return redirect()->back();
    }
}
