<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  Request  $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        return back()->with('Usuário cadastrado com sucesso');
    }

    /**
     * @param  User  $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * @param  Request  $request
     * @param  User  $user
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        if (auth()->id() != $user->id) {
            return redirect()->back()->withErrors(['error_password_user' => 'Você não poode altear uma senha de outro usuário']);
        }
        $user->update($request->only('name', 'email'));
        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * @param  Request  $request
     * @param  User  $user
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function updatePassword(Request $request, User $user): RedirectResponse
    {
        $this->validate($request, [
            'password' => ['sometimes', 'required', 'confirmed', Rules\Password::defaults()],
        ]);
        if (auth()->id() != $user->id) {
            return redirect()->back()->withErrors(['error_password_user' => 'Você não poode altear uma senha de outro usuário']);
        }
        $user->update(['password' => Hash::make($request->get('password'))]);
        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * @param  Request  $request
     * @param  User  $user
     * @return bool|Application|ResponseFactory|Response
     */
    public function destroy(Request $request, User $user)
    {
        if (auth()->user()->id == $user->id) {
            return response('Você não pode apagar o usuário logado', 500);
        }
        return $user->delete();
    }
}
