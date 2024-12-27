<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjetController extends Controller
{
    /**
     * Affiche la liste de tous les projets.
     */
    public function index()
    {
        $projets = Projet::paginate(15);
        return view('admin.projets.index', compact('projets'));
    }





    public function deleteSingleImage(Request $request)
    {
        $projet = Projet::find($request->projet_id);
        $url = $request->input('url');
        if ($projet) {
            $photos = json_decode($projet->photos, true);
            if (is_array($photos) && in_array($url, $photos)) {
                Storage::disk('public')->delete($url);
                $photos = array_diff($photos, [$url]);
                $projet->photos = json_encode(array_values($photos));
                $projet->save();
                return response()->json(['statut' => true, 'message' => 'Image supprimée avec succès']);
            } else {
                return response()->json(['statut' => false, 'message' => 'Image introuvable dans les photos du produit']);
            }
        } else {
            return response()->json(['statut' => false, 'message' => 'Produit introuvable']);
        }
    }

    /**
     * Affiche le formulaire pour créer un nouveau projet.
     */
    public function create()
    {
        return view('admin.projets.create');
    }

    /**
     * Enregistre un nouveau projet dans la base de données.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        $photoPath = $request->file('photo')->store('projets/photos', 'public');
        $additionalPhotos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                $additionalPhotos[] = $file->store('projets/photos', 'public');
            }
        }

        $projet = new Projet();
        $projet->slug = Str::slug($validated['nom']);
        $projet->photo = $photoPath;
        $projet->photos = json_encode($additionalPhotos);
        $projet->nom = $validated['nom'];
        $projet->description = $validated['description'];
        $projet->save();

        return redirect()->route('projets.index')->with('success', 'Projet créé avec succès !');
    }

    /**
     * Affiche les détails d'un projet spécifique.
     */
    public function show(Projet $projet)
    {
        return view('admin.projets.show', compact('projet'));
    }

    /**
     * Affiche le formulaire pour modifier un projet existant.
     */
    public function edit(Projet $projet)
    {
        return view('admin.projets.edit', compact('projet'));
    }

    /**
     * Met à jour un projet existant dans la base de données.
     */
    public function update(Request $request, Projet $projet)
    {
        // Valider les champs requis
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        $projet->nom = $validated['nom'];
        $projet->slug = Str::slug($validated['nom']);
        $projet->description = $validated['description'];

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($projet->photo);
            $projet->photo = $request->file('photo')->store('projets/photos', 'public');
        }
        if ($request->hasFile('photos')) {
            $oldPhotos = json_decode($projet->photos, true) ?? [];
            foreach ($oldPhotos as $oldPhoto) {
                Storage::disk('public')->delete($oldPhoto);
            }
            $newPhotos = [];
            foreach ($request->file('photos') as $file) {
                $newPhotos[] = $file->store('projets/photos', 'public');
            }
            $projet->photos = json_encode($newPhotos);
        }

        // Sauvegarder les modifications
        $projet->save();

        return redirect()->route('projets.index')->with('success', 'Projet mis à jour avec succès !');
    }

    /**
     * Supprime un projet de la base de données.
     */
    public function destroy(Projet $projet)
    {
        // Supprimer les fichiers associés
        Storage::disk('public')->delete($projet->photo);

        $additionalPhotos = json_decode($projet->photos, true) ?? [];
        foreach ($additionalPhotos as $photo) {
            Storage::disk('public')->delete($photo);
        }

        // Supprimer le projet de la base de données
        $projet->delete();

        return redirect()->route('projets.index')->with('success', 'Projet supprimé avec succès !');
    }



}
