<x-app-layout>
    <h2 class="text-2xl font-bold mb-4">Productos Comprados</h2>

    <div class="space-y-4">
        @foreach ($productos as $producto)
            <div class="bg-white shadow p-4 rounded-lg">
                <h3 class="text-xl font-semibold">{{ $producto->nombre }}</h3>
                <p class="text-gray-600">{{ $producto->descripcion }}</p>

                <h4 class="font-semibold mt-4">Compras:</h4>
                <ul class="list-disc pl-5">
                    @forelse ($producto->compras as $compra)
                        <li>
                            <strong>Postulante:</strong> {{ $compra->usuario->name }}<br>
                            <strong>Cantidad:</strong> {{ $compra->cantidad }}<br>
                            <strong>Total:</strong> PEN {{ number_format($compra->total, 2) }}
                        </li>
                    @empty
                        <p>No hay compras para este producto.</p>
                    @endforelse
                </ul>
            </div>
        @endforeach
    </div>
</x-app-layout>
