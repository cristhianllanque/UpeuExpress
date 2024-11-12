<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Nombre Completo -->
            <div class="mb-4">
                <x-label for="name" value="Nombre Completo" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <!-- Correo Electrónico -->
            <div class="mb-4">
                <x-label for="email" value="Correo Electrónico" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <!-- Número de Celular -->
            <div class="mb-4">
                <x-label for="celular" value="Número de Celular" />
                <x-input id="celular" class="block mt-1 w-full" type="text" name="celular" :value="old('celular')" required />
            </div>

            <!-- Selección de Rol -->
            <div class="mb-4">
                <x-label for="rol" value="Tipo de Cuenta" />
                <select id="rol" name="rol" class="block mt-1 w-full" onchange="toggleCvUploadField()" required>
                    <option value="empresa" {{ old('rol') == 'empresa' ? 'selected' : '' }}>Empresa</option>
                    <option value="postulante" {{ old('rol') == 'postulante' ? 'selected' : '' }}>Postulante</option>
                </select>
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <x-label for="password" value="Contraseña" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-4">
                <x-label for="password_confirmation" value="Confirmar Contraseña" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!-- Carga de archivo CV (solo para postulantes) -->
            <div class="mb-4" id="cv-upload" style="display: none;">
                <x-label for="archivo_cv" value="Cargar CV (solo para postulantes)" />
                <x-input id="archivo_cv" class="block mt-1 w-full" type="file" name="archivo_cv" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    ¿Ya tienes una cuenta?
                </a>

                <x-button class="ml-4">
                    Crear Cuenta
                </x-button>
            </div>
        </form>
    </x-authentication-card>

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
