<?php

namespace App\Http\Controllers;

use App\Models\Progetto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgettoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progetti = Progetto::where('user_id', Auth::id())->get();
        return view('progetti_personali', ['progetti' => $progetti]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('progetti_personali_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $progetto = new Progetto;

        $progetto->nome = $request->nome;
        $progetto->descrizione = $request->descrizione;
        $progetto->immagine = $request->immagine;
        $progetto->user_id = Auth::id();

        $progetto->save();

        return redirect()->route('progetti-personali');
    }

    /**
     * Display the specified resource.
     */
    public function show(Progetto $progetto)
    {
        return view('progetti_personali_show', ['progetto' => $progetto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Progetto $progetto)
    {
        return view('progetti_personali_edit', ['progetto' => $progetto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Progetto $progetto)
    {
        if (Auth::id() !== $progetto->user_id) {
            return redirect()->back();
        }

        $progetto->nome = $request->nome;
        $progetto->descrizione = $request->descrizione;
        $progetto->immagine = $request->immagine;

        $progetto->save();

        return redirect()->route('progetti-personali');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Progetto $progetto)
    {
        if (Auth::id() !== $progetto->user_id) {
            return redirect()->back();
        }

        $progetto->delete();

        return redirect()->route('progetti-personali');
    }
}
