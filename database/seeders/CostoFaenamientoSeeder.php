<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CostoFaenamiento;
use App\Models\CostoCamal;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CostoFaenamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('costo_faenamiento')->insert([
            'id' => 1,
            'especie' => 'Bovino',
            'valor' => 17.50,
        ]);
        DB::table('costo_faenamiento')->insert([
            'id' => 2,
            'especie' => 'Porcino',
            'valor' => 15.50,
        ]);
        // 0=costos extras(costo-emergencia-bovino; costo-emergencia-porcino; costo-matricula; costo-adicional-no-matricula)
                                          // 1=costos distribución(sin-costo; fuera-mercado)
        DB::table('costo_camal')->insert([
            'id' => 1,
            'descripcion' => 'Bovino en estado de emergencia con matrícula',
            'valor' => 35,
            'categoria' => 0,
        ]);
        DB::table('costo_camal')->insert([
            'id' => 2,
            'descripcion' => 'Bovino en estado de emergencia sin matrícula',
            'valor' => 37,
            'categoria' => 0,
        ]);
        DB::table('costo_camal')->insert([
            'id' => 3,
            'descripcion' => 'Porcino en estado de emergencia con matrícula',
            'valor' => 31,
            'categoria' => 0,
        ]);
        DB::table('costo_camal')->insert([
            'id' => 4,
            'descripcion' => 'Porcino en estado de emergencia sin matrícula',
            'valor' => 33,
            'categoria' => 0,
        ]);
        DB::table('costo_camal')->insert([
            'id' => 5,
            'descripcion' => 'Costo de matrícula',
            'valor' => 25,
            'categoria' => 0,
        ]);
        DB::table('costo_camal')->insert([
            'id' => 6,
            'descripcion' => 'Costo adicional  de usuario no matrículado',
            'valor' => 1,
            'categoria' => 0,
        ]);
        DB::table('costo_camal')->insert([
            'id' => 7,
            'descripcion' => 'Sin costo',
            'valor' => 0,
            'categoria' => 1,
        ]);
        DB::table('costo_camal')->insert([
            'id' => 8,
            'descripcion' => 'Fuera del mercado',
            'valor' => 2,
            'categoria' => 1,
        ]);
    }
}
