<?php

namespace App\Http\Controllers;

use App\Models\QuemSomos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class QuemSomosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $quemSomos = QuemSomos::first();
        if (empty($quemSomos)) {
            $quemSomos = QuemSomos::create([
                'endereco_matriz_link' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15884.81669459566!2d-47.4693919!3d-5.5367081!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x729962f79e61e2a4!2sImperagro!5e0!3m2!1spt-BR!2sbr!4v1633161574720!5m2!1spt-BR!2sbr',
                'endereco_filial_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.261436838405!2d-47.47944278535792!3d-5.5281785565169415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x92c55f081ff1a871%3A0x3f1022d591a6de7d!2sR.%20Benedito%20Leite%2C%201325%20-%20Beira%20Rio%2C%20Imperatriz%20-%20MA%2C%2065900-090!5e0!3m2!1spt-BR!2sbr!4v1633161275303!5m2!1spt-BR!2sbr',
            ]);
        }
        return view('admin.quemSomos.index', compact('quemSomos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  QuemSomos  $quemSomo
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, QuemSomos $quemSomo): RedirectResponse
    {
        $quemSomo->update($request->all());
        return back()->with('success', 'Quem somos atualizado com sucesso!');
    }
}
