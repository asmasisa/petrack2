<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinaire;

class AdminController extends Controller
{
    // Afficher les demandes d'inscription en attente
    public function manageVetoRequests()
    {
        $pendingVetos = Veterinaire::where('status', 'pending')->get();
        return view('Adminveto.AdminVéto', compact('pendingVetos'));
    }

    // Approuver une demande d'inscription
    public function approve($id)
    {
        $veterinaire = Veterinaire::findOrFail($id);
        $veterinaire->is_approved = true;
        $veterinaire->save();

        return redirect()->route('adminveto.adminveto')->with('success', "La demande d'inscription du vétérinaire a été approuvée.");
    }

    // Rejeter une demande d'inscription
    public function destroy($id)
    {
        $veterinaire = Veterinaire::findOrFail($id);
        $veterinaire->is_approved = false;
        $veterinaire->delete();            
        return redirect()->back()->with('success', "La demande d'inscription a été supprimée.");
    }
}

