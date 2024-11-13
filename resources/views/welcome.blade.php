<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UpeuExpress</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome para íconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Estilos para el logo y navegación */
        .logo {
            font-family: Arial, sans-serif;
            font-weight: bold;
            color: #ffffff;
            font-size: 2rem;
            display: flex;
            align-items: center;
        }
        .logo .accent {
            color: #FFAA00; /* Color amarillo para el acento */
            margin-left: -5px;
        }
        .navbar-bg { background-color: #1a1a1a; } /* Fondo oscuro similar a AliExpress */
        .primary-btn {
            background-color: #1a56db;
            color: #fff;
            border-radius: 9999px;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
        }
        .primary-btn:hover { background-color: #3b82f6; transform: scale(1.05); }
        .section-title { font-size: 2rem; font-weight: 700; color: #1a56db; }
        .bg-banner { background-image: url('/imagenes/imagen1.jpg'); background-size: cover; background-position: center; height: 60vh; }
        .product-card { transition: transform 0.2s ease-in-out; }
        .product-card:hover { transform: scale(1.05); }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Menú de navegación fijo en la parte superior con logo -->
    <nav class="navbar-bg p-4 flex justify-between items-center shadow-md fixed w-full z-30 top-0">
        <!-- Logo de UpeuExpress -->
        <div class="flex items-center space-x-3">
            <div class="logo">
                Upeu<span class="accent">Express</span>
            </div>
        </div>
        <!-- Barra de búsqueda -->
        <div class="w-1/2 relative">
            <input type="text" placeholder="Buscar productos..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button class="absolute right-0 top-0 bottom-0 px-4 text-white bg-blue-600 rounded-r-lg"><i class="fas fa-search"></i></button>
        </div>
        <!-- Enlaces de usuario -->
        <div class="flex items-center space-x-6">
            <a href="{{ route('login') }}" class="text-gray-300 hover:text-white">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="text-gray-300 hover:text-white">Registrar</a>
            <a href="#" class="text-gray-300 hover:text-white"><i class="fas fa-shopping-cart text-2xl"></i></a>
        </div>
    </nav>

    <!-- Menú de opciones fijo debajo de la barra de navegación y búsqueda -->
    <div class="bg-blue-600 py-3 fixed w-full top-20 z-20 shadow-md"> <!-- Ajuste top-20 para mayor separación -->
        <div class="container mx-auto flex justify-around text-white">
            <a href="#" class="hover:underline">Electrónica</a>
            <a href="#" class="hover:underline">Moda</a>
            <a href="#" class="hover:underline">Hogar</a>
            <a href="#" class="hover:underline">Deportes</a>
            <a href="#" class="hover:underline">Belleza</a>
            <a href="#" class="hover:underline">Juguetes</a>
            <a href="#" class="hover:underline">Ofertas</a>
        </div>
    </div>

    <!-- Ajuste para el resto del contenido (para evitar ser tapado por el menú fijo) -->
    <div class="mt-40"></div> <!-- Espacio suficiente para el contenido -->

    <!-- Banner Principal -->
    <section class="bg-banner flex items-center justify-center text-white text-center mt-16">
        <div>
            <h1 class="text-5xl font-bold mb-4">Bienvenido a UpeuExpress</h1>
            <p class="text-lg mb-6">Encuentra las mejores ofertas en productos de calidad</p>
            <a href="#" class="primary-btn py-2 px-6 text-lg">Explorar Tienda</a>
        </div>
    </section>

    <!-- Ofertas del Día -->
    <section class="container mx-auto mt-10 px-4">
        <h2 class="section-title text-center mb-6">Ofertas del Día</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Ejemplo de productos -->
            @foreach (['imagen2.jpg', 'imagen3.jpg', 'imagen4.jpg', 'imagen5.jpg'] as $imagen)
                <div class="bg-white p-4 rounded-lg shadow-lg product-card">
                    <img src="/imagenes/{{ $imagen }}" alt="Producto" class="w-full h-40 object-cover mb-4 rounded">
                    <h3 class="text-lg font-bold text-gray-700">Producto {{ $loop->index + 1 }}</h3>
                    <p class="text-blue-600 font-semibold">$19.99</p>
                    <button class="primary-btn mt-4 w-full py-2">Comprar Ahora</button>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Productos Populares -->
    <section class="container mx-auto mt-12 px-4">
        <h2 class="section-title text-center mb-6">Productos Populares</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach (['imagen6.jpg', 'imagen7.jpg', 'imagen8.jpg', 'imagen9.jpg'] as $imagen)
                <div class="bg-white p-4 rounded-lg shadow-lg product-card">
                    <img src="/imagenes/{{ $imagen }}" alt="Producto" class="w-full h-40 object-cover mb-4 rounded">
                    <h3 class="text-lg font-bold text-gray-700">Producto {{ $loop->index + 5 }}</h3>
                    <p class="text-blue-600 font-semibold">$24.99</p>
                    <button class="primary-btn mt-4 w-full py-2">Ver Detalles</button>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Pie de Página -->
    <footer class="bg-gray-800 text-gray-400 mt-16">
        <div class="container mx-auto py-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Información</h3>
                <p><a href="#" class="hover:text-white">Acerca de UpeuExpress</a></p>
                <p><a href="#" class="hover:text-white">Preguntas Frecuentes</a></p>
                <p><a href="#" class="hover:text-white">Contáctanos</a></p>
            </div>
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Categorías</h3>
                <p><a href="#" class="hover:text-white">Electrónica</a></p>
                <p><a href="#" class="hover:text-white">Moda</a></p>
                <p><a href="#" class="hover:text-white">Hogar</a></p>
            </div>
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Redes Sociales</h3>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-blue-500"><i class="fab fa-facebook fa-2x"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-400"><i class="fab fa-twitter fa-2x"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-linkedin fa-2x"></i></a>
                    <a href="#" class="text-gray-400 hover:text-pink-500"><i class="fab fa-instagram fa-2x"></i></a>
                </div>
            </div>
        </div>
        <div class="text-center py-4 border-t border-gray-700 text-gray-500">
            &copy; 2024 UpeuExpress. Todos los derechos reservados.
        </div>
    </footer>

</body>
</html>
