<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Compra;

class ProductoController extends Controller
{
    // Mostrar la vista de creación de producto
    public function create()
    {
        return view('productos.create');
    }

    // Almacenar el producto en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'categoria' => 'required|string', // Validar la categoría
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->fecha_inicio = $request->fecha_inicio;
        $producto->fecha_fin = $request->fecha_fin;
        $producto->categoria = $request->categoria; // Asignar la categoría

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/imagenes');
            $producto->imagen = basename($path);
        }

        $producto->user_id = auth()->id(); // Asociar el producto con el usuario autenticado
        $producto->save();

        return redirect()->route('dashboard')->with('success', 'Producto publicado exitosamente');
    }

    // Mostrar todos los productos, con opción de filtrado por categoría
    public function index(Request $request)
    {
        $categoria = $request->query('categoria');
        
        if ($categoria) {
            $productos = Producto::where('categoria', $categoria)->get(); // Filtrar por categoría
        } else {
            $productos = Producto::all(); // Mostrar todos los productos
        }

        return view('productos.index', compact('productos', 'categoria'));
    }

    // Mostrar un solo producto
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    // Mostrar la vista de edición
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    // Actualizar el producto en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'imagen' => 'image',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'categoria' => 'required|string', // Validar la categoría
        ]);

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->fecha_inicio = $request->fecha_inicio;
        $producto->fecha_fin = $request->fecha_fin;
        $producto->categoria = $request->categoria; // Actualizar la categoría

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/imagenes');
            $producto->imagen = basename($path);
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente');
    }

    // Mostrar productos comprados
    public function compras()
    {
        // Obtener los productos creados por la empresa autenticada
        $productos = Producto::where('user_id', auth()->id())
            ->with('compras.usuario') // Cargar las compras y los usuarios que las realizaron
            ->get();

        return view('productos.compras', compact('productos'));
    }
}
