<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinaire;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class VetoController extends Controller
{
    // Afficher le formulaire d'inscription
    public function registreveto()
    {
        return view('registreveto.store');
    }

    // Traiter les données du formulaire d'inscription
    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|min:2',
            'nomcln' => 'required|string|min:255',
            'hor' => 'required|string',
            'frais' => 'required|numeric',
            'loc' => 'required|string',
            'desc' => 'nullable|string',
            'Image' => 'nullable|image|max:2048',
        ]); 
         // Définir des messages de validation personnalisés
         $messages = [
            'required' => 'Le champ :attribute est requis.',
            'min' => 'Le champ :attribute doit avoir au moins :min caractères.',
            'image' => 'Le fichier :attribute doit être une image.',
            'max' => 'Le fichier :attribute ne doit pas dépasser :max kilo-octets.',
        ];


        $veterinaire = new Veterinaire();
        $veterinaire->nom = $request->input('fullName');
        $veterinaire->nom_cabinet = $request->input('nomcln');
        $veterinaire->heure_travail = $request->input('hor');
        $veterinaire->frais_consultation = $request->input('frais');
        $veterinaire->localisation = $request->input('loc');
        $veterinaire->description = $request->input('desc');
        $veterinaire->email = Auth::user()->email; // Supposons que l'email est celui de l'utilisateur connecté
        $veterinaire->password = Hash::make('password'); // Un mot de passe par défaut, à changer
        // Gérer l'upload de l'image si présent
        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('uploads/vetos/',$veterinaire->Image);
            $veterinaire->Image = basename($imagePath);
        }
        $veterinaire->save();

        return redirect()->back()->with('success', 'Votre inscription a été soumise avec succès.');
    }
    public function login(Request $request)
    {
        // ... logique de connexion ...
        if (Auth::attempt($credentials) && !Auth::vetos()->email_verified_at) {
            Auth::logout();
            return back()->with('status', 'Veuillez attendre la décision de l\'administrateur.');
        }
}}
