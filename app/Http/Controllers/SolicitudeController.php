<?php

namespace App\Http\Controllers;

use App\Models\DetalleSolicitude;
use App\Models\Solicitude;
use Illuminate\Http\Request;

class SolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Solicitude::with(['Sucursale'])->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    
    $solicitude = new Solicitude();
         $solicitude->sucursale_id = $request->sucursale_id;
         $solicitude->guia = $request->guia;
         $solicitude->peso_o = $request->peso_o;
         $solicitude->peso_v = $request->peso_v;
         $solicitude->remitente = $request->remitente;
         $solicitude->direccion = $request->direccion;
         $solicitude->telefono = $request->telefono;
         $solicitude->contenido = $request->contenido;
         $solicitude->fecha = $request->fecha;
         $solicitude->firma_o = $request->firma_o;
         $solicitude->destinatario = $request->destinatario;
         $solicitude->telefono_d = $request->telefono_d;
         $solicitude->direccion_d = $request->direccion_d;
         $solicitude->ciudad = $request->ciudad;
         $solicitude->firma_d = $request->firma_d;
         $solicitude->nombre_d = $request->nombre_d;
         $solicitude->ci_d = $request->ci_d;
         $solicitude->fecha_d = $request->fecha_d;
         $solicitude->estado = $request->estado ?? 1;



         $solicitude->save();
     
         return $solicitude;
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitude $solicitude)
    {
        $solicitude->sucursale = $solicitude->sucursale;

        return $solicitude;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitude $solicitude)
    {
        $solicitude->sucursale_id = $request->sucursale_id;
        $solicitude->guia = $request->guia;
        $solicitude->peso_o = $request->peso_o;
        $solicitude->peso_v = $request->peso_v;
        $solicitude->remitente = $request->remitente;
        $solicitude->direccion = $request->direccion;
        $solicitude->telefono = $request->telefono;
        $solicitude->contenido = $request->contenido;
        $solicitude->fecha = $request->fecha;
        $solicitude->firma_o = $request->firma_o;
        $solicitude->destinatario = $request->destinatario;
        $solicitude->telefono_d = $request->telefono_d;
        $solicitude->direccion_d = $request->direccion_d;
        $solicitude->ciudad = $request->ciudad;
        $solicitude->firma_d = $request->firma_d;
        $solicitude->nombre_d = $request->nombre_d;
        $solicitude->ci_d = $request->ci_d;
        $solicitude->fecha_d = $request->fecha_d;
        $solicitude->estado = $request->estado;
        $solicitude->save();
    
        return $solicitude;
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitude $solicitude)
    {
        $solicitude->estado = 0;
        $solicitude->save();
        return $solicitude;
    }
}
