<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Foundation\Application;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|View
     */
    public function index()
    {
        $eventos = Eventos::all();
        return view('admin.eventos.index', compact('eventos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'titulo' => 'required',
            'sub_titulo' => 'required',
            'descricao' => 'required',
            'data_evento' => 'required|date',
            'foto' => 'required|image',
            'categoria_id' => 'required',
        ]);
        Eventos::create($request->all());
        return back()->with('success', 'Evento cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Eventos  $evento
     * @return Application|Factory|View
     */
    public function show(Eventos $evento)
    {
        $evento->load('galeria');
        return view('admin.eventos.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Eventos  $evento
     * @return Application|Factory|View
     */
    public function edit(Eventos $evento)
    {
        return view('admin.eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Eventos  $evento
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Eventos $evento): RedirectResponse
    {
        $this->validate($request, [
            'titulo' => 'required',
            'sub_titulo' => 'required',
            'descricao' => 'required',
            'data_evento' => 'required|date',
            'categoria_id' => 'required',
        ]);
        $evento->update($request->all());
        return redirect()->route('eventos.index')->with('success', 'Evento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Eventos  $evento
     * @return bool
     */
    public function destroy(Eventos $evento): bool
    {
        return $evento->delete();
    }
}
