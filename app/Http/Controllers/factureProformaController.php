<?php

namespace App\Http\Controllers;

use App\Models\FactureProf;
use Illuminate\Http\Request;

class factureProformaController extends Controller
{
    public function index()
    {
        $factureProformas=FactureProf::all();
        return view('pages.factureProforma.index',['factureProformas'=>$factureProformas]);
    }

    public function create()
    {
        return view('pages.factureProforma.create');
    }

    
    public function store(Request $request)
    {
        
        $image=$request->file('image');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $bonsortie = new FactureProf();
        $bonsortie->image='images/'.$imageName;
        $bonsortie->nom_patient=$request->nom_patient;
        $bonsortie->hotital_centre=$request->hotital_centre;
        $bonsortie->date_signature=$request->date_signature;
        $bonsortie->save();
        
        return redirect()->route('factureproIndex');
    } 

    public function show($id)
    {
        $factureProformas=FactureProf::findOrFail($id);
        return view('pages.factureProforma.show',['factureProformas'=>$factureProformas]);
    }

   
    public function edit($id)
    {
        $factureProformas=FactureProf::findOrFail($id);
        return view('pages.factureProforma.edit',['factureProformas'=>$factureProformas]);
    }

    
    public function update(Request $request, $id)
    {
        $factureProformas=FactureProf::findOrFail($id);

        $image=$request->file('image');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        
        $factureProformas->update([
            'nom_patient'=>$request->nom_patient,
            'hotital_centre'=>$request->hotital_centre,
            'date_signature'=>$request->date_signature,
            'image'=>'images/'.$imageName,
        ]);
        
        return redirect()->route('factureproIndex');

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
        
        $factureProformas=FactureProf::where('nom_patient','like',"%$chercher%")
                ->paginate(6);
        return view('pages.factureProforma.index')->with('factureProformas',$factureProformas);
    }
}
