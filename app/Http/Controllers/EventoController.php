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
    public function getNoticiasDeEventos()
    {
        $eventos = Evento::take(10)->get();

       $noticiasDeEventos = [];
        foreach ($eventos as $evento) {
            $noticias = $evento->noticias()->take(10)->get();
            $noticiasDeEventos[] = [
                'evento_id' => $evento->id,
                'noticias' => $noticias,
            ];
        }

        return response()->json($noticiasDeEventos);
    }
    public function insertarNoticia(Request $request)
    {
        $datos = $request -> all();

        $noticias = new Noticia();
        $noticias->evento_id = $datos['evento_id'];
        $noticias->titulo = $datos['titulo'];
        $noticias->contenido = $datos['contenido'];
        $noticias->save();

        return response()->json(['message' => 'Evento creado con éxito']);
    }
    public function buscarNoticiaPorTitulo(Request $request)
    {
        $titulo = $request->input('titulo');

        if ($titulo) {
            $noticiasEncontradas = Noticia::where('titulo', 'like', '%' . $titulo . '%')->get();

            if ($noticiasEncontradas->isEmpty()) {
                return response()->json(['message' => 'No se encontraron noticias con ese título']);
            }

            return response()->json(['noticias' => $noticiasEncontradas]);
        }

        return response()->json(['message' => 'Se requiere un título para buscar noticias']);
    }
    public function contarNoticiasPrimerEvento()
    {
        $primerEvento = Evento::orderBy('id', 'asc')->first();

        if (!$primerEvento) {
            return response()->json(['message' => 'No se encontraron eventos']);
        }

        $cantidadNoticiasPrimerEvento = $primerEvento->noticias()->count();

        return response()->json(['cantidad_noticias_primer_evento' => $cantidadNoticiasPrimerEvento]);
    }
    public function verificarEventoDeNoticia(Request $request)
    {
        $noticiaId = $request->input('noticia_id');

        if (!$noticiaId) {
            return response()->json(['message' => 'Se requiere el ID de la noticia']);
        }

        $noticia = Noticia::find($noticiaId);

        if (!$noticia) {
            return response()->json(['message' => 'No se encontró la noticia']);
        }

        $eventoRelacionado = $noticia->evento;

        if (!$eventoRelacionado) {
            return response()->json(['message' => 'La noticia no está relacionada con un evento']);
        }

        return response()->json(['evento_relacionado' => $eventoRelacionado]);
    }
}
