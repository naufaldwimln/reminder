<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralApp;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        dd('Masuk');
        $shop = Shop::first();
        return view('layouts.frontend.dashboard')
            ->with('general_app', GeneralApp::first())
            ->with('header', Header::first())
            ->with('slider', Slider::where('status', 'on')->get())
            ->with('work', Work::first())
            ->with('work_detail', WorkDetail::get())
            ->with('portofolio', Portofolio::first())
            ->with('portofolio_detail', PortofolioDetail::limit(8)->get())
            ->with('service', Services::first())
            ->with('service_detail', ServicesDetail::limit(6)->get())
            ->with('artikel', Artikel::first())
            ->with('artikel_detail', ArtikelDetail::artikelDetail())
            ->with('shop', $shop)
            ->with('product', Product::getDataProduct())
            ->with('client', Clients::where('status', '1')->get());
    }
}
