<?php

namespace App\Http\Controllers;

use App\Models\Temoignage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemoignageController extends Controller
{
    public function index()
    {
        $temoignages = Temoignage::all();
        return view('admin.temoignages.index')
            ->with('temoignages', $temoignages);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'poste' => 'required|string|max:255',
            'note' => 'required|integer|min:0|max:5',
            'message' => 'required|string|max:2550',
        ]);
        $new = new Temoignage();
        $new->nom = $request->input('nom');
        $new->poste = $request->input('poste');
        $new->note = $request->input('note');
        $new->message = $request->input('message');
        $new->save();
        return redirect()
            ->route('temoignages.index')
            ->with('success', 'Témoignage ajouté avec succès');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'poste' => 'required|string|max:255',
            'note' => 'required|integer|min:0|max:5',
            'message' => 'required|string|max:2550',
        ]);
        $temoignage = Temoignage::find($id);
        $temoignage->nom = $request->input('nom');
        $temoignage->poste = $request->input('poste');
        $temoignage->note = $request->input('note');
        $temoignage->message = $request->input('message');
        $temoignage->save();
        return redirect()
        ->route('temoignages.index')
        ->with('success', 'Témoignage modifié avec succès');
    }


    public function destroy($id)
    {
        $temoignage = Temoignage::find($id);
       if($temoignage->photo){
        Storage::delete($temoignage->photo);
       }
        $temoignage->delete();
        return redirect()->route('temoignages.index')->with('success', 'Témoignage supprimé avec succès');
    }
}
