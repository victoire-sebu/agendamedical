<?php

namespace App\Http\Controllers;

use App\Models\OrdonnancementPaiement;
use Illuminate\Http\Request;

class ordonnancePaiementController extends Controller
{
    public function index()
    {
        $ordonnacepaies=OrdonnancementPaiement::all();
        return view('pages.ordonnancePaiement.index',['ordonnacepaies'=>$ordonnacepaies]);
    }

    public function create()
    {
        return view('pages.ordonnancePaiement.create');
    }

    
    public function store(Request $request)
    {
        
        $image=$request->file('image');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $ordonnacepaie = new OrdonnancementPaiement();
        $ordonnacepaie->image='images/'.$imageName;
        $ordonnacepaie->nom_patient=$request->nom_patient;
        $ordonnacepaie->num_ordonnance=$request->num_ordonnance;
        $ordonnacepaie->date_signature=$request->date_signature;
        $ordonnacepaie->save();
        
        return redirect()->route('ordonnancepaieIndex');
    } 

    
   

    public function show($id)
    {
        $ordonnacepaies=OrdonnancementPaiement::findOrFail($id);
        return view('pages.ordonnancePaiement.show',['ordonnacepaies'=>$ordonnacepaies]);
    }

   
    public function edit($id)
    {
        $ordonnacepaies=OrdonnancementPaiement::findOrFail($id);
        return view('pages.ordonnancePaiement.edit',['ordonnacepaies'=>$ordonnacepaies]);
    }

    
    public function update(Request $request, $id)
    {
        $ordonnacepaies=OrdonnancementPaiement::findOrFail($id);

        $image=$request->file('image');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        
        $ordonnacepaies->update([
            'nom_patient'=>$request->nom_patient,
            'hotital_centre'=>$request->num_ordonnance,
            'date_signature'=>$request->date_signature,
            'image'=>'images/'.$imageName,
        ]);
        
        return redirect()->route('ordonnancepaieIndex');

    }

   
    public function destroy($id)
    {
        //
    }
}
