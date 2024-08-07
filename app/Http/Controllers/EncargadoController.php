<?php

namespace App\Http\Controllers;

use App\Models\encargado;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EncargadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return encargado::all();
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
         $encargado = new encargado();
         $encargado->nombre = $request->nombre;
         $encargado->apellidos = $request->apellidos;
         $encargado->email = $request->email;
         $encargado->estado = $request->estado ?? 1;

         $encargado->password = Hash::make($request->input('password'));
     
         $encargado->save();
     
         return $encargado;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function show(encargado $encargado)
    {
        return $encargado;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, encargado $encargado)
    {
        $encargado->nombre = $request->nombre;
        $encargado->apellidos = $request->apellidos;
        $encargado->email = $request->email;
        $encargado->estado = $request->estado ?? 1;

        $encargado->password = Hash::make($request->input('password'));
    
        $encargado->save();
    
        return $encargado;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function destroy(encargado $encargado)
    {
        $encargado->estado = 0;
        $encargado->save();
        return $encargado;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Intenta autenticar al maestro
        if (Auth::guard('sucursale')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Autenticación exitosa, recupera la información del maestro
            $encargado = Auth::guard('encargado')->user();
            
            // Ahora puedes acceder a la información del maestro, por ejemplo, $maestro->nombre, $maestro->email, etc.
    
            // Devuelve un mensaje de éxito junto con los datos del maestro
            return response()->json(['message' => 'Inicio de sesión correcto', 'sucursale' => $encargado]);
        }
    
        // Si la autenticación falla, devuelve un mensaje de error
        return response()->json(['error' => 'Credenciales incorrectas'],401);
}
}
