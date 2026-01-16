<?php

namespace App\Http\Controllers;

use App\Models\Bulo;
use Illuminate\Http\Request;

class BuloController extends Controller
{
    public function index()
    {
        $bulos = Bulo::latest()->get();
        return view('home', compact('bulos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'textobulo' => 'required|string|max:255',
            'texto_desmentido' => 'required|string|max:255',
            'imagen' => 'nullable|url',
        ]);

        Bulo::create($validated);

        return redirect('/');
    }

    public function edit(Bulo $bulo)
    {
        return view('bulos.edit', compact('bulo'));
    }

    public function update(Request $request, Bulo $bulo)
    {
        $validated = $request->validate([
            'textobulo' => 'required|string|max:255',
            'texto_desmentido' => 'required|string|max:255',
            'imagen' => 'nullable|url',
        ]);

        $bulo->update($validated);

        return redirect('/');
    }

    public function destroy(Bulo $bulo)
    {
        $bulo->delete();
        return redirect('/');
    }
}
