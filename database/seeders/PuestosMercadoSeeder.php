<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PuestoMercado;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PuestosMercadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('puestos_mercado')->insert([
            'id' => 1,
            'nro_puesto' => '04',
            'codigo_barra' => '04345',
            'id_usuarios_mercado' =>1 ,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 1,
        ]);
        DB::table('puestos_mercado')->insert([
            'id' => 2,
            'nro_puesto' => 42,
            'codigo_barra' => '02321',
            'id_usuarios_mercado' =>2 ,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 1,
        ]);
        DB::table('puestos_mercado')->insert([
            'id' => 3,
            'nro_puesto' => 18,
            'codigo_barra' => '03456',
            'id_usuarios_mercado' =>3 ,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 1,
        ]);
        DB::table('puestos_mercado')->insert([
            'id' => 4,
            'nro_puesto' => 26,
            'codigo_barra' => '04765',
            'id_usuarios_mercado' =>4 ,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 1,
        ]);
        DB::table('puestos_mercado')->insert([
            'id' => 5,
            'nro_puesto' => 6,
            'codigo_barra' => '05765',
            'id_usuarios_mercado' =>5 ,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 2,
        ]);
        DB::table('puestos_mercado')->insert([
            'id' => 6,
            'nro_puesto' => 2,
            'codigo_barra' => '06567',
            'id_usuarios_mercado' =>6 ,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 2,
        ]);
        DB::table('puestos_mercado')->insert([
            'id' => 7,
            'nro_puesto' => 85,
            'codigo_barra' => '07756',
            'id_usuarios_mercado' =>7,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 2,
        ]);
        DB::table('puestos_mercado')->insert([
            'id' => 8,
            'nro_puesto' => 0,
            'codigo_barra' => '08765',
            'id_usuarios_mercado' =>8 ,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 2,
        ]);
        DB::table('puestos_mercado')->insert([
            'id' => 9,
            'nro_puesto' => 39,
            'codigo_barra' => '09456',
            'id_usuarios_mercado' =>9 ,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 2,
        ]);
        DB::table('puestos_mercado')->insert([
            'id' => 10,
            'nro_puesto' => 22,
            'codigo_barra' => '10453',
            'id_usuarios_mercado' =>10,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 2,
        ]);
        DB::table('puestos_mercado')->insert([
            'id' =>11,
            'nro_puesto' => 0,
            'codigo_barra' => '11765',
            'id_usuarios_mercado' =>11,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 2,
        ]);
        DB::table('puestos_mercado')->insert([
            'id' => 12,
            'nro_puesto' => 39,
            'codigo_barra' => '12543',
            'id_usuarios_mercado' =>12,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 2,
        ]);
        DB::table('puestos_mercado')->insert([
            'id' => 13,
            'nro_puesto' => 222,
            'codigo_barra' => '13423',
            'id_usuarios_mercado' =>13,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 2,
        ]);
        DB::table('puestos_mercado')->insert([
            'id' => 14,
            'nro_puesto' => 85,
            'codigo_barra' => '14324',
            'id_usuarios_mercado' =>14,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 2,
        ]);
        DB::table('puestos_mercado')->insert([
            'id' => 15,
            'nro_puesto' => 10,
            'codigo_barra' => '15754',
            'id_usuarios_mercado' =>15,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 2,
        ]);
        DB::table('puestos_mercado')->insert([
            'id' => 16,
            'nro_puesto' => 59,
            'codigo_barra' => '16765',
            'id_usuarios_mercado' =>16,
            'estado_puesto'=>1,
            'id_tipo_pago_mercado'=>1,
            'id_sector_mercado' => 2,
        ]);

       
    }
}
