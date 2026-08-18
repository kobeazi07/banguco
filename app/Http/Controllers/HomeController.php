<?php

namespace App\Http\Controllers;

use App\Models\SettingModel;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function home()
    {
        $setting = SettingModel::first();
        $faqs = Faq::get();
        $nowa = preg_replace('/[^0-9]/', '', $setting->nowa);
        $pesanWa = urlencode($setting->text_wa);
        if (str_starts_with($nowa, '0')) {
            $nowa = '62' . substr($nowa, 1);
        }
        return view('frontend.pages.home', compact('setting', 'nowa', 'faqs', 'pesanWa'));
    }
    public function about()
    {
        return view('frontend.pages.about');
    }
    public function layanan()
    {
        return view('frontend.pages.layanan');
    }
}
