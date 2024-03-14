<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progetto;
use App\Models\Attivita;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAttivitaRequest;
use App\Http\Requests\UpdateAttivitaRequest;

class AttivitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Progetto $progetto)
    {
        if (Auth::id() !== $progetto->user_id) {
            return redirect()->back();
        }

        $attivita = new Attivita;

        $attivita->nome = $request->nome;
        $attivita->descrizione = $request->descrizione;
        $attivita->progetto_id = $progetto->id;

        $attivita->save();

        return redirect()->route('progetti-personali');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attivita $attivita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attivita $attivita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttivitaRequest $request, Attivita $attivita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Progetto $progetto, Attivita $attivita)
    {
        // Verifica che l'utente attualmente loggato sia il proprietario del progetto
        if (Auth::id() !== $progetto->user_id) {
            return redirect()->back();
        }

        // Verifica che l'attività appartenga al progetto
        if ($attivita->progetto_id !== $progetto->id) {
            return redirect()->back();
        }

        $attivita->delete();

        return redirect()->route('progetti-personali');
    }
}
