<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        return response()->json(Film::with('actors')->get());
    }

    /**
     * Read films from storage
     */
    public static function readFilms()
    {
        return Film::query()->get();
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Antiguas (Antes de $year)";
        $films = Film::query()
            ->where('year', '<', $year)
            ->get();

        return view('films.list', ["films" => $films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = Film::query()
            ->where('year', '>=', $year)
            ->get();

        return view('films.list', ["films" => $films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilms($year = null, $genre = null)
    {
        $title = "Listado de todas las pelis";
        $query = Film::query();

        //if year and genre are null
        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $query->get(), "title" => $title]);

        //list based on year or genre informed
        if (!is_null($year) && is_null($genre)) {
            $title = "Listado de todas las pelis filtrado x año";
            $query->where('year', $year);
        } else if (is_null($year) && !is_null($genre)) {
            $title = "Listado de todas las pelis filtrado x categoria";
            $query->whereRaw('LOWER(genre) = ?', [strtolower($genre)]);
        } else if (!is_null($year) && !is_null($genre)) {
            $title = "Listado de todas las pelis filtrado x categoria y año";
            $query
                ->where('year', $year)
                ->whereRaw('LOWER(genre) = ?', [strtolower($genre)]);
        }

        return view("films.list", ["films" => $query->get(), "title" => $title]);
    }

    public function countFilms()
    {
        $count = Film::count();

        return view("films.count", ["count" => $count]);
    }

    public function createFilm(Request $request)
    {
        if ($this->isFilm($request->name)) {
            return redirect('/')
                ->with('error', 'La película ya existe');
        }
        
        if($request->duration <= 60 || $request->duration > 240){
            return redirect('/')
                ->with('error', 'La duración debe ser mayor a 60 minutos y menor a 240 minutos');
        }

        Film::create([
            'name' => $request->name,
            'year' => $request->year,
            'genre' => $request->genre,
            'img_url' => $request->img_url,
            'duration' => $request->duration,
            'country' => $request->country,
        ]);

        return view('films.list', [
            'films' => self::readFilms(),
            'title' => 'Listado de todas las pelis'
        ]);
    }

    private function isFilm($name)
    {
        return Film::query()->where('name', $name)->exists();
    }
}
