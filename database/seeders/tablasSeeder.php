<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class tablasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingresos')->insert([

            'id' => 1,
            'fecha_ingreso' => Carbon::now(),
            'costo_total' => 83,
            'id_users' => 1,
        ]);
        DB::table('ingresos_detalle')->insert([
            'id' => 1,
            'especie' => 'v',
            'cantidad' => 2,
            'genero' => "Hembra",
            'costo_unitario' => 17,
            'id_ingresos' => 1,
            'subtotal' => 34,
            'total_piezas' => 8,
            'total_piernas_vacuno' => 4,
            'total_brazos_vacuno' => 4,

            'id_costo_faenamiento' => 1,
        ]);
        DB::table('ingresos_detalle')->insert([

            'id' => 2,
            'especie' => 'p',
            'cantidad' => 2,
            'genero' => "Macho",
            'costo_unitario' => 17,
            'id_ingresos' => 1,
            'subtotal' => 34,
            'total_piezas' => 8,
            'total_piernas_porcino' => 4,
            'total_brazos_porcino' => 4,
            'id_costo_faenamiento' => 1,
        ]);
        DB::table('ingresos_detalle')->insert([
            'id' => 3,
            'especie' => 'p',
            'cantidad' => 1,
            'genero' => "Macho",
            'costo_unitario' => 15,
            'subtotal' => 15,
            'id_ingresos' => 1,
            'total_piezas' => 4,
            'total_piernas_porcino' => 2,
            'total_brazos_porcino' => 2,
            'id_costo_faenamiento' => 2,
        ]);
        DB::table('animales')->insert([
            'id' => 1,
            'id_ingresos_detalle' => 1,
            'peso' => 603,

        ]);
        DB::table('animales')->insert([
            'id' => 2,
            'id_ingresos_detalle' => 1,
            'peso' => 729,

        ]);
        DB::table('animales')->insert([
            'id' => 3,
            'id_ingresos_detalle' => 2,
            'peso' => 631.4,

        ]);
        DB::table('animales')->insert([
            'id' => 4,
            'id_ingresos_detalle' => 2,
            'peso' => 542.2,

        ]);
        DB::table('animales')->insert([
            'id' => 5,
            'id_ingresos_detalle' => 3,
            'peso' => 737.1,

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 1,
            'id_ingresos_detalle' => 1,
            'peso' => 250.3,
            'pieza' => "Brazo izquierdo",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 1,
            'id_ingresos_detalle' => 1,
            'peso' => 248.36,
            'pieza' => "Brazo derecho",

        ]);

        DB::table('animales_piezas')->insert([
            'id_animales' => 1,
            'id_ingresos_detalle' => 1,
            'peso' => 256.36,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 1,
            'id_ingresos_detalle' => 1,
            'peso' => 247.98,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 2,
            'id_ingresos_detalle' => 1,
            'peso' => 256.13,
            'pieza' => "Brazo izquierdo",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 2,
            'id_ingresos_detalle' => 1,
            'peso' => 259.36,
            'pieza' => "Brazo derecho",

        ]);

        DB::table('animales_piezas')->insert([
            'id_animales' => 2,
            'id_ingresos_detalle' => 1,
            'peso' => 256.36,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 2,
            'id_ingresos_detalle' => 1,
            'peso' => 257.15,
            'pieza' => "Pierna izquierda",

        ]);

        DB::table('animales_piezas')->insert([
            'id_animales' => 3,
            'id_ingresos_detalle' => 2,
            'peso' => 259.13,
            'pieza' => "Brazo izquierdo",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 3,
            'id_ingresos_detalle' => 2,
            'peso' => 260.36,
            'pieza' => "Brazo derecho",

        ]);

        DB::table('animales_piezas')->insert([
            'id_animales' => 3,
            'id_ingresos_detalle' => 2,
            'peso' => 254.36,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 3,
            'id_ingresos_detalle' => 2,
            'peso' => 257.15,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 4,
            'id_ingresos_detalle' => 2,
            'peso' => 260.5,
            'pieza' => "Brazo izquierdo",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 4,
            'id_ingresos_detalle' => 2,
            'peso' => 260.36,
            'pieza' => "Brazo derecho",

        ]);

        DB::table('animales_piezas')->insert([
            'id_animales' => 4,
            'id_ingresos_detalle' => 2,
            'peso' => 259.68,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 4,
            'id_ingresos_detalle' => 2,
            'peso' => 261.46,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 5,
            'id_ingresos_detalle' => 3,
            'peso' => 343.43,
            'pieza' => "Brazo izquierdo",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 5,
            'id_ingresos_detalle' => 3,
            'peso' => 343.12,
            'pieza' => "Brazo derecho",

        ]);

        DB::table('animales_piezas')->insert([
            'id_animales' => 5,
            'id_ingresos_detalle' => 3,
            'peso' => 362.22,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 5,
            'id_ingresos_detalle' => 3,
            'peso' => 322.23,
            'pieza' => "Pierna izquierda",

        ]);

        //----------------------------------------

        DB::table('ingresos')->insert([

            'id' => 2,
            'fecha_ingreso' => Carbon::now(),
            'costo_total' => 83,
            'id_users' => 2,
        ]);
        DB::table('ingresos_detalle')->insert([
            'id' => 4,
            'especie' => 'v',
            'cantidad' => 2,
            'genero' => "Hembra",
            'costo_unitario' => 17,
            'id_ingresos' => 2,
            'subtotal' => 34,
            'total_piezas' => 8,
            'total_piernas_vacuno' => 4,
            'total_brazos_vacuno' => 4,
            'id_costo_faenamiento' => 1,
        ]);
        DB::table('ingresos_detalle')->insert([

            'id' => 5,
            'especie' => 'p',
            'cantidad' => 2,
            'genero' => "Macho",
            'costo_unitario' => 17,
            'id_ingresos' => 2,
            'subtotal' => 34,
            'total_piezas' => 8,
            'total_piernas_porcino' => 4,
            'total_brazos_porcino' => 4,
            'id_costo_faenamiento' => 1,
        ]);
        DB::table('ingresos_detalle')->insert([
            'id' => 6,
            'especie' => 'p',
            'cantidad' => 1,
            'genero' => "Macho",
            'costo_unitario' => 15,
            'subtotal' => 15,
            'id_ingresos' => 2,
            'total_piezas' => 4,
            'total_piernas_porcino' => 2,
            'total_brazos_porcino' => 2,
            'id_costo_faenamiento' => 2,
        ]);
        DB::table('animales')->insert([
            'id' => 6,
            'id_ingresos_detalle' => 4,
            'peso' => 603,

        ]);
        DB::table('animales')->insert([
            'id' => 7,
            'id_ingresos_detalle' => 4,
            'peso' => 729,

        ]);
        DB::table('animales')->insert([
            'id' => 8,
            'id_ingresos_detalle' => 5,
            'peso' => 631.4,

        ]);
        DB::table('animales')->insert([
            'id' => 9,
            'id_ingresos_detalle' => 5,
            'peso' => 542.2,

        ]);
        DB::table('animales')->insert([
            'id' => 10,
            'id_ingresos_detalle' => 6,
            'peso' => 737.1,

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 6,
            'id_ingresos_detalle' => 4,
            'peso' => 250.3,
            'pieza' => "Brazo izquierdo",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 6,
            'id_ingresos_detalle' => 4,
            'peso' => 248.36,
            'pieza' => "Brazo derecho",

        ]);

        DB::table('animales_piezas')->insert([
            'id_animales' => 6,
            'id_ingresos_detalle' => 4,
            'peso' => 256.36,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 6,
            'id_ingresos_detalle' => 4,
            'peso' => 247.98,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 7,
            'id_ingresos_detalle' => 4,
            'peso' => 256.13,
            'pieza' => "Brazo izquierdo",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 7,
            'id_ingresos_detalle' => 4,
            'peso' => 259.36,
            'pieza' => "Brazo derecho",

        ]);

        DB::table('animales_piezas')->insert([
            'id_animales' => 7,
            'id_ingresos_detalle' => 4,
            'peso' => 256.36,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 7,
            'id_ingresos_detalle' => 4,
            'peso' => 257.15,
            'pieza' => "Pierna izquierda",

        ]);

        DB::table('animales_piezas')->insert([
            'id_animales' => 8,
            'id_ingresos_detalle' => 5,
            'peso' => 259.13,
            'pieza' => "Brazo izquierdo",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 8,
            'id_ingresos_detalle' => 5,
            'peso' => 260.36,
            'pieza' => "Brazo derecho",

        ]);

        DB::table('animales_piezas')->insert([
            'id_animales' => 8,
            'id_ingresos_detalle' => 5,
            'peso' => 254.36,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 8,
            'id_ingresos_detalle' => 5,
            'peso' => 257.15,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 9,
            'id_ingresos_detalle' => 5,
            'peso' => 260.5,
            'pieza' => "Brazo izquierdo",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 9,
            'id_ingresos_detalle' => 5,
            'peso' => 260.36,
            'pieza' => "Brazo derecho",

        ]);

        DB::table('animales_piezas')->insert([
            'id_animales' => 9,
            'id_ingresos_detalle' => 5,
            'peso' => 259.68,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 9,
            'id_ingresos_detalle' => 5,
            'peso' => 261.46,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 10,
            'id_ingresos_detalle' => 6,
            'peso' => 343.43,
            'pieza' => "Brazo izquierdo",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 10,
            'id_ingresos_detalle' => 6,
            'peso' => 343.12,
            'pieza' => "Brazo derecho",

        ]);

        DB::table('animales_piezas')->insert([
            'id_animales' => 10,
            'id_ingresos_detalle' => 6,
            'peso' => 362.22,
            'pieza' => "Pierna izquierda",

        ]);
        DB::table('animales_piezas')->insert([
            'id_animales' => 10,
            'id_ingresos_detalle' => 6,
            'peso' => 322.23,
            'pieza' => "Pierna izquierda",

        ]);
    }
}
