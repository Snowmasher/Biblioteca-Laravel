<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::with("user")->paginate(5);
        return view("home", compact("libros"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libro = new Libro;
        $titulo = __("Crear libro");
        $textButton = __("Crear");
        $route = route("libros.store");
        return view("libros.create", compact("titulo", "textButton", "route", "libro"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "titulo" => "required|unique:libros",
            "descripcion" => "nullable|string|min:10"
        ]);

        Libro::create($request->only("titulo", "descripcion"));

        return redirect(route("libros"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        $update = true;
        $titulo = __("Editar libro");
        $textButton = __("Editar");
        $route = route("libros.update", ["libro" => $libro]);
        return view("libros.edit", compact("update", "titulo", "textButton", "route", "libro"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $this->validate($request, [
            "titulo" => "required|unique:libros",
            "descripcion" => "nullable|string|min:10"
        ]);

        $libro->fill($request->only("titulo", "descripcion"))->save();
        return back();
    }

    public function show($id)
    {
	    //
	$libros = Libro::find($id);
        if($libros === null) {
            return view('home');
        }
        var_dump($libros);
        return view('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return back();
    }
}
