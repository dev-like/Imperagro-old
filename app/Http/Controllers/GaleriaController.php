<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class GaleriaController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'file' => 'required',
            'evento_id' => 'required',
        ]);
        $galeria = Galeria::create($request->all());

        return response()->json(['success' => $galeria->file]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Galeria  $galerium
     * @return bool|null
     */
    public function destroy(Galeria $galerium): ?bool
    {
        return $galerium->delete();
    }
}
