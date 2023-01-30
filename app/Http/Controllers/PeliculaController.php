<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index()
    {
         $peliculas = Pelicula::where('duracion', '<' , 111 )->get();
        // $peliculas = Pelicula::orderBy('precio', 'DESC')->get();
        //return Pelicula::get();
        return  response()->json(Pelicula::get(), 200);
    }

    public function store(Request $request)
     {
        $pelicula = new Pelicula();
        $pelicula->titulo = $request->titulo;
        $pelicula->anyo = $request->anyo;
        $pelicula->duracion = $request->duracion;
        $pelicula->save();
            
            return response()->json($pelicula, 201);
    }

    public function show(Pelicula $pelicula)
    {
        // return [
        //     'titulo' => $pelicula->titulo,
        //     'anyo' => $pelicula->anyo
        //     ];
           
        return response()->json($pelicula, 200);
    }

    public function update(Request $request, Pelicula $pelicula)
    {
            $pelicula->titulo = $request->titulo;
            $pelicula->anyo = $request->anyo;
            $pelicula->duracion = $request->duracion;
            $pelicula->save();
            return response()->json($pelicula, 201);
    }

    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();
        return response()->json($pelicula, 204);
    }
}
