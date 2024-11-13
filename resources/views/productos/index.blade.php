<!-- resources/views/productos/index.blade.php -->

<x-app-layout>
    <!-- Mensajes Flash -->
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4 mx-4 my-2">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4 mx-4 my-2">
            {{ session('error') }}
        </div>
    @endif

    <!-- Filtro de Categorías -->
    <div class="bg-gray-100 py-4 shadow-md border-t border-gray-200">
        <div class="container mx-auto flex flex-wrap justify-around text-gray-700">
            <a href="{{ route('productos.index') }}" class="hover:text-blue-500 font-semibold">Todas</a>
            <a href="{{ route('productos.index', ['categoria' => 'Electrónica']) }}" class="hover:text-blue-500 font-semibold">Electrónica</a>
            <a href="{{ route('productos.index', ['categoria' => 'Moda']) }}" class="hover:text-blue-500 font-semibold">Moda</a>
            <a href="{{ route('productos.index', ['categoria' => 'Hogar']) }}" class="hover:text-blue-500 font-semibold">Hogar</a>
            <a href="{{ route('productos.index', ['categoria' => 'Deportes']) }}" class="hover:text-blue-500 font-semibold">Deportes</a>
            <a href="{{ route('productos.index', ['categoria' => 'Belleza']) }}" class="hover:text-blue-500 font-semibold">Belleza</a>
            <a href="{{ route('productos.index', ['categoria' => 'Juguetes']) }}" class="hover:text-blue-500 font-semibold">Juguetes</a>
            <a href="{{ route('productos.index', ['categoria' => 'Ofertas Especiales']) }}" class="hover:text-blue-500 font-semibold">Ofertas Especiales</a>
        </div>
    </div>

    <!-- Sección de Productos -->
    <section class="container mx-auto mt-10 px-4">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">
            {{ $categoria ?? 'Ofertas del Día' }}
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($productos as $producto)
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 relative">
                    <div class="relative">
                        <img src="{{ asset('storage/imagenes/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-56 object-cover">
                        <!-- Etiqueta de descuento y calificación -->
                        <div class="absolute top-2 left-2 flex flex-col items-start space-y-1">
                            <span class="bg-red-500 text-white text-xs font-bold py-1 px-2 rounded-br-lg">-10%</span>
                            <div class="flex items-center text-yellow-500 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ml-1 text-gray-700 text-xs">(145)</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <!-- Nombre y descripción del producto -->
                        <h3 class="text-gray-900 font-semibold text-lg truncate">{{ $producto->nombre }}</h3>
                        <p class="text-sm text-gray-500 mt-1 mb-3 truncate">{{ $producto->descripcion }}</p>
                        
                        <!-- Precio -->
                        <div class="flex items-baseline space-x-2">
                            <span class="text-xl font-bold text-red-600">PEN {{ number_format($producto->precio, 2) }}</span>
                            <span class="text-sm line-through text-gray-400">PEN {{ number_format($producto->precio * 1.1, 2) }}</span>
                        </div>

                        <!-- Etiquetas y envío gratis -->
                        <div class="flex items-center space-x-2 mt-2">
                            <span class="bg-red-100 text-red-600 font-semibold text-xs px-2 py-1 rounded">Dto. Bienvenida</span>
                            <span class="bg-yellow-100 text-yellow-700 font-semibold text-xs px-2 py-1 rounded">Envío gratis</span>
                        </div>

                        <!-- Nombre de la tienda (Placeholder) -->
                        <p class="text-xs text-gray-600 mt-2">Shop: Nombre de la tienda</p>
                        
                        <!-- Botones según el rol del usuario -->
                        <div class="flex mt-4 space-x-2 justify-center">
                            <a href="{{ route('productos.show', $producto->id) }}" class="bg-blue-500 text-white p-3 rounded-full shadow-md hover:bg-blue-600" title="Ver Detalles">
                                <i class="fas fa-eye"></i>
                            </a>
                            @role('empresa')
                                <a href="{{ route('productos.edit', $producto->id) }}" class="bg-green-500 text-white p-3 rounded-full shadow-md hover:bg-green-600" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white p-3 rounded-full shadow-md hover:bg-red-600" onclick="return confirm('¿Estás seguro de eliminar este producto?')" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            @else
                                <!-- Botones de Acción agregar al carrito -->
                                <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-yellow-500 text-white p-3 rounded-full shadow-md hover:bg-yellow-600" title="Agregar al Carrito">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                </form>
                                <!-- Botón Comprar -->
                                <form action="{{ route('comprar') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-orange-500 text-white p-3 rounded-full shadow-md hover:bg-orange-600" title="Comprar">
                                        <i class="fas fa-credit-card"></i>
                                    </button>
                                </form>
                            @endrole
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
