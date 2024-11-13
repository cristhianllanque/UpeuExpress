<!-- resources/views/productos/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3>{{ $producto->nombre }}</h3>
                <p>{{ $producto->descripcion }}</p>
                <p><strong>Precio:</strong> ${{ $producto->precio }}</p>
                <p><strong>Stock:</strong> {{ $producto->stock }}</p>
                <p><strong>Fecha de inicio:</strong> {{ $producto->fecha_inicio }}</p>
                <p><strong>Fecha de fin:</strong> {{ $producto->fecha_fin }}</p>
                <a href="{{ route('productos.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded mt-4">Volver</a>
            </div>
        </div>
    </div>
</x-app-layout>
