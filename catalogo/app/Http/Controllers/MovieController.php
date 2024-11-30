<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Función para obtener todos los registros
    public function index()
    {
        return Movie::all();
    }

    // Función para obtener un registro específico por ID
    public function show($id)
    {
        $movie = Movie::find($id);
        
        if ($movie) {
            return response()->json($movie, 200);
        } else {
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }

    // Función para insertar un nuevo registro
    public function store(Request $request)
    {
        $movie = new Movie;
        $movie->title = $request->title;
        $movie->synopsis = $request->synopsis;
        $movie->year = $request->year;
        $movie->cover = $request->cover;
        $movie->save();

        return response()->json(['message' => 'Movie created successfully', 'movie' => $movie], 201);
    }

    // Función para actualizar un registro específico (PUT)
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);

        if ($movie) {
            $movie->title = $request->title;
            $movie->synopsis = $request->synopsis;
            $movie->year = $request->year;
            $movie->cover = $request->cover;
            $movie->save();

            return response()->json(['message' => 'Movie updated successfully', 'movie' => $movie], 200);
        } else {
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }

    // Función para eliminar un registro específico (DELETE)
    public function destroy($id)
    {
        $movie = Movie::find($id);

        if ($movie) {
            $movie->delete();
            return response()->json(['message' => 'Movie deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }
}
