<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-white">
        <!-- Contenedor Principal -->
        <div class="w-full max-w-lg bg-white border-2 border-gray-200 rounded-lg shadow-xl">
            <!-- Encabezado con Logo -->
            <div class="flex justify-center p-6 bg-gradient-to-r from-orange-500 via-red-500 to-yellow-400 rounded-t-lg">
                <!-- Texto de Logo con estilo -->
                <h1 class="text-4xl font-extrabold text-black">
                    <span class="text-black">Upeu</span><span class="text-black">Express</span>
                </h1>
            </div>

            <!-- Contenido -->
            <div class="p-8">
                <!-- Título -->
                <h1 class="text-2xl font-bold text-gray-700 text-center mb-4">¡Bienvenido a UpeuExpress!</h1>
                <p class="text-center text-gray-500 mb-6">Inicia sesión para acceder a las mejores ofertas y oportunidades.</p>

                <!-- Errores de Validación -->
                <x-validation-errors class="mb-4" />

                <!-- Mensaje de Estado -->
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Formulario -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div class="relative">
                        <label for="email" class="text-gray-700 font-semibold">{{ __('Correo Electrónico') }}</label>
                        <div class="relative mt-1">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <!-- Ícono de Correo -->
                                <svg class="w-6 h-6 text-orange-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0a4 4 0 100-8 4 4 0 100 8z" />
                                </svg>
                            </span>
                            <x-input id="email" class="block w-full pl-12 border-2 border-gray-300 focus:border-orange-500 focus:ring focus:ring-orange-200 rounded-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        </div>
                    </div>

                    <!-- Contraseña -->
                    <div class="relative">
                        <label for="password" class="text-gray-700 font-semibold">{{ __('Contraseña') }}</label>
                        <div class="relative mt-1">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <!-- Ícono de Contraseña -->
                                <svg class="w-6 h-6 text-orange-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.105.895-2 2-2h4a2 2 0 012 2v4a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4zm-6 4v2a2 2 0 002 2h4a2 2 0 002-2v-2m0 0v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2m0 0v2a2 2 0 002 2h4a2 2 0 002-2v-2" />
                                </svg>
                            </span>
                            <x-input id="password" class="block w-full pl-12 border-2 border-gray-300 focus:border-orange-500 focus:ring focus:ring-orange-200 rounded-lg" type="password" name="password" required autocomplete="current-password" />
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                        </label>
                    </div>

                    <!-- Botón de Iniciar Sesión -->
                    <div class="flex items-center justify-between mt-6">
                        <!-- Enlace de Olvidé mi Contraseña -->
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-orange-500 hover:text-orange-700" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif

                        <x-button class="ms-4 flex items-center gap-2 bg-gradient-to-r from-orange-500 via-red-500 to-yellow-500 hover:from-orange-600 hover:to-red-600 text-white px-6 py-2 rounded-lg shadow-lg">
                            <!-- Ícono de Login -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7-7 7" />
                            </svg>
                            {{ __('Iniciar Sesión') }}
                        </x-button>
                    </div>
                </form>

                <!-- Separador -->
                <div class="flex items-center my-6">
                    <div class="flex-grow h-px bg-gray-300"></div>
                    <span class="text-gray-500 mx-4">{{ __('O ingresa con') }}</span>
                    <div class="flex-grow h-px bg-gray-300"></div>
                </div>

                <!-- Botones Sociales -->
                <div class="flex justify-center gap-4">
                    <button class="flex items-center px-4 py-2 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" alt="Google" class="w-5 h-5 mr-2">
                        Google
                    </button>
                    <button class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook" class="w-5 h-5 mr-2">
                        Facebook
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
