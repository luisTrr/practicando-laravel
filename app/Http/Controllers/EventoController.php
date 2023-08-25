<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Noticia;

class EventoController extends Controller
{
    //
    public function ObtenerNoticias(Request $request){
        $noticias = Evento::find(1)->noticias;
        return view('noticias1',['noticias'=>$noticias]);
    }

    public function SubirDatos(Request $request){
        $eventos = Evento::find(1);

        $noticias = new Noticia;
        $noticias->titulo = "Choferes paralizan El Alto en demanda de incremento de pasaje";
        $noticias->contenido = "Los choferes de transporte público de la ciudad de El Alto cumplen desde tempranas horas de este lunes con su anunciado paro de 48 horas, que paraliza esta urbe con bloqueos instalados en distintos puntos estratégicos.";

        $eventos = $eventos->noticias()->save($noticias);
    }
    public function getEventos(){
        $noticias = Evento::all()->take(10);
        return Response() -> json($noticias);
    }
}
