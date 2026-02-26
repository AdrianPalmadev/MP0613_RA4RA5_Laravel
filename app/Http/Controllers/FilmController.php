<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{

    /**
     * Read films from storage
     */
    public static function readFilms(): array
    {
        $films = Film::all()->toArray();
        return $films;
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {
        $old_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Antiguas (Antes de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilms($year = null, $genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($year) && is_null($genre)) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            } else if ((is_null($year) && !is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            } else if (!is_null($year) && !is_null($genre) && strtolower($film['genre']) == strtolower($genre) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x categoria y año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    public function countFilms()
    {
        $films = FilmController::readFilms();
        $count = count($films);

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

        $films = self::readFilms();

        $films[] = [
            'name'     => $request->name,
            'year'     => $request->year,
            'genre'    => $request->genre,
            'img_url'  => $request->img_url,
            'duration' => $request->duration,
            'country'  => $request->country,
        ];


        
        Storage::put('/public/films.json', json_encode($films));

        return view('films.list', [
            'films' => $films,
            'title' => 'Listado de todas las pelis'
        ]);
    }

    private function isFilm($name)
    {
        $films = $this->readFilms();

        foreach ($films as $film) {
            if ($film['name'] === $name) {
                return true;
            }
        }

        return false;
    }
}
