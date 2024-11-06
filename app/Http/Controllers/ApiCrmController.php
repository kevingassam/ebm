<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\DetailsAppartement;
use App\Models\Information;
use App\Models\Projet;
use Illuminate\Http\Request;

class ApiCrmController extends Controller
{
    public function logo(Request $request)
    {
        $config = Information::first();
        if (!$config) {
            return response()->json(
                [
                    'message' => 'Configuration non trouvée',
                    'status' => false
                ],
                404
            );
        }
        // Récupérer manuellement le domaine et le protocole
        $protocol = $request->secure() ? 'https://' : 'http://';
        $domain = $protocol . $request->getHost();

        // Construire les URLs des images
        $logoUrl = $domain . '/storage/' . $config->logo;
        $iconUrl = $domain . '/storage/' . $config->icon;


        return response()->json([
            'logo' => $logoUrl,
            'icon' => $iconUrl,
            "nom" => $config->app_name,
            "adresse" => $config->adresse2 ?? null,
            "contact" => $config->tel1 ."". $config->tel2 ? " / ". $config->tel2 : null,
            "matricule" =>  $config->matricule ?? null,
            'status' => true,
        ]);

    }


    public function propriete($id){
        return response()
        ->json(
            [
                'propriete' => Appartement::find($id),
            ]
        );
    }

    public function projet($id){
        return response()
        ->json(
            [
                'projet' => Projet::find($id),
            ]
        );
    }

    public function appartement($id){
        return response()
        ->json(
            [
                'appartement' => DetailsAppartement::find($id),
            ]
        );
    }

}
