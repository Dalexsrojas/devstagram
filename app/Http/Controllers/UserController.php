<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }



public function store(CreateUserRequest $request)
{
    try {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Guardar archivo en storage/app/public/profiles
            $path = $request->file('image')->store('profiles', 'public');
            // Guardar la ruta pública para acceder vía URL
            $data['image'] = 'storage/' . $path;
        } else {
            $data['image'] = "https://w7.pngwing.com/pngs/178/595/png-transparent-user-profile-computer-icons-login-user-avatars-thumbnail.png";
        }

        User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'role' => $data['role'],
            'image' => $data['image'],  // Aquí se guarda la ruta pública
            'password' => Hash::make($data['password']),
            'email_verified_at' => now()
        ]);

        return redirect()->route('registro.index')->with('success', 'Usuario registrado correctamente.');

    } catch (\Illuminate\Database\QueryException $e) {
        $errorCode = $e->errorInfo[1];
        if ($errorCode == 1062) {
            if (str_contains($e->getMessage(), 'username')) {
                return back()->withErrors(['username' => 'El nombre de usuario ya está en uso.'])->withInput();
            }
            else if (str_contains($e->getMessage(), 'email')) {
                return back()->withErrors(['email' => 'El correo electrónico ya está en uso.'])->withInput();
            }
        }
        return back()->withErrors(['error' => 'Error inesperado al crear el usuario.'])->withInput();
    }
}



    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
