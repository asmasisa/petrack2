<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Pet; 

class PetController extends Controller


{
    // Afficher la page PetProfil

    public function PetProfil() {
        $pets = Pet::orderBy('created_at','DESC')->get ();
        return view('PagesUser.pet.listepet', [
            'pets' => $pets
        ]);
    }

    // Afficher les profils créés
    public function create(){
        return view('PagesUser.pet.create');
    }

    // Enregistrer un animal dans la BDD
    public function store(Request $request)
    {
        // Définir les règles de validation
        $rules = [
            'Nom' => 'required|min:2',
            'Espèce' =>'required|min:3',
            'Race' => 'required|min:2',
            'Age' => 'required|numeric',
            'Sexe' => 'required|min:1',
            'Image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Définir des messages de validation personnalisés
        $messages = [
            'required' => 'Le champ :attribute est requis.',
            'min' => 'Le champ :attribute doit avoir au moins :min caractères.',
            'numeric' => 'Le champ :attribute doit être un nombre.',
            'image' => 'Le fichier :attribute doit être une image.',
            'mimes' => 'Le fichier :attribute doit être de type :values.',
            'max' => 'Le fichier :attribute ne doit pas dépasser :max kilo-octets.',
        ];

        // Valider les données
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()){
            return redirect()->route('pet.create')->withInput()->withErrors($validator);
        }

        // Insertion dans la BDD
        $pet = new Pet();
        $pet->Nom = $request->Nom;
        $pet->Espèce = $request->Espèce;
        $pet->Race = $request->Race;
        $pet->Age = $request->Age;
        $pet->Sexe = $request->Sexe;
        $pet->Description = $request->Description;

        // Enregistrer l'image si elle est téléchargée
        if ($request->hasFile('Image')) {
            $image = $request->file('Image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/Pets'), $imageName);
            $pet->Image = $imageName;
        }

        $pet->save();
    
        return redirect()->route('pet.PetProfil')->with('success', 'Animal ajouté avec succès');
    }

    // Modifier un profil
    public function edit($id){
        $pet = Pet::findOrFail($id);
        return view('PagesUser.pet.edit',[
            'pet' => $pet
        ]);
    }

    // Mettre à jour un profil
    public function update($id,Request $request){
        $pet = Pet::findOrFail($id);
        $rules = [
            'Nom' => 'required|min:2',
            'Espèce' =>'required|min:3',
            'Race' => 'required|min:2',
            'Age' => 'required|numeric',
            'Sexe' => 'required|min:1',
            'Image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $messages = [
            'required' => 'Le champ :attribute est requis.',
            'min' => 'Le champ :attribute doit avoir au moins :min caractères.',
            'numeric' => 'Le champ :attribute doit être un nombre.',
            'image' => 'Le fichier :attribute doit être une image.',
            'mimes' => 'Le fichier :attribute doit être de type :values.',
            'max' => 'Le fichier :attribute ne doit pas dépasser :max kilo-octets.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()){
            return redirect()->route('pet.edit',$pet->id)->withInput()->withErrors($validator);
        }

        $pet->Nom = $request->Nom;
        $pet->Espèce = $request->Espèce;
        $pet->Race = $request->Race;
        $pet->Age = $request->Age;
        $pet->Sexe = $request->Sexe;
        $pet->Description = $request->Description;

        // Enregistrer l'image si elle est téléchargée
        if ($request->hasFile('Image')) {
            //Effacer l'ancienne image
            File::delete(public_path('uploads/Pets/',$pet->Image));
            $image = $request->file('Image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/Pets'), $imageName);
            $pet->Image = $imageName;
        }

        $pet->save();
    
        return redirect()->route('pet.PetProfil')->with('success', 'Animal modifié avec succès');
    }

    // Suppression d'un profil
    public function destroy($id){

        $pet = Pet::findOrFail($id);
        //Supprimer l'image
        File::delete(public_path('uploads/Pets/',$pet->Image));

        //Supprimer l'animal de la BDD
        $pet->delete();
        return redirect()->route('pet.PetProfil')->with('success', 'Animal supprimé avec succès');

    }
}
