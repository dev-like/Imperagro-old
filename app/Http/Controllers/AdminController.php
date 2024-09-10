<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Eventos;
use App\Models\Parceiros;
use App\Models\QuemSomos;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.main');
    }
}
