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
                <td colspan="2"><strong>HORA:</strong> {{ Carbon\Carbon::parse($distribucion->fecha_actual)->format('H:i:s') }}</td>
                <td><strong>DÍA:</strong> {{ Carbon\Carbon::parse($distribucion->fecha_actual)->format('d') }}</td>
                <td><strong>MES:</strong> {{ Carbon\Carbon::parse($distribucion->fecha_actual)->format('m') }}</td>
                <td><strong>AÑO:</strong> {{ Carbon\Carbon::parse($distribucion->fecha_actual)->format('Y') }}</td>
            </tr>
            <tr>
                <td rowspan="3" style="width: 5%" class="text-center align-middle"><strong>ORIGEN</strong></td>
                <td colspan="2"><strong>PROVINCIA:</strong> {{ $distribucion->origen_provincia }}</td>
                <td rowspan="2" colspan="2" class="text-center"><strong>NOMBRE DEL DESTINATARIO</strong><br>{{ $distribucion->nombre_destinatario }}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>CANTÓN:</strong> {{ $distribucion->origen_canton }}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>PARROQUIA:</strong> {{ $distribucion->origen_parroquia }}</td>
                <td rowspan="2" colspan="2" class="text-center"><strong>LUGAR DE DESTINO</strong><br>{{ $distribucion->lugar_destino }}</td>
            </tr>
            <tr>
                <th rowspan="3" class="text-center align-middle">DESTINO</th>
                <td colspan="2"><strong>PROVINCIA:</strong> {{ $distribucion->destino_provincia }}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>CANTÓN:</strong> {{ $distribucion->destino_canton }}</td>
                <td rowspan="2" colspan="2" class="text-center"><strong>PLACA DEL MEDIO DE TRANSPORTE</strong><br>{{ $distribucion->placa_transporte }}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>PARROQUIA:</strong> {{ $distribucion->destino_parroquia }}</td>
            </tr>
            
            <tr>
                <td rowspan="<?php if(count($detalles) > 6 ) { echo 7; } else { echo count($detalles) + 1; } ?>" class="text-center align-middle"><strong>DETALLES</strong></td>
                <td><strong>ESPECIE</strong></td>
                <td><strong>PRODUCTO</strong></td>
                <td><strong>CANTIDAD</strong></td>
                <td><strong>NÚMERO DE ID</strong></td>
            </tr>
            <?php 
                if (count($detalles) <= 6) {
                    $ff = count($detalles);
                } else {
                    $detalles_aux = array_slice($detalles->toArray(), 0, 6);
                    $ff = count($detalles_aux);
                }
            ?>
            @for ($i = 0; $i < $ff; $i++)
                <tr>
                    <td>{{ $detalles[$i]->especie }}</td>
                    <td>{{ $detalles[$i]->producto }}</td>
                    <td>{{ $detalles[$i]->cantidad }}</td>
                    <td>{{ $detalles[$i]->numero_id }}</td>
                </tr>
            @endfor
            {{-- @foreach ($detalles as $det)
                <tr>
                    <td>{{ $det->especie }}</td>
                    <td>{{ $det->producto }}</td>
                    <td>{{ $det->cantidad }}</td>
                    <td>{{ $det->numero_id }}</td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
    <caption>
        <p style="font-size: 60%;">
            DOCUMENTO VÁLIDO POR 24 HORAS A PARTIR DE SU HORA DE EMISIÓN <br> <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            NOMBRE DEL MÉDICO VETERINARIO AUTORIZADO O PROPIETARIO SEGÚN CORRESPONDA
        </p>
        {{-- <p style="font-size: 60%; text-align:center; padding-top: 0.8cm;">NOMBRE DEL MÉDICO VETERINARIO AUTORIZADO O PROPIETARIO SEGÚN CORRESPONDA</p> --}}
    </caption>
    <?php 
        if (count($detalles) > 6) {
            if (count($detalles) % 6 == 0) {
                $pagina = count($detalles) / 6;
            } else {
                $pagina = floor(count($detalles) / 6) + 1;
            }
            $rowspan = 1;
        }
    ?>
    @if (isset($pagina))
        @for ($j = 1; $j < $pagina; $j++)
            <div class="page-break">
                <header>
                    <p style="font-size: 80%;">
                        @php
                            $detalles_aux = array_slice($detalles->toArray(), ($rowspan * 6), 6);
                        @endphp
                        <strong>CERTIFICACIÓN SANITARIA DE ORIGEN Y MOVILIZACIÓN DE CANALES Y SUBPRODUCTOS CÁRNICOS DESTINADOS A CONSUMO HUMANO</strong></p>
                </header>
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td colspan="5"><strong>NOMBRE DEL CENTRO DE FAENAMIENTO</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>HORA:</strong> {{ Carbon\Carbon::parse($distribucion->fecha_actual)->format('H:i:s') }}</td>
                            <td><strong>DÍA:</strong> {{ Carbon\Carbon::parse($distribucion->fecha_actual)->format('d') }}</td>
                            <td><strong>MES:</strong> {{ Carbon\Carbon::parse($distribucion->fecha_actual)->format('m') }}</td>
                            <td><strong>AÑO:</strong> {{ Carbon\Carbon::parse($distribucion->fecha_actual)->format('Y') }}</td>
                        </tr>
                        <tr>
                            <td rowspan="3" style="width: 5%" class="text-center align-middle"><strong>ORIGEN</strong></td>
                            <td colspan="2"><strong>PROVINCIA:</strong> {{ $distribucion->origen_provincia }}</td>
                            <td rowspan="2" colspan="2" class="text-center"><strong>NOMBRE DEL DESTINATARIO</strong><br>{{ $distribucion->nombre_destinatario }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>CANTÓN:</strong> {{ $distribucion->origen_canton }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>PARROQUIA:</strong> {{ $distribucion->origen_parroquia }}</td>
                            <td rowspan="2" colspan="2" class="text-center"><strong>LUGAR DE DESTINO</strong><br>{{ $distribucion->lugar_destino }}</td>
                        </tr>
                        <tr>
                            <th rowspan="3" class="text-center align-middle">DESTINO</th>
                            <td colspan="2"><strong>PROVINCIA:</strong> {{ $distribucion->destino_provincia }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>CANTÓN:</strong> {{ $distribucion->destino_canton }}</td>
                            <td rowspan="2" colspan="2" class="text-center"><strong>PLACA DEL MEDIO DE TRANSPORTE</strong><br>{{ $distribucion->placa_transporte }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>PARROQUIA:</strong> {{ $distribucion->destino_parroquia }}</td>
                        </tr>

                        <tr>
                            <td rowspan="{{ count($detalles_aux) + 1 }}" class="text-center align-middle"><strong>DETALLES</strong></td>
                            <td><strong>ESPECIE</strong></td>
                            <td><strong>PRODUCTO</strong></td>
                            <td><strong>CANTIDAD</strong></td>
                            <td><strong>NÚMERO DE ID</strong></td>
                        </tr>
                        @for ($k = ($rowspan * 6); $k < (count($detalles_aux) + ($rowspan * 6)); $k++)
                            <tr>
                                <td>{{ $detalles[$k]->especie }}</td>
                                <td>{{ $detalles[$k]->producto }}</td>
                                <td>{{ $detalles[$k]->cantidad }}</td>
                                <td>{{ $detalles[$k]->numero_id }}</td>
                            </tr>
                            @if (count($detalles) == $k)
                                @break
                            @endif
                        @endfor
                    </tbody>
                </table>
                <caption>
                    <p style="font-size: 60%;">
                        DOCUMENTO VÁLIDO POR 24 HORAS A PARTIR DE SU HORA DE EMISIÓN <br> <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        NOMBRE DEL MÉDICO VETERINARIO AUTORIZADO O PROPIETARIO SEGÚN CORRESPONDA
                    </p>
                </caption>
            </div>
            <?php 
                $rowspan++;
            ?>
        @endfor
    @endif
</body>
</html>