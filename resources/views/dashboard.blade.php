<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight">
            {{ __('Bienvenidos a UpeuExpress') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Banner de Bienvenida -->
            <div class="bg-gradient-to-r from-blue-500 to-green-500 text-white rounded-lg p-8 shadow-lg mb-10 flex items-center justify-between">
                <div class="flex flex-col space-y-4 w-2/3">
                    <h3 class="text-4xl font-bold">¡Bienvenido a UpeuExpress!</h3>
                    <p class="text-lg">Tu tienda online con las mejores promociones y productos exclusivos. ¡Explora nuestras ofertas ahora!</p>
                    <button class="bg-yellow-500 text-white py-3 px-6 rounded-lg text-lg hover:bg-yellow-600 transition duration-300 transform hover:scale-105">
                        Ver Ofertas
                    </button>
                </div>
                <div class="w-1/3">
                    <img src="{{ asset('imagenes/imagen1.jpg') }}" alt="Imagen Promocional" class="rounded-lg shadow-xl transform hover:scale-110 transition duration-300">
                </div>
            </div>

            <!-- Sección de Promociones -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Promoción 1 -->
                <div class="bg-white rounded-lg shadow-xl overflow-hidden transform hover:scale-105 transition duration-300">
                    <img src="{{ asset('imagenes/imagen2.jpg') }}" alt="Promoción 1" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h4 class="text-2xl font-semibold text-blue-600 mb-2">¡20% OFF en toda la tienda!</h4>
                        <p class="text-gray-600 mb-4">Aprovecha nuestro descuento exclusivo. ¡Solo por tiempo limitado!</p>
                        <button class="bg-blue-600 text-white py-2 px-4 rounded-lg w-full hover:bg-blue-700 transition duration-300">Ver Productos</button>
                    </div>
                </div>

                <!-- Promoción 2 -->
                <div class="bg-white rounded-lg shadow-xl overflow-hidden transform hover:scale-105 transition duration-300">
                    <img src="{{ asset('imagenes/imagen3.jpg') }}" alt="Promoción 2" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h4 class="text-2xl font-semibold text-green-600 mb-2">Envíos Gratis</h4>
                        <p class="text-gray-600 mb-4">Compra más de $50 y disfruta del envío gratis en todas tus compras.</p>
                        <button class="bg-green-600 text-white py-2 px-4 rounded-lg w-full hover:bg-green-700 transition duration-300">Ver Productos</button>
                    </div>
                </div>

                <!-- Promoción 3 -->
                <div class="bg-white rounded-lg shadow-xl overflow-hidden transform hover:scale-105 transition duration-300">
                    <img src="{{ asset('imagenes/imagen4.jpg') }}" alt="Promoción 3" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h4 class="text-2xl font-semibold text-purple-600 mb-2">Compra 2, y lleva 3</h4>
                        <p class="text-gray-600 mb-4">¡Lleva tres productos por el precio de dos! Solo este mes.</p>
                        <button class="bg-purple-600 text-white py-2 px-4 rounded-lg w-full hover:bg-purple-700 transition duration-300">Ver Más Detalles</button>
                    </div>
                </div>
            </div>

            <!-- Sección de Nuevos Productos -->
            <div class="bg-gray-50 mt-12 p-8 rounded-lg shadow-lg">
                <h3 class="text-3xl font-bold text-center mb-6 text-gray-800">Nuevos Productos</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Producto 1 -->
                    <div class="bg-white rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                        <img src="{{ asset('imagenes/imagen5.jpg') }}" alt="Producto 1" class="w-full h-48 object-cover rounded-t-lg">
                        <div class="p-4">
                            <h4 class="text-xl font-semibold text-gray-800">Producto A</h4>
                            <p class="text-gray-600 mb-4">$19.99</p>
                            <button class="bg-blue-600 text-white py-2 px-4 rounded-lg w-full hover:bg-blue-700 transition duration-300">Añadir al carrito</button>
                        </div>
                    </div>

                    <!-- Producto 2 -->
                    <div class="bg-white rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                        <img src="{{ asset('imagenes/imagen6.jpg') }}" alt="Producto 2" class="w-full h-48 object-cover rounded-t-lg">
                        <div class="p-4">
                            <h4 class="text-xl font-semibold text-gray-800">Producto B</h4>
                            <p class="text-gray-600 mb-4">$29.99</p>
                            <button class="bg-blue-600 text-white py-2 px-4 rounded-lg w-full hover:bg-blue-700 transition duration-300">Añadir al carrito</button>
                        </div>
                    </div>

                    <!-- Producto 3 -->
                    <div class="bg-white rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                        <img src="{{ asset('imagenes/imagen7.jpg') }}" alt="Producto 3" class="w-full h-48 object-cover rounded-t-lg">
                        <div class="p-4">
                            <h4 class="text-xl font-semibold text-gray-800">Producto C</h4>
                            <p class="text-gray-600 mb-4">$15.99</p>
                            <button class="bg-blue-600 text-white py-2 px-4 rounded-lg w-full hover:bg-blue-700 transition duration-300">Añadir al carrito</button>
                        </div>
                    </div>

                    <!-- Producto 4 -->
                    <div class="bg-white rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                        <img src="{{ asset('imagenes/imagen8.jpg') }}" alt="Producto 4" class="w-full h-48 object-cover rounded-t-lg">
                        <div class="p-4">
                            <h4 class="text-xl font-semibold text-gray-800">Producto D</h4>
                            <p class="text-gray-600 mb-4">$39.99</p>
                            <button class="bg-blue-600 text-white py-2 px-4 rounded-lg w-full hover:bg-blue-700 transition duration-300">Añadir al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
