<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Partenaire;
use App\Models\Projet;
use App\Models\Service;
use App\Models\Temoignage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class FrontController extends Controller
{
    public function home()
    {
        $articles = Blog::Orderby('created_at', 'desc')->select('id', 'titre', 'photo', 'created_at')->take(10)->get();
        $services = Service::Orderby('created_at', 'desc')->select('id', 'titre', 'image', 'description')->take(10)->get();
        $temoignages = Temoignage::all();
        $projets = Projet::Orderby('created_at', 'desc')->take(15)->get();
        $banners = Banner::all();


        return view("front.index")
            ->with('articles', $articles)
            ->with('temoignages', $temoignages)
            ->with('projets', $projets)
            ->with('services', $services)
            ->with('banners', $banners);
    }

    public function contact()
    {
        return view("front.contact");
    }



    public function get_devis(Request $request)
    {
        if($request->get('service_id')){
            $service_id = $request->get('service_id');
            $service = Service::find($service_id);
        }
        $services = Service::select('id','titre')->get();
        return view("front.get_devis")
        ->with('service', $service ?? null)
        ->with('services', $services);
    }


    public function get_devis_post(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telephone' => ['required', 'numeric'],
            'message' => ['required', 'string', 'max:2550'],
            'adresse' => ['nullable', 'string', 'max:2550'],
            'service_id' => 'required|integer|exists:services,id'
        ]);


        $service = Service::find($request->input('service_id'));
        $message = $request->input('message');
        if($service){
            $contenu = "<b>Service:</b> ". $service->titre. "<br> <b>Message:</b> ". $message;
        }else{
            $contenu =  $message;
        }

        $token = config('services.contact_form.api_key');
        $url = config('services.contact_form.api') . "contact";
        $response = Http::withHeaders([
            'x-api-key' => $token,
        ])->post($url, [
            'nom' => $request->input('nom'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'message' => $contenu,
            'adresse' => $request->input('adresse') ?? "-",
            "domaine" => config('app.app_url_demaine'),
        ]);

        // Déboguer la réponse
        $status = $response->status();   // Récupère le code d'état HTTP
        $body = $response->body();       // Récupère le corps de la réponse
        if ($response->successful()) {
            return redirect()->back()
                ->with('success', 'Votre demande a bien été reçu et va être envoyé vers l\'équipe de support.');
        } else {
            // Affichez les détails pour comprendre l'erreur
            return redirect()->back()
                ->with('error', 'Une erreur s\'est produite lors de l\'envoi de votre demande. Code: ' . $status . ' - Réponse: ' . $body);
        }
    }






    public function contact_post(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|numeric',
            'message' => 'required|string|max:2550',
            'adresse' => 'nullable|string|max:2550',
        ]);

        $token = config('services.contact_form.api_key');
        $url = config('services.contact_form.api') . "contact";
        $response = Http::withHeaders([
            'x-api-key' => $token,
        ])->post($url, [
            'nom' => $request->input('nom'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'message' => $request->input('message'),
            'adresse' => $request->input('adresse') ?? "-",
            "domaine" => config('app.app_url_demaine'),
        ]);

        // Déboguer la réponse
        $status = $response->status();   // Récupère le code d'état HTTP
        $body = $response->body();       // Récupère le corps de la réponse
        if ($response->successful()) {
            return redirect()->back()
                ->with('success', 'Votre message a bien été reçu et va être envoyé vers l\'équipe de support.');
        } else {
            // Affichez les détails pour comprendre l'erreur
            return redirect()->back()
                ->with('error', 'Une erreur s\'est produite lors de l\'envoi de votre message. Code: ' . $status . ' - Réponse: ' . $body);
        }
    }


    public function about()
    {
        $articles = Blog::Orderby('id', 'Desc')->take(10)->get();
        $services = Service::Orderby('id', 'Desc')->take(6)->get();
        $temoignages = Temoignage::all();
        return view("front.about")
            ->with('temoignages', $temoignages)
            ->with('articles', $articles)
            ->with('services', $services);
    }

    public function projet(Request $request, $statut = null)
    {
        $key = $request->input("key") ?? null;
        $type = $request->input("type") ?? $request->get('type') ?? null;
        $projets = Projet::query();
        if ($key) {
            $projets = $projets->where('nom', 'LIKE', '%' . $key . '%');
        }
        $projets = $projets->paginate(30);
        $total = Projet::count();
        return view("front.projets")
            ->with('projets', $projets)
            ->with('statut', $statut)
            ->with('key', $key)
            ->with('type', $type)
            ->with('total', $total);
    }


    public function projet_details($id, $titre)
    {
        $projet = Projet::find($id);
        if (!$projet) {
            abort(404);
        }
        $autres = Projet::where('id', '!=', $projet->id)->take(5)->get();
        return view("front.projet")
            ->with('projet', $projet)
            ->with('autres', $autres);
    }


    public function services()
    {
        $services = Service::all();
        return view("front.services")
            ->with('services', $services);
    }


    public function article($id, $titre)
    {
        $article = Blog::find($id);

        // Vérifiez si l'article existe
        if (!$article) {
            abort(404, 'Article non trouvé');
        }

        // Récupérer l'article précédent
        $previousArticle = Blog::where('id', '<', $article->id)
            ->orderBy('id', 'desc')
            ->first();

        // Récupérer l'article suivant
        $nextArticle = Blog::where('id', '>', $article->id)
            ->orderBy('id', 'asc')
            ->first();

        // Récupérer d'autres articles en excluant l'article actuel
        $autres = Blog::where('id', '!=', $article->id)
            ->orderBy('created_at', 'desc')
            ->select('id','titre','created_at')
            ->take(3)
            ->get();

        return view("front.article")
            ->with('article', $article)
            ->with('titre', $titre)
            ->with('autres', $autres)
            ->with('previousArticle', $previousArticle)
            ->with('nextArticle', $nextArticle);
    }


    public function service($id, $titre)
    {
        $service = Service::find($id);
        if (!$service) {
            abort(404);
        }
        $autres = Blog::where('id', '!=', $service->id)
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();
        return view("front.service")
            ->with('service', $service)
            ->with('titre', $titre)
            ->with('autres', $autres);
    }

    public function blogs(Request $request)
    {
        $key = $request->input('key' ??  null);
        $articles = Blog::query();
        if ($key) {
            $articles = $articles->where('titre', 'LIKE', '%' . $key . '%');
        }
        $articles = $articles->orderBy('created_at', 'desc')
            ->select('id', 'titre', 'photo', 'created_at')
            ->paginate(20);
        $autres = Blog::Orderby('created_at', 'desc')->take(3)->get();
        return view("front.blogs")
            ->with('articles', $articles)
            ->with('key', $key)
            ->with('autres', $autres);
    }
    public function login()
    {
        return view("admin.login");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function login_post(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|max:90'
        ]);

        // Authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        } else {
            return back()->with('error', 'Invalid credentials');
        }
    }


    public function dashboard()
    {
        $total_projets = Projet::count();
        $total_articles = Blog::count();
        return view("admin.dashboard")
            ->with('total_projets', $total_projets)
            ->with('total_etages', 0)
            ->with('total_articles', $total_articles);
    }



    public function politique()
    {
        return view("front.politique");
    }

    public function mentions()
    {
        return view("front.mentions");
    }
}
