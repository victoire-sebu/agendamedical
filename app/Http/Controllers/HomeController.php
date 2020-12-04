<?php

namespace App\Http\Controllers;

use App\Models\BonEnvoi;
use App\Models\BonSortie;
use App\Models\FactureProf;
use App\Models\OrdonnancementPaiement;
use App\Models\PriseCharge;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bonenvois=BonEnvoi::all();
        $bonsorties=BonSortie::all();
        $factureprofs=FactureProf::all();
        $priseencharges=PriseCharge::all();
        $ordonnancepaies=OrdonnancementPaiement::all();

        return view('dashboard',['bonenvois'=>$bonenvois,
            'bonsorties'=>$bonsorties,'factureprofs'=>$factureprofs,
            'priseencharges'=>$priseencharges,
            'ordonnancepaies'=>$ordonnancepaies]);
    }
}
