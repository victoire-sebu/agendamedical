<?php

namespace App\Http\Controllers;

use App\Models\PriseCharge;
use Illuminate\Http\Request;

class priseEnchargeController extends Controller
{
    public function index()
    {
        $prisecharges=PriseCharge::all();
        return view('pages.priseEnCharge.index',['prisecharges'=>$prisecharges]);
    }

    public function create()
    {
        return view('pages.priseEnCharge.create');
    }

    
    public function store(Request $request)
    {
        
        $image=$request->file('image');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $prisecharges = new PriseCharge();
        $prisecharges->image='images/'.$imageName;
        $prisecharges->nom_patient=$request->nom_patient;
        $prisecharges->nom_medecin=$request->nom_medecin;
        $prisecharges->date_signature=$request->date_signature;
        $prisecharges->save();
        
        return redirect()->route('prisechargeIndex');
    } 

    
   

    public function show($id)
    {
        $prisecharges=PriseCharge::findOrFail($id);
        return view('pages.priseEnCharge.show',['prisecharges'=>$prisecharges]);
    }

   
    public function edit($id)
    {
        $prisecharges=PriseCharge::findOrFail($id);
        return view('pages.priseEnCharge.edit',['prisecharges'=>$prisecharges]);
    }

    
    public function update(Request $request, $id)
    {
        $prisecharges=PriseCharge::findOrFail($id);

        $image=$request->file('image');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        
        $prisecharges->update([
            'nom_patient'=>$request->nom_patient,
            'nom_medecin'=>$request->nom_medecin,
            'date_signature'=>$request->date_signature,
            'image'=>'images/'.$imageName,
        ]);
        
        return redirect()->route('prisechargeIndex');

    }

   
    public function destroy($id)
    {
        //
    }
}
