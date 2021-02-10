<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuario PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ public_path('css/user-pdf.css') }}">
</head>
<body>
    <table class="table">
        <tbody>
        {{-- <thead> --}}
            <tr>
                <th class="bg-info" scope="col">Cédula</th>
                <td class="bg-info">{{ $usuario->cedula }}</td>
                <td rowspan="6" colspan="2" class="text-center align-middle"> 
                    @if($usuario->foto == null)
                        -
                    @else
                    {{-- <div class="row"> --}}
                        {{-- <div class="d-flex justify-content-center align-items-center-center"> --}}
                            <img src="{{ "data:image/" . $usuario->fototype . ";base64," . $usuario->foto }}" style="max-width:200px;">
                        {{-- </div> --}}
                    {{-- </div> --}}
                    @endif 
                </td>
            </tr>
        {{-- </thead> --}}
        {{-- <tbody> --}}
            <tr class="bg-info">
            <th scope="row">Nombres</th>
            <td>{{ $usuario->nombres }}</td>
            </tr>
            <tr class="bg-info">
            <th scope="row">Apellidos</th>
            <td>{{ $usuario->apellidos }}</td>
            </tr>
            <tr class="bg-info">
            <th scope="row">Teléfono</th>
            <td>{{ $usuario->telefono }}</td>
            </tr>
            <tr class="bg-info">
            <th scope="row">Dirección</th>
            <td>{{ $usuario->direccion }}</td>
            </tr>
            <tr class="bg-info">
            <th scope="row">Rol</th>
            <td>{{ $usuario->currentTeam->name }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>