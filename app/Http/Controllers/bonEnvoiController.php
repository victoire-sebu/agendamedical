<?php

namespace App\Http\Controllers;

use App\Models\BonEnvoi;
use Illuminate\Http\Request;

class bonEnvoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bonenvois=BonEnvoi::all();
        return view('pages.bonEnvoi.index',['bonenvois'=>$bonenvois]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.bonEnvoi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function show($id)
    {
        $bonenvois=BonEnvoi::findOrFail($id);
        return view('pages.bonEnvoi.show',['bonenvois'=>$bonenvois]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bonenvois=BonEnvoi::findOrFail($id);
        return view('pages.bonEnvoi.edit',['bonenvois'=>$bonenvois]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bonenvois=BonEnvoi::findOrFail($id);

        // $image=$request->file('image');
        // $imageName=time().'.'.$image->extension();
        // $image->move(public_path('images'),$imageName);
        
        $bonenvois->update([
            'nom_patient'=>$request->nom_patient,
            'hotital_centre'=>$request->hotital_centre,
            'date_signature'=>$request->date_signature,
            // 'image'=>$request->$imageName,
        ]);
        
        return redirect()->route('bonenvoiIndex');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
