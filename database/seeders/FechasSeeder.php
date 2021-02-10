<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CostoFaenamiento;
use App\Models\CostoCamal;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FechasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fechas')->insert([
            
            'categoria' => 1, //1=>CAMAL 2=>MERCADO
            'descripcion'=>'camal',
            'anio' => date('Y'),
            'dia' => '31',
            'mes'=> '03',
            'hora'=>'23:59',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fechas')->insert([
           
            'categoria' => 2,
            'descripcion'=>'mercado',
            'anio' => date('Y'),
            'dia' => '31',
            'mes'=> '03',
            'hora'=>'23:59',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        // 0=costos extras(costo-emergencia-bovino; costo-emergencia-porcino; costo-matricula; costo-adicional-no-matricula)
                                          // 1=costos distribución(sin-costo; fuera-mercado)
      
    }
}
