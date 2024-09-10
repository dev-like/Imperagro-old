<?php

namespace App\Http\Controllers;

use App\Models\Parceiros;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class ParceirosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parceiros = Parceiros::all();
        return view('admin.parceiros.index', compact('parceiros'));
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
            'logo' => 'required|image',
            'tipo_servico' => 'required',
        ]);
        Parceiros::create($request->all());
        return back()->with('success', 'Parceido cadastrado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Parceiros  $parceiro
     * @return Application|Factory|View
     */
    public function edit(Parceiros $parceiro)
    {
        return view('admin.parceiros.edit', compact('parceiro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Parceiros  $parceiro
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Parceiros $parceiro)
    {
        $this->validate($request, [
            'logo' => 'sometimes|required|image',
            'tipo_servico' => 'required',
        ]);
        $parceiro->update($request->all());
        return redirect()->route('parceiros.index')->with('success', 'Parceido cadastrado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Parceiros  $parceiro
     * @return bool
     */
    public function destroy(Parceiros $parceiro)
    {
        return $parceiro->delete();
    }
}
