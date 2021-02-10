<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class TipoPago_MercadoSeeder extends Seeder{

    /**
     * Run the database seeds.
     *
     * @return void
     */

     public function run () {
         DB::table('tipo_pago_mercado')->insert([
             'descripcion' => 'Matrícula ordinaria',
             'valor_pago' => 30,
             'categoria' => 1,
            
         ]);
         DB::table('tipo_pago_mercado')->insert([
            'descripcion' => 'Matrícula extraordinaria',
            'valor_pago' => 45,
            'categoria' => 1
        ]);
        DB::table('tipo_pago_mercado')->insert([
            'descripcion' => 'Costo de matrícula a partir del segundo puesto',
            'valor_pago' => 15,
            'categoria' => 1
        ]);
        DB::table('tipo_pago_mercado')->insert([
            'descripcion' => 'Tarifa adicional de usuario sin matrícula (eventual u ocasional)',
            'valor_pago' => 1.50,
            'categoria' => 2,
            'estadia'=>'EVENTUAL' //es para eventual y ocasional, pero se coloca solo uno cualquiera de los dos para que en las vistas aparezca como diario
        ]);
        DB::table('tipo_pago_mercado')->insert([
            'descripcion' => 'Eventual',
            'valor_pago' => 0.50,
            'categoria' => 0,
            'estadia'=>'EVENTUAL'
        ]);
        DB::table('tipo_pago_mercado')->insert([
            'descripcion' => 'Ocasional',
            'valor_pago' => 0.50,
            'categoria' => 0,
            'estadia'=>'OCASIONAL'
        ]);
        
/* 
        DB::table('tipo_pago_mercado')->insert([
            'descripcion' => 'Comidas-Mensual',
            'valor_pago' => 25,
            'categoria' => 0,
            'estadia'=>'PERMANENTE'
        ]);
        DB::table('tipo_pago_mercado')->insert([
            'descripcion' => 'Mariscos-Mensual',
            'valor_pago' => 54,
            'categoria' => 0,
            'estadia'=>'PERMANENTE'
        ]);
        DB::table('tipo_pago_mercado')->insert([
            'descripcion' => 'Lacteos-Mensual',
            'valor_pago' => 22.50,
            'categoria' => 0,
            'estadia'=>'PERMANENTE'
        ]);
        DB::table('tipo_pago_mercado')->insert([
            'descripcion' => 'Calzado-Mensual',
            'valor_pago' => 35.00,
            'categoria' => 0
        ]); */
        
       
     }
}