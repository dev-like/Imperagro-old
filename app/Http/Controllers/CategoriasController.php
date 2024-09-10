<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categorias = Categorias::all();
        return view('admin.categorias.index', compact('categorias'));
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
        ]);
        Categorias::create($request->all());
        return back()->with('success', 'Categoria cadastrada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Categorias  $categoria
     * @return Application|Factory|View
     */
    public function edit(Categorias $categoria)
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Categorias  $categoria
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Categorias $categoria)
    {
        $this->validate($request, [
            'nome' => 'required',
        ]);
        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Categorias  $categoria
     * @return bool
     */
    public function destroy(Categorias $categoria): bool
    {
        return $categoria->delete();
    }
}
