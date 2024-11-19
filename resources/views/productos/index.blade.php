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

    <!-- Anuncio Temporal -->
    <div id="popupAd" class="fixed bottom-10 right-10 w-80 h-80 bg-white rounded-lg shadow-lg overflow-hidden transition-opacity duration-700 z-50 hidden">
        <button onclick="cerrarAnuncio()" class="absolute top-2 right-2 bg-red-500 text-white rounded-full px-2 py-1">✕</button>
        <img id="popupImage" src="{{ asset('imagenes/imagen1.jpg') }}" alt="Anuncio" class="w-full h-full object-cover">
    </div>

    <!-- Filtro de Categorías -->
    <div class="bg-blue-600 py-4 shadow-md border-t border-blue-700 text-white">
        <div class="container mx-auto flex flex-wrap justify-around">
            <a href="{{ route('productos.index') }}" class="hover:text-blue-300 font-semibold">Todas</a>
            <a href="{{ route('productos.index', ['categoria' => 'Electrónica']) }}" class="hover:text-blue-300 font-semibold">Electrónica</a>
            <a href="{{ route('productos.index', ['categoria' => 'Moda']) }}" class="hover:text-blue-300 font-semibold">Moda</a>
            <a href="{{ route('productos.index', ['categoria' => 'Hogar']) }}" class="hover:text-blue-300 font-semibold">Hogar</a>
            <a href="{{ route('productos.index', ['categoria' => 'Deportes']) }}" class="hover:text-blue-300 font-semibold">Deportes</a>
            <a href="{{ route('productos.index', ['categoria' => 'Belleza']) }}" class="hover:text-blue-300 font-semibold">Belleza</a>
            <a href="{{ route('productos.index', ['categoria' => 'Juguetes']) }}" class="hover:text-blue-300 font-semibold">Juguetes</a>
            <a href="{{ route('productos.index', ['categoria' => 'Ofertas Especiales']) }}" class="hover:text-blue-300 font-semibold">Ofertas Especiales</a>
        </div>
    </div>

    <!-- Barra de búsqueda en tiempo real -->
    <div class="container mx-auto my-8 px-4">
        <input type="text" id="searchInput" placeholder="Buscar productos..." class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" oninput="filterProducts()">
    </div>

    <!-- Sección de Productos -->
    <section class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">
            {{ $categoria ?? 'Ofertas del Día' }}
        </h2>
        <div id="productContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($productos as $producto)
                <div class="product-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 relative">
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

    <script>
        // Array de rutas de imágenes de anuncios
        const anuncioImagenes = [
            "{{ asset('imagenes/imagen10.jpg') }}",
            "{{ asset('imagenes/imagen11.jpg') }}",
            "{{ asset('imagenes/imagen12.jpg') }}",
            "{{ asset('imagenes/imagen13.jpg') }}",
            "{{ asset('imagenes/imagen14.jpg') }}"
        ];

        // Función para mostrar un anuncio temporal
        function mostrarAnuncio() {
            const popup = document.getElementById('popupAd');
            const popupImage = document.getElementById('popupImage');
            const randomIndex = Math.floor(Math.random() * anuncioImagenes.length);

            popupImage.src = anuncioImagenes[randomIndex];
            popup.classList.remove('hidden');  // Muestra el popup

            setTimeout(() => {
                popup.classList.add('hidden');  // Oculta el popup después de 5 segundos
            }, 5000);
        }

        // Llama a la función de mostrar anuncio en un intervalo
        setInterval(mostrarAnuncio, 20000);  // Muestra un anuncio cada 20 segundos

        // Función para cerrar manualmente el anuncio
        function cerrarAnuncio() {
            const popup = document.getElementById('popupAd');
            popup.classList.add('hidden');
        }

        // Función para buscar productos en tiempo real
        function filterProducts() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const productCards = document.querySelectorAll('.product-card');
            productCards.forEach(card => {
                const productName = card.querySelector('h3').textContent.toLowerCase();
                card.style.display = productName.includes(input) ? 'block' : 'none';
            });
        }
    </script>
</x-app-layout>
