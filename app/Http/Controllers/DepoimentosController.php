<?php

namespace App\Http\Controllers;

use App\Models\Depoimentos;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DepoimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|View
     */
    public function index()
    {
        $depoimentos = Depoimentos::all();
        return view('admin.depoimentos.index', compact('depoimentos'));
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
            'nome' => 'required',
            'profissao' => 'required',
            'foto' => 'required|image',
            'texto' => 'required',
        ]);
        Depoimentos::create($request->all());
        return back()->with('success', 'Depoimento cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Depoimentos  $depoimento
     * @return Application|Factory|View
     */
    public function edit(Depoimentos $depoimento)
    {
        return view('admin.depoimentos.edit', compact('depoimento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Depoimentos  $depoimento
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Depoimentos $depoimento): RedirectResponse
    {
        $this->validate($request, [
            'nome' => 'required',
            'profissao' => 'required',
            'foto' => 'sometimes|required|image',
            'texto' => 'required',
        ]);
        $depoimento->update($request->all());
        return redirect()->route('depoimentos.index')->with('success', 'Depoimento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Depoimentos  $depoimento
     * @return bool|null
     */
    public function destroy(Depoimentos $depoimento): ?bool
    {
        return $depoimento->delete();
    }
}
