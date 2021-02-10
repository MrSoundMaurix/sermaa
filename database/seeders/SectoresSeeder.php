<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SectorMercado;
use App\Models\TipoPagoMercado;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SectoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sector_mercado')->insert([
            'id' => 1,
            'codigo' => '03',
            'sector' => 'MERCADO ANDRADE MARÍN, Lunes-viernes, Todos los días',
            'mercado' => 'Andrade Marín',
            'estado' => 'A',
        ]);
        DB::table('sector_mercado')->insert([
            'id' => 2,
            'codigo' => '05',
            'sector' => 'SECTOR NORTE, Todos los días',
            'mercado' => 'Mercado Central Atuntaqui',
            'estado' => 'A',
        ]);
        DB::table('sector_mercado')->insert([
            'id' => 3,
            'codigo' => '06',
            'sector' => 'SECTOR PAPAS, Domingo',
            'mercado' => 'Mercado Central Atuntaqui',
        ]);
        DB::table('sector_mercado')->insert([
            'id' => 4,
            'codigo' => '08',
            'sector' => 'TEXTIL SUR B, Domingo',
            'mercado' => 'Mercado Central Atuntaqui',
            'estado' => 'A',
        ]);
        DB::table('sector_mercado')->insert([
            'id' => 5,
            'codigo' => '10',
            'sector' => 'ALTOS CÁMARA/COMERCIO',
            'mercado' => 'Mercado Central Atuntaqui',
            'estado' => 'A',
        ]);
        DB::table('sector_mercado')->insert([
            'id' => 6,
            'codigo' => '14',
            'sector' => 'CASETAS, Todos los días',
            'mercado' => 'Mercado Central Atuntaqui',
            'estado' => 'A',
        ]);
        DB::table('sector_mercado')->insert([
            'id' => 7,
            'codigo' => '12',
            'sector' => 'TEXTIL, Viernes',
            'mercado' => 'Mercado Central Atuntaqui',
            'estado' => 'A',
        ]);
        DB::table('sector_mercado')->insert([
            'id' => 8,
            'codigo' => '17',
            'sector' => 'TEXTIL SUR A, Domingo',
            'mercado' => 'Mercado Central Atuntaqui',
            'estado' => 'A',
        ]);
        DB::table('sector_mercado')->insert([
            'id' => 9,
            'codigo' => '26',
            'sector' => 'TEXTL, Sábado',
            'mercado' => 'Mercado Central Atuntaqui',
            'estado' => 'A',
        ]);
        DB::table('sector_mercado')->insert([
            'id' => 10,
            'codigo' => '28',
            'sector' => 'SECTOR DERROCADO, Domingo',
            'mercado' => 'Mercado Central Atuntaqui',
            'estado' => 'A',
        ]);
        DB::table('sector_mercado')->insert([
            'id' => 11,
            'codigo' => '29',
            'sector' => 'SECTOR DERROCADO, Viernes',
            'mercado' => 'Mercado Central Atuntaqui',
            'estado' => 'A',
        ]);

        ////    TIPO PAGO MERCADO
        DB::table('tipo_pago_mercado')->insert([
            'id' => 1,
            'tipo_pago' => 'Estable',
            'valor_pago' => 30.00,  
        ]);
        DB::table('tipo_pago_mercado')->insert([
            'id' => 2,
            'tipo_pago' => 'Semiestable',
            'valor_pago' => 0.50,    
        ]);
        
        DB::table('tipo_pago_mercado')->insert([
            'id' => 3,
            'tipo_pago' => 'Ocasional',
            'valor_pago' => 2.00,    
        ]);
    }
}
