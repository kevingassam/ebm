<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    //contructor
    public $ListTypeService ;
    public function __construct(){
        $this->ListTypeService = [
            "Construction de maisons",
            "Rénovation de maisons",
            "Construction d'immeubles",
            "Projets immobiliers pour les promoteurs"
        ];
    }
    public function index()
    {
        $services = Service::paginate(15);
        return view('admin.services.index')
            ->with('services', $services);
    }


    public function create(){
        return view('admin.services.add')
        ->with('types', $this->ListTypeService);
    }

    public function edit($id){
        $service = Service::find($id);
        return view('admin.services.update')
        ->with('service', $service)
        ->with('types', $this->ListTypeService);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $service = new Service();
        $service->titre = $request->input('titre');
        $service->description = $request->input('description');
        $service->type = $request->input('type');
        $service->image = $request->file('image')->store('services', 'public');
        $service->save();
        return redirect()->route('services.index')
            ->with('success', 'Service ajouté avec succès');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $service = Service::find($id);
        $service->titre = $request->input('titre');
        $service->description = $request->input('description');
        $service->type = $request->input('type');
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($service->image);
            $service->image = $request->file('image')->store('services', 'public');
        }
        $service->save();
        return redirect()->route('services.index')
            ->with('success', 'Service modifié avec succès');
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        Storage::disk('public')->delete($service->image);
        $service->delete();
        return redirect()->route('services.index')
            ->with('success', 'Service supprimé avec succès');
    }
}
