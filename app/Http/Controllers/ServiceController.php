<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    //contructor

    public function index()
    {
        $services = Service::paginate(15);
        return view('admin.services.index')
            ->with('services', $services);
    }


    public function create(){
        return view('admin.services.add');
    }

    public function edit($id){
        $service = Service::find($id);
        return view('admin.services.update')
        ->with('service', $service);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:20055',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $service = new Service();
        $service->slug = Str::slug($request->titre);
        $service->titre = $request->input('titre');
        $service->description = $request->input('description');
        $service->image = $request->file('image')->store('services', 'public');
        $service->save();
        return redirect()->route('services.index')
            ->with('success', 'Service ajouté avec succès');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:20055',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $service = Service::find($id);
        $service->titre = $request->input('titre');
        $service->slug = Str::slug($request->titre);
        $service->description = $request->input('description');
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
