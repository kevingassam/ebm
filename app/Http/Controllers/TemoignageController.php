<?php

namespace App\Http\Controllers;

use App\Models\Temoignage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemoignageController extends Controller
{
    public function index(){
        $temoignages = Temoignage::all();
        return view('admin.temoignages.index')
        ->with('temoignages',$temoignages);
    }


    public function store(Request $request){
        $request->validate([
            'nom' =>'required|string|max:255',
            'poste' =>'required|string|max:255',
            'note' =>'required|integer|min:0|max:5',
            'message' =>'required|string|max:2550',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $new = New Temoignage();
        $new->nom = $request->input('nom');
        $new->poste = $request->input('poste');
        $new->note = $request->input('note');
        $new->message = $request->input('message');
        if($request->hasFile('photo')){
            $new->photo = $request->file('photo')->store('public/temoinages');
        }
        $new->save();
        return redirect()->route('temoignages.index')->with('success','Témoignage ajouté avec succès');
    }

    public function update(Request $request,$id){
        $request->validate([
            'nom' =>'required|string|max:255',
            'poste' =>'required|string|max:255',
            'note' =>'required|integer|min:0|max:5',
            'message' =>'required|string|max:2550',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $temoinage = Temoignage::find($id);
        $temoinage->nom = $request->input('nom');
        $temoinage->poste = $request->input('poste');
        $temoinage->note = $request->input('note');
        $temoinage->message = $request->input('message');
        if($request->hasFile('photo')){
            //delete old photo
            Storage::delete($temoinage->photo);
            $temoinage->photo = $request->file('photo')->store('public/temoinages');
        }
        $temoinage->save();
        return redirect()->route('temoignages.index')->with('success','Témoignage modifié avec succès');
    }


    public function destroy($id){
        $temoinage = Temoignage::find($id);
        Storage::delete($temoinage->photo);
        $temoinage->delete();
        return redirect()->route('temoignages.index')->with('success','Témoignage supprimé avec succès');
    }



}
