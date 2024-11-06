<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartenaireController extends Controller
{
    public function index(){
        $partenaires = Partenaire::all();
        return view('admin.partenaires.index')
        ->with('partenaires', $partenaires);
    }

    public function store(Request $request){
        $request->validate([
            'nom' =>'required|string|max:255',
            'description' =>'nullable|required|string|max:25005',
            'logo' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);

        $partenaire = new Partenaire();
        $partenaire->nom = $request->input('nom');
        $partenaire->description = $request->input('description');
        $partenaire->logo =  $request->file('logo')->store('$artenaires', 'public');
        $partenaire->save();

        return redirect()->route('partenaires.index')->with('success', 'Partenaire ajouté avec succès');
    }


    public function update(Request $request,$id){
        $request->validate([
            'nom' =>'required|string|max:255',
            'description' =>'nullable|required|string|max:25005',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);

        $partenaire = Partenaire::find($id);
        $partenaire->nom = $request->input('nom');
        $partenaire->description = $request->input('description');
        if($request->hasFile('logo')){
            Storage::disk('public')->delete($partenaire->logo);
            $partenaire->logo =  $request->file('logo')->store('public/partenaires');
        }
        $partenaire->save();

        return redirect()->route('partenaires.index')->with('success', 'Partenaire modifié avec succès');
    }


    public function destroy($id){
        $partenaire = Partenaire::find($id);
        Storage::disk('public')->delete($partenaire->logo);
        $partenaire->delete();
        return redirect()->route('partenaires.index')->with('success', 'Partenaire supprimé avec succès');
    }

}
