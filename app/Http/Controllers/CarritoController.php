<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class CarritoController extends Controller
{
    // Método para agregar un producto al carrito
    public function agregarAlCarrito($id)
    {
        $producto = Producto::findOrFail($id);

        if (!Session::has('carrito')) {
            Session::put('carrito', []);
        }

        $carrito = Session::get('carrito');

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                'producto' => $producto,
                'cantidad' => 1
            ];
        }

        Session::put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    // Método para mostrar el contenido del carrito
    public function verCarrito()
    {
        $carrito = Session::get('carrito', []);
        return view('carrito.index', compact('carrito'));
    }

    // Método para actualizar la cantidad de un producto en el carrito
    public function actualizarCantidad(Request $request, $id)
    {
        $carrito = Session::get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] = $request->cantidad;
            Session::put('carrito', $carrito);
            return redirect()->route('carrito.index')->with('success', 'Cantidad actualizada');
        }

        return redirect()->route('carrito.index')->with('error', 'Producto no encontrado en el carrito');
    }

    // Método para eliminar un producto del carrito
    public function eliminarDelCarrito($id)
    {
        $carrito = Session::get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            Session::put('carrito', $carrito);
            return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito');
        }

        return redirect()->route('carrito.index')->with('error', 'Producto no encontrado en el carrito');
    }

    // Método para mostrar el formulario de compra
    public function mostrarFormularioPago()
    {
        $carrito = Session::get('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('carrito.index')->with('error', 'El carrito está vacío.');
        }

        return view('carrito.checkout', compact('carrito'));
    }

    // Método para procesar la compra y generar el comprobante en PDF
    public function procesarCompra(Request $request)
    {
        $carrito = Session::get('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('carrito.index')->with('error', 'El carrito está vacío.');
        }

        // Recolectar los datos del formulario de pago
        $nombre = $request->input('nombre');
        $direccion = $request->input('direccion');
        $ciudad = $request->input('ciudad');
        $estado = $request->input('estado');
        $pais = $request->input('pais');
        $codigo_postal = $request->input('codigo_postal');
        $telefono = $request->input('telefono');
        $email = $request->input('email');
        $documento = $request->input('documento');
        $num_documento = $request->input('num_documento');

        // Calcular el total de la compra
        $total = collect($carrito)->sum(fn($item) => $item['producto']->precio * $item['cantidad']);

        // Generar el PDF del comprobante
        $pdf = Pdf::loadView('carrito.comprobante', compact(
            'carrito', 'nombre', 'direccion', 'ciudad', 'estado', 'pais', 
            'codigo_postal', 'telefono', 'email', 'documento', 'num_documento', 'total'
        ));

        // Limpiar el carrito después de la compra
        Session::forget('carrito');

        // Descargar el comprobante en PDF
        return $pdf->download('comprobante_de_compra.pdf');
    }
}
