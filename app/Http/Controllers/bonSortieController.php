<?php

namespace App\Http\Controllers;

use App\Models\BonSortie;
use Illuminate\Http\Request;

class bonSortieController extends Controller
{
    public function index()
    {
        $bonsorties=BonSortie::all();
        return view('pages.bonSortie.index',['bonsorties'=>$bonsorties]);
    }

    public function create()
    {
        return view('pages.bonSortie.create');
    }

    
    public function store(Request $request)
    {
        
        $image=$request->file('image');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $bonsortie = new BonSortie();
        $bonsortie->image='images/'.$imageName;
        $bonsortie->nom_patient=$request->nom_patient;
        $bonsortie->hotital_centre=$request->hotital_centre;
        $bonsortie->date_signature=$request->date_signature;
        $bonsortie->save();
        
        return redirect()->route('bonsortieIndex');
    } 

    
   

    public function show($id)
    {
        $bonsorties=BonSortie::findOrFail($id);
        return view('pages.bonSortie.show',['bonsorties'=>$bonsorties]);
    }

   
    public function edit($id)
    {
        $bonsorties=BonSortie::findOrFail($id);
        return view('pages.bonSortie.edit',['bonsorties'=>$bonsorties]);
    }

    
    public function update(Request $request, $id)
    {
        $bonsorties=BonSortie::findOrFail($id);

        $image=$request->file('image');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        
        $bonsorties->update([
            'nom_patient'=>$request->nom_patient,
            'hotital_centre'=>$request->hotital_centre,
            'date_signature'=>$request->date_signature,
            'image'=>'images/'.$imageName,
        ]);
        
        return redirect()->route('bonsortieIndex');

    }

   
    public function destroy($id)
    {
        //
    }
}
