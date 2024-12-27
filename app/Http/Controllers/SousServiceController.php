<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SousService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SousServiceController extends Controller
{
    public function index($id)
    {
        $service = Service::find($id);
        if (!$service) {
            abort('Service introuvable');
        }
        $sous_services = SousService::where('service_id', $id)->paginate(20);
        return view('admin.services.index_sous-services')
            ->with('sous_services', $sous_services)
            ->with('service', $service);
    }


    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:25500',
            'service_id' => 'required|exists:services,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4048',
        ]);
        $sous_service = new SousService();
        $sous_service->titre = $request->titre;
        $sous_service->slug = Str::slug($request->titre);
        $sous_service->description = $request->description;
        $sous_service->service_id = $request->service_id;
        $sous_service->image = $request->file('image')->store('services', 'public');
        $sous_service->save();
        return redirect()
            ->back()
            ->with('success', 'Sous-service ajouté avec succès');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:25500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4048',
            'service_id' => 'required|exists:services,id',
        ]);
        $sous_service = SousService::find($id);
        $sous_service->titre = $request->titre;
        $sous_service->slug = Str::slug($request->titre);
        $sous_service->description = $request->description;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($sous_service->image);
            $sous_service->image = $request->file('image')->store('services', 'public');
        }
        $sous_service->save();
        return redirect()
            ->back()
            ->with('success', 'Sous-service modifié avec succès');
    }



    public function destroy($id)
    {
        $sous_service = SousService::find($id);
        Storage::disk('public')->delete($sous_service->image);
        $sous_service->delete();
        return redirect()
            ->back()
            ->with('success', 'Sous-service supprimé avec succès');
    }
}
