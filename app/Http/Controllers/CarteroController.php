<?php

namespace App\Http\Controllers;

use App\Models\cartero;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Notifications\Notifiable;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarteroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cartero::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Crea una nueva instancia de usuario
        $cartero = new Cartero();
        $cartero->nombre = $request->nombre;
        $cartero->apellidos = $request->apellidos;
        $cartero->email = $request->email;

        $cartero->password = Hash::make($request->input('password'));

        $cartero->save();

        return $cartero;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cartero  $cartero
     * @return \Illuminate\Http\Response
     */
    public function show(cartero $cartero)
    {
        return $cartero;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cartero  $cartero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cartero $cartero)
    {
        $cartero->nombre = $request->nombre;
        $cartero->apellidos = $request->apellidos;
        $cartero->email = $request->email;

        $cartero->password = Hash::make($request->input('password'));

        $cartero->save();

        return $cartero;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cartero  $cartero
     * @return \Illuminate\Http\Response
     */
    public function destroy(cartero $cartero)
    {
        $cartero->estado = 0;
        $cartero->save();
        return $cartero;
    }
    public function login3(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intenta autenticar al maestro
        if (Auth::guard('cartero')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Autenticación exitosa, recupera la información del maestro
            $cartero = Auth::guard('cartero')->user();

            // Ahora puedes acceder a la información del maestro, por ejemplo, $maestro->nombre, $maestro->email, etc.

            // Devuelve un mensaje de éxito junto con los datos del maestro
            return response()->json(['message' => 'Inicio de sesión correcto', 'cartero' => $cartero]);
        }

        // Si la autenticación falla, devuelve un mensaje de error
        return response()->json(['error' => 'Credenciales incorrectas'], 401);
    }
}
