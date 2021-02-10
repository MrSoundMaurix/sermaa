<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Distribucion PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ public_path('css/estilos-pdf.css') }}">
</head>
<body>
    <header>
        <p style="font-size: 80%;"><strong>CERTIFICACIÓN SANITARIA DE ORIGEN Y MOVILIZACIÓN DE CANALES Y SUBPRODUCTOS CÁRNICOS DESTINADOS A CONSUMO HUMANO</strong></p>
    </header>
    <table class="table table-bordered table-sm">
        <tbody>
            <tr>
                {{-- <th colspan="2">Nombre del centro de faenamiento</th>
                <td colspan="2"></td> --}}
                <td colspan="5"><strong>NOMBRE DEL CENTRO DE FAENAMIENTO</strong></td>
            </tr>
            <tr>
                <td colspan="2"><strong>HORA:</strong> {{ Carbon\Carbon::parse($fecha)->format('H:i:s') }}</td>
                <td><strong>DÍA:</strong> {{ Carbon\Carbon::parse($fecha)->format('d') }}</td>
                <td><strong>MES:</strong> {{ Carbon\Carbon::parse($fecha)->format('m') }}</td>
                <td><strong>AÑO:</strong> {{ Carbon\Carbon::parse($fecha)->format('Y') }}</td>
            </tr>
        </tbody>
           
</body>
</html>