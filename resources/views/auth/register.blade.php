<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-white">
        <!-- Contenedor Principal -->
        <div class="w-full max-w-lg bg-white border-2 border-gray-200 rounded-lg shadow-xl">
            <!-- Encabezado con Logo -->
            <div class="flex justify-center p-6 bg-gradient-to-r from-orange-500 via-red-500 to-yellow-400 rounded-t-lg">
                <!-- Logo o Título -->
                <h1 class="text-4xl font-extrabold text-black">
                    <span class="text-black">Upeu</span><span class="text-black">Express</span>
                </h1>
            </div>

            <!-- Contenido del Formulario de Registro -->
            <div class="p-8">
                <h1 class="text-2xl font-bold text-gray-700 text-center mb-4">¡Crea tu cuenta en UpeuExpress!</h1>
                <p class="text-center text-gray-500 mb-6">Regístrate para acceder a las mejores ofertas y oportunidades.</p>

                <!-- Errores de Validación -->
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Nombre Completo -->
                    <div class="mb-4">
                        <x-label for="name" value="Nombre Completo" />
                        <x-input id="name" class="block mt-1 w-full border-2 border-gray-300 focus:border-orange-500 focus:ring focus:ring-orange-200 rounded-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="mb-4">
                        <x-label for="email" value="Correo Electrónico" />
                        <x-input id="email" class="block mt-1 w-full border-2 border-gray-300 focus:border-orange-500 focus:ring focus:ring-orange-200 rounded-lg" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>

                    <!-- Número de Celular -->
                    <div class="mb-4">
                        <x-label for="celular" value="Número de Celular" />
                        <x-input id="celular" class="block mt-1 w-full border-2 border-gray-300 focus:border-orange-500 focus:ring focus:ring-orange-200 rounded-lg" type="text" name="celular" :value="old('celular')" required />
                    </div>

                    <!-- Selección de Rol -->
                    <div class="mb-4">
                        <x-label for="rol" value="Tipo de Cuenta" />
                        <select id="rol" name="rol" class="block mt-1 w-full border-2 border-gray-300 focus:border-orange-500 focus:ring focus:ring-orange-200 rounded-lg" onchange="toggleCvUploadField()" required>
                            <option value="empresa" {{ old('rol') == 'empresa' ? 'selected' : '' }}>Empresa</option>
                            <option value="postulante" {{ old('rol') == 'postulante' ? 'selected' : '' }}>Postulante</option>
                        </select>
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-4">
                        <x-label for="password" value="Contraseña" />
                        <x-input id="password" class="block mt-1 w-full border-2 border-gray-300 focus:border-orange-500 focus:ring focus:ring-orange-200 rounded-lg" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="mb-4">
                        <x-label for="password_confirmation" value="Confirmar Contraseña" />
                        <x-input id="password_confirmation" class="block mt-1 w-full border-2 border-gray-300 focus:border-orange-500 focus:ring focus:ring-orange-200 rounded-lg" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <!-- Carga de archivo CV (solo para postulantes) -->
                    <div class="mb-4" id="cv-upload" style="display: none;">
                        <x-label for="archivo_cv" value="Cargar CV (solo para postulantes)" />
                        <x-input id="archivo_cv" class="block mt-1 w-full border-2 border-gray-300 focus:border-orange-500 focus:ring focus:ring-orange-200 rounded-lg" type="file" name="archivo_cv" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            ¿Ya tienes una cuenta?
                        </a>

                        <x-button class="ml-4 bg-gradient-to-r from-orange-500 via-red-500 to-yellow-500 hover:from-orange-600 hover:to-red-600 text-white px-6 py-2 rounded-lg shadow-lg">
                            Crear Cuenta
                        </x-button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Script para mostrar u ocultar el campo de carga de CV -->
    <script>
        function toggleCvUploadField() {
            var rol = document.getElementById('rol').value;
            var cvUploadField = document.getElementById('cv-upload');
            if (rol === 'postulante') {
                cvUploadField.style.display = 'block';
            } else {
                cvUploadField.style.display = 'none';
            }
        }

        // Llama a la función al cargar la página para establecer el estado inicial
        document.addEventListener('DOMContentLoaded', function() {
            toggleCvUploadField();
        });
    </script>
</x-guest-layout>
