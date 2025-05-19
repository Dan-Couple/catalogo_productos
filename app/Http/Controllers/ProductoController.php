<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Método que permite listar todos los registros de la tabla productos
    public function index(){
        $productos = Producto::all();
        return view("productos.index",compact("productos"));
    }

    // Método para la creación de registros de tipo producto
    public function create(){
        return view("productos.create");
    }

    // Método para almacenar un nuevo registro
    public function store(Request $request){
        Producto::create($request->all());
        return redirect()->route("productos.index");
    }

    // Método para mostrar la información de un solo producto
    public function show($id){
        $producto = Producto::findOrFail($id);
        if (request()->ajax()) {
            return view('productos.show', compact('producto'));
        }
        return view('productos.show', compact('producto'));
    }

    // Método para editar los atributos de un registro
    public function edit($id){
        $producto = Producto::findOrFail($id);
        if (request()->ajax()) {
            return view('productos.edit', compact('producto'));
        }
        return view('productos.edit', compact('producto'));
    }

    // Método para actualizar y guardar cambios en un registro existente
    public function update(Request $request, $id){
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return redirect()->route("productos.index");
    }

    //  Método para eliminar un registro
    public function destroy($id){
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route("productos.index");
    }

    // Método para buscar registros
    public function search(Request $request){
        $query = Producto::query();
        if($request->filled("nombre")){
            $query->where(function($query) use ($request){
                $query->where("nombre","like","%".$request->nombre."%")
                ->orWhere("descripcion","like","%".$request->nombre."%");
            });
        
        }
        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        switch($request->ordenar){
            case 'A-Z':
                $query->orderBy('nombre','asc');
                break;

            case 'Z-A':
                $query->orderBy('nombre','desc');
                break;

            case 'mayor stock':
                $query->orderBy('stock','desc');
                break;

            case 'menor stock':
                $query->orderBy('stock','asc');
                break;

            case 'precio alto':
                $query->orderBy('precio','desc');
                break;

            case 'precio bajo':
                $query->orderBy('precio','asc');
                break;
        }

        
        $productos = $query->get();
        return response()->json([
            'html' => view('productos.table', compact('productos'))->render()
        ]);
    } 
}
