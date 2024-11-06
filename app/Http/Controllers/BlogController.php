<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Affiche une liste de tous les blogs.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Affiche le formulaire pour créer un nouveau blog.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Enregistre un nouveau blog dans la base de données.
     */
    public function store(Request $request)
    {
        // Valider les champs requis
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Téléverser la photo principale
        $path = $request->file('photo')->store('blogs/photos', 'public');

        // Téléverser les photos supplémentaires si elles existent
        $additionalPhotos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                $additionalPhotos[] = $file->store('blogs/photos', 'public');
            }
        }

        // Créer le blog
        $blog = New Blog();
        $blog->titre = $validated['titre'];
        $blog->photo = $path;
        $blog->photos = json_encode($additionalPhotos);
        $blog->description = $validated['description'];
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog créé avec succès !');
    }

    /**
     * Affiche les détails d'un blog spécifique.
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Affiche le formulaire pour modifier un blog existant.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Met à jour un blog existant dans la base de données.
     */
    public function update(Request $request, Blog $blog)
    {
        // Valider les champs requis
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Mettre à jour les champs du blog
        $blog->titre = $validated['titre'];
        $blog->description = $validated['description'];

        // Si une nouvelle photo principale est uploadée, remplacer l'ancienne
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo
            Storage::disk('public')->delete($blog->photo);
            // Sauvegarder la nouvelle photo
            $blog->photo = $request->file('photo')->store('blogs/photos', 'public');
        }

        // Gérer les photos supplémentaires
        if ($request->hasFile('photos')) {
            // Supprimer les anciennes photos
            $oldPhotos = json_decode($blog->photos, true) ?? [];
            foreach ($oldPhotos as $oldPhoto) {
                Storage::disk('public')->delete($oldPhoto);
            }

            // Sauvegarder les nouvelles photos
            $newPhotos = [];
            foreach ($request->file('photos') as $file) {
                $newPhotos[] = $file->store('blogs/photos', 'public');
            }
            $blog->photos = json_encode($newPhotos);
        }

        // Sauvegarder les modifications
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog mis à jour avec succès !');
    }

    /**
     * Supprime un blog de la base de données.
     */
    public function destroy(Blog $blog)
    {
        // Supprimer les fichiers associés
        Storage::disk('public')->delete($blog->photo);

        $additionalPhotos = json_decode($blog->photos, true) ?? [];
        foreach ($additionalPhotos as $photo) {
            Storage::disk('public')->delete($photo);
        }

        // Supprimer le blog de la base de données
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog supprimé avec succès !');
    }
}
