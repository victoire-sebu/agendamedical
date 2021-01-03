<?php

namespace App\Http\Controllers;

use App\Models\BonEnvoi;
use Illuminate\Http\Request;

class bonEnvoiController extends Controller
{
    
    public function index()
    {
        $bonenvois=BonEnvoi::all();
        return view('pages.bonEnvoi.index',['bonenvois'=>$bonenvois]);
    }

    public function create()
    {
        return view('pages.bonEnvoi.create');
    }

    
    public function store(Request $request)
    {
        
        $image=$request->file('image');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $bon_envoi = new BonEnvoi();
        $bon_envoi->image='images/'.$imageName;
        $bon_envoi->nom_patient=$request->nom_patient;
        $bon_envoi->hotital_centre=$request->hotital_centre;
        $bon_envoi->date_signature=$request->date_signature;
        $bon_envoi->save();
        
        return redirect()->route('bonenvoiIndex');
    } 

    
   

    public function show($id)
    {
        $bonenvois=BonEnvoi::findOrFail($id);
        return view('pages.bonEnvoi.show',['bonenvois'=>$bonenvois]);
    }

   
    public function edit($id)
    {
        $bonenvois=BonEnvoi::findOrFail($id);
        return view('pages.bonEnvoi.edit',['bonenvois'=>$bonenvois]);
    }

    
    public function update(Request $request, $id)
    {
        $bonenvois=BonEnvoi::findOrFail($id);

        $image=$request->file('image');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        
        $bonenvois->update([
            'nom_patient'=>$request->nom_patient,
            'hotital_centre'=>$request->hotital_centre,
            'date_signature'=>$request->date_signature,
            'image'=>'images/'.$imageName,
        ]);
        
        return redirect()->route('bonenvoiIndex');

    }

   
    public function destroy($id)
    {
        //
    }

    public function search()
    {
        request()->validate([
            'chercher'=>"required|min:0"
        ]);

        $chercher=request()->input('chercher');
        
        $bonenvois=BonEnvoi::where('nom_patient','like',"%$chercher%")
                ->paginate(6);
        return view('pages.bonEnvoi.index')->with('bonenvois',$bonenvois);
    }
}
