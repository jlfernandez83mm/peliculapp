<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $directores = Director::all();

        //TODO: Hacer de una manera más "laraveliana"y permitir que el componente meta solo valores o código html
        foreach($directores as $director){
            $tableData[$director->id] = [
                $director->name, $director->surname, $director->birthdate
            ];
        }
        $tableData = collect($tableData);
        
        $header = collect(['Nombre', 'Apellido', 'Fecha nacimiento']);
    
        return view('director.index', compact('tableData','header'));
        //return view(''); //TODO: Crear vista con componente tipo tabla que muestre todos los directores, y un enlace a la página de cada uno de ellos.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Devolvemos la vista de creación del formulario
        return view('director.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dump($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Director $director)
    {
        //
        $headerPeliculas = collect(['Title', 'Sinopsis', 'Duration']);
        $films = $director->films;
        foreach($films as $film){
            $tableData[$film->id] = [
                $film->title, $film->sinopsis, $film->duration
            ];
        }
        $tableData = collect($tableData);
        
        return view('director.show', compact('director','headerPeliculas','tableData'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
