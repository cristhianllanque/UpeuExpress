<!-- resources/views/carrito/comprobante.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante de Compra</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        .container { width: 100%; padding: 20px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; color: #333; }
        .details, .items { width: 100%; margin-bottom: 20px; }
        .details p, .footer p { margin: 5px 0; }
        .items table { width: 100%; border-collapse: collapse; }
        .items th, .items td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .items th { background-color: #f2f2f2; }
        .footer { margin-top: 30px; text-align: center; color: #555; font-size: 0.9em; }
        .total, .igv, .grand-total { text-align: right; font-size: 1.1em; font-weight: bold; margin-top: 20px; }
        .grand-total { font-size: 1.3em; color: #333; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Encabezado de la Empresa -->
        <div class="header">
            <h1>Comprobante de Compra</h1>
            <p>Gracias por tu compra, {{ $nombre }}</p>
            <p><strong>Nombre de la Empresa:</strong> UpeuExpress</p>
            <p><strong>Comprobante de Pago:</strong> #{{ strtoupper(uniqid('UE-')) }}</p>
        </div>

        <!-- Detalles del Cliente -->
        <div class="details">
            <p><strong>Fecha:</strong> {{ now()->format('d/m/Y') }}</p>
            <p><strong>Fecha Estimada de Llegada:</strong> {{ now()->addDays(5)->format('d/m/Y') }}</p>
            <p><strong>Dirección de Envío:</strong> {{ $direccion }}</p>
            <p><strong>Ciudad:</strong> {{ $ciudad }}</p>
            <p><strong>Estado/Provincia:</strong> {{ $estado }}</p>
            <p><strong>País:</strong> {{ $pais }}</p>
            <p><strong>Código Postal:</strong> {{ $codigo_postal }}</p>
            <p><strong>Teléfono:</strong> {{ $telefono }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $email }}</p>
            <p><strong>Documento:</strong> {{ $documento }} - {{ $num_documento }}</p>
        </div>

        <!-- Detalles de la Compra -->
        <div class="items">
            <h2>Detalles de la Compra</h2>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carrito as $item)
                        <tr>
                            <td>{{ $item['producto']->nombre }}</td>
                            <td>{{ $item['cantidad'] }}</td>
                            <td>PEN {{ number_format($item['producto']->precio, 2) }}</td>
                            <td>PEN {{ number_format($item['producto']->precio * $item['cantidad'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Totales e IGV -->
        <p class="total">Subtotal: PEN {{ number_format($total, 2) }}</p>
        <p class="igv">IGV (18%): PEN {{ number_format($total * 0.18, 2) }}</p>
        <p class="grand-total">Total a Pagar: PEN {{ number_format($total * 1.18, 2) }}</p>

        <!-- Footer -->
        <div class="footer">
            <p>Este comprobante es generado automáticamente y sirve como evidencia de compra.</p>
            <p>Para más información, contacta a nuestro servicio al cliente en <strong>support@upeuexpress.com</strong>.</p>
            <p>&copy; 2024 UpeuExpress. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>
