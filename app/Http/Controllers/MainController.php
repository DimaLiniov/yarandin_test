<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    public function changeLocale($locale)
    {
        session(['locale' => $locale]);
        App::setLocale($locale);
        $currentLocale = App::getLocale();
        return redirect()->back();
    }

}
