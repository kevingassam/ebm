<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index(){
        $banners = Banner::all();
        return view('admin.banners.index')
        ->with('banners', $banners);
    }


    public function store(Request $request){
        $request->validate([
            'photo' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'titre' =>'required|string|max:255',
            'btn_text' => "nullable|string|max:255"
        ]);

        $banner = new Banner();
        $banner->titre = $request->input('titre');
        $banner->btn_text = $request->input('btn_text');
        $banner->photo = $request->file('photo')->store('banners', 'public');
        $banner->save();

        return redirect()->route('banners.index')->with('success', 'Le banner a bien été créé');
    }



    public function update(Request $request, $id){
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'titre' =>'required|string|max:255',
            'btn_text' => "nullable|string|max:255"
        ]);

        $banner = Banner::find($id);
        if($request->hasFile('photo')){
            if($banner->photo && Storage::exists($banner->photo)){
                Storage::delete($banner->photo);
            }
            $banner->photo = $request->file('photo')->store('banners', 'public');
        }
        $banner->titre = $request->input('titre');
        $banner->btn_text = $request->input('btn_text') ?? "Découvrez nos services";
        $banner->save();

        return redirect()->route('banners.index')->with('success', 'Le banner a bien été modifié');
    }



    public function destroy($id){
        $banner = Banner::find($id);
        if($banner->photo && Storage::exists($banner->photo)){
            Storage::delete($banner->photo);
        }
        $banner->delete();
        return redirect()->route('banners.index')->with('success', 'Le banner a bien été supprimé');
    }



}
