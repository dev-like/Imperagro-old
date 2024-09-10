<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Foundation\Application;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Factory|View
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
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
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        Banner::create($request->only(['title', 'sub_title', 'image']));
        return back()->with('success', 'Banner cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Banner  $banner
     * @return Application|Factory|View
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Banner  $banner
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function update(Request $request, Banner $banner)
    {
        $this->validate($request, [
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg',
        ]);
        $banner->update($request->only(['title', 'sub_title', 'image']));
        return redirect('admin/banners')->with('success', 'Banner atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Banner  $banner
     * @return bool|null
     */
    public function destroy(Banner $banner): ?bool
    {
        return $banner->delete();
    }
}
