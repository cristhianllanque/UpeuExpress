<!-- resources/views/carrito/checkout.blade.php -->
<x-app-layout>
    <div class="container mx-auto py-8 px-4">
        <h2 class="text-4xl font-bold text-center mb-8 text-gray-800">Formulario de Pago</h2>

        <form action="{{ route('carrito.procesarCompra') }}" method="POST" class="space-y-6 max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            @csrf

            <!-- Información Personal -->
            <h3 class="text-2xl font-semibold text-gray-700 mb-4">Información Personal</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="relative">
                    <label for="nombre" class="block text-sm font-semibold text-gray-700">Nombre Completo</label>
                    <div class="flex items-center">
                        <i class="fas fa-user text-gray-500 mr-2"></i>
                        <input type="text" name="nombre" id="nombre" required class="w-full p-3 border rounded" placeholder="Nombre completo">
                    </div>
                </div>
                
                <div class="relative">
                    <label for="telefono" class="block text-sm font-semibold text-gray-700">Teléfono</label>
                    <div class="flex items-center">
                        <i class="fas fa-phone-alt text-gray-500 mr-2"></i>
                        <input type="text" name="telefono" id="telefono" required class="w-full p-3 border rounded" placeholder="Teléfono">
                    </div>
                </div>
                
                <div class="relative">
                    <label for="email" class="block text-sm font-semibold text-gray-700">Correo Electrónico</label>
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-gray-500 mr-2"></i>
                        <input type="email" name="email" id="email" required class="w-full p-3 border rounded" placeholder="Correo electrónico">
                    </div>
                </div>

                <div class="relative">
                    <label for="documento" class="block text-sm font-semibold text-gray-700">Tipo de Documento</label>
                    <div class="flex items-center">
                        <i class="fas fa-id-card text-gray-500 mr-2"></i>
                        <select name="documento" id="documento" required class="w-full p-3 border rounded">
                            <option value="dni">DNI</option>
                            <option value="pasaporte">Pasaporte</option>
                            <option value="cedula">Cédula</option>
                        </select>
                    </div>
                </div>

                <div class="relative">
                    <label for="num_documento" class="block text-sm font-semibold text-gray-700">Número de Documento</label>
                    <div class="flex items-center">
                        <i class="fas fa-id-badge text-gray-500 mr-2"></i>
                        <input type="text" name="num_documento" id="num_documento" required class="w-full p-3 border rounded" placeholder="Número de documento">
                    </div>
                </div>
            </div>

            <!-- Dirección de Envío -->
            <h3 class="text-2xl font-semibold text-gray-700 mt-6 mb-4">Dirección de Envío</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="relative">
                    <label for="direccion" class="block text-sm font-semibold text-gray-700">Dirección</label>
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-gray-500 mr-2"></i>
                        <input type="text" name="direccion" id="direccion" required class="w-full p-3 border rounded" placeholder="Dirección de envío">
                    </div>
                </div>
                
                <div class="relative">
                    <label for="ciudad" class="block text-sm font-semibold text-gray-700">Ciudad</label>
                    <div class="flex items-center">
                        <i class="fas fa-city text-gray-500 mr-2"></i>
                        <input type="text" name="ciudad" id="ciudad" required class="w-full p-3 border rounded" placeholder="Ciudad">
                    </div>
                </div>

                <div class="relative">
                    <label for="estado" class="block text-sm font-semibold text-gray-700">Estado/Provincia</label>
                    <div class="flex items-center">
                        <i class="fas fa-map text-gray-500 mr-2"></i>
                        <input type="text" name="estado" id="estado" required class="w-full p-3 border rounded" placeholder="Estado/Provincia">
                    </div>
                </div>

                <div class="relative">
                    <label for="codigo_postal" class="block text-sm font-semibold text-gray-700">Código Postal</label>
                    <div class="flex items-center">
                        <i class="fas fa-mail-bulk text-gray-500 mr-2"></i>
                        <input type="text" name="codigo_postal" id="codigo_postal" required class="w-full p-3 border rounded" placeholder="Código Postal">
                    </div>
                </div>

                <div class="relative">
                    <label for="pais" class="block text-sm font-semibold text-gray-700">País</label>
                    <div class="flex items-center">
                        <i class="fas fa-globe text-gray-500 mr-2"></i>
                        <input type="text" name="pais" id="pais" required class="w-full p-3 border rounded" placeholder="País">
                    </div>
                </div>
            </div>

            <!-- Detalles de Pago -->
            <h3 class="text-2xl font-semibold text-gray-700 mt-6 mb-4">Detalles de Pago</h3>
            <div class="space-y-4">
                <div class="relative">
                    <label for="tipo_pago" class="block text-sm font-semibold text-gray-700">Método de Pago</label>
                    <div class="flex items-center">
                        <i class="fas fa-wallet text-gray-500 mr-2"></i>
                        <select name="tipo_pago" id="tipo_pago" class="w-full p-3 border rounded" onchange="mostrarQR()">
                            <option value="tarjeta">Tarjeta de Crédito/Débito</option>
                            <option value="paypal">PayPal</option>
                            <option value="transferencia">Transferencia Bancaria</option>
                            <option value="yape">Yape</option>
                        </select>
                    </div>
                </div>
                
                <!-- Campos para Tarjeta de Crédito -->
                <div id="tarjeta_fields">
                    <div class="relative">
                        <label for="tarjeta_numero" class="block text-sm font-semibold text-gray-700">Número de Tarjeta</label>
                        <div class="flex items-center">
                            <i class="fas fa-credit-card text-gray-500 mr-2"></i>
                            <input type="text" name="tarjeta_numero" id="tarjeta_numero" placeholder="0000 0000 0000 0000" class="w-full p-3 border rounded">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="relative">
                            <label for="expiracion" class="block text-sm font-semibold text-gray-700">Fecha de Expiración</label>
                            <div class="flex items-center">
                                <i class="fas fa-calendar-alt text-gray-500 mr-2"></i>
                                <input type="text" name="expiracion" id="expiracion" placeholder="MM/YY" class="w-full p-3 border rounded">
                            </div>
                        </div>
                        
                        <div class="relative">
                            <label for="cvv" class="block text-sm font-semibold text-gray-700">CVV</label>
                            <div class="flex items-center">
                                <i class="fas fa-lock text-gray-500 mr-2"></i>
                                <input type="text" name="cvv" id="cvv" placeholder="123" class="w-full p-3 border rounded">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Imagen QR de Yape -->
                <div id="qr_yape" class="text-center mt-8 hidden">
                    <p class="text-lg font-semibold text-gray-700 mb-2">Escanea el código QR con Yape para realizar el pago</p>
                    <img src="{{ asset('imagenes/qr.jpg') }}" alt="QR de Yape" class="w-48 h-48 mx-auto shadow-md border border-gray-200 rounded-lg">
                </div>
            </div>

            <!-- Botón de Confirmación -->
            <div class="text-center">
                <button type="submit" id="confirmar_btn" disabled class="w-full bg-gray-400 text-white py-3 rounded-lg font-bold opacity-50 transition duration-200 mt-4">
                    Confirmar Compra
                </button>
                <p id="confirm_message" class="text-gray-700 mt-2"></p>
            </div>
        </form>
    </div>

    <script>
        function mostrarQR() {
            const tipoPago = document.getElementById('tipo_pago').value;
            const qrYape = document.getElementById('qr_yape');
            const tarjetaFields = document.getElementById('tarjeta_fields');
            const confirmarBtn = document.getElementById('confirmar_btn');
            const confirmMessage = document.getElementById('confirm_message');

            if (tipoPago === 'yape') {
                qrYape.classList.remove('hidden');
                tarjetaFields.classList.add('hidden');
                confirmarBtn.disabled = true;
                confirmarBtn.classList.add('bg-gray-400', 'opacity-50'); // Cambia a gris y opaco
                confirmarBtn.classList.remove('bg-green-500'); // Remueve el verde
                confirmMessage.innerText = "Realize el pago mediante Qr";
                
                setTimeout(() => {
                    confirmarBtn.disabled = false;
                    confirmarBtn.classList.remove('bg-gray-400', 'opacity-50'); // Remueve el gris y opaco
                    confirmarBtn.classList.add('bg-green-500'); // Cambia a verde
                    confirmMessage.innerText = "¡Puede confirmar su pago ahora!";
                }, 15000);
            } else {
                qrYape.classList.add('hidden');
                tarjetaFields.classList.remove('hidden');
                confirmarBtn.disabled = false;
                confirmarBtn.classList.add('bg-green-500'); // Asegura que sea verde
                confirmarBtn.classList.remove('bg-gray-400', 'opacity-50');
                confirmMessage.innerText = "";
            }
        }
    </script>
</x-app-layout>
