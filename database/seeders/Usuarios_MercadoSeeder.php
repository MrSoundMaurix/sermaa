<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UsuarioMercado;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Usuarios_MercadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios_mercado')->insert([
            'id' => 1,
          
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '1000806321',
            'nombres'=>'MARÍA PASTORA',
            'apellidos'=>'ACHINA GALLEGOS',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);
        DB::table('usuarios_mercado')->insert([
            'id' => 2,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '1003338520',
            'nombres'=>'CRUZ ELÍAS',
            'apellidos'=>'AMAGUAÑA MORETA',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);
        DB::table('usuarios_mercado')->insert([
            'id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '1003338520',
            'nombres'=>'ROSA ELIZABETH',
            'apellidos'=>'ANDRANGO CHILAMA',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);
        DB::table('usuarios_mercado')->insert([
            'id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '1003338520',
            'nombres'=>'ROSA ELIZABETH',
            'apellidos'=>'ANGAMARCA LIMAICO',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);
        DB::table('usuarios_mercado')->insert([
            'id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '1003105002',
            'nombres'=>'FERNANDA PAOLA',
            'apellidos'=>'ACERO OROZCO',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);
        DB::table('usuarios_mercado')->insert([
            'id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '1001618170',
            'nombres'=>'GLADYS MARÍA DEL CARME',
            'apellidos'=>'ÁVILA CALDERON',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);

        DB::table('usuarios_mercado')->insert([
            'id' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '1001543725',
            'nombres'=>'MARCIA PATRICIA',
            'apellidos'=>'BÁEZ FUENTES',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);
        DB::table('usuarios_mercado')->insert([
            'id' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '0601665185',
            'nombres'=>'MARÍA ROSA',
            'apellidos'=>'BALLA PILATAXI',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);
        DB::table('usuarios_mercado')->insert([
            'id' => 9,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '1001168424',
            'nombres'=>'YOLANDA ELOISA',
            'apellidos'=>'BARAHONA AVILA',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);
        DB::table('usuarios_mercado')->insert([
            'id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '1002565073',
            'nombres'=>'ZOILAROSANNA',
            'apellidos'=>'BENAVIDES HERRERA',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);
        DB::table('usuarios_mercado')->insert([
            'id' => 11,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '0400940193',
            'nombres'=>'FLOR MARÍA',
            'apellidos'=>'BERNAL ROSERO',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);
        DB::table('usuarios_mercado')->insert([
            'id' => 12,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '1002441762',
            'nombres'=>'LOURDES DEL ROCÍO',
            'apellidos'=>'BOLAÑOS CARLOSAMA',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);

        DB::table('usuarios_mercado')->insert([
            'id' => 13,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '1001309358',
            'nombres'=>'DOLORES',
            'apellidos'=>'BURGA CAIZA',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);
        DB::table('usuarios_mercado')->insert([
            'id' => 14,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '1718912858',
            'nombres'=>'HUMBERTO',
            'apellidos'=>'BURGA TIXICURO',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);
        DB::table('usuarios_mercado')->insert([
            'id' => 15,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '1001973930',
            'nombres'=>'CACHIMUEL MANRÍQUE',
            'apellidos'=>'MARÍA ESTHER',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);

        DB::table('usuarios_mercado')->insert([
            'id' => 16,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'cedula' => '1001496957',
            'nombres'=>'PEDRO MANUEL',
            'apellidos'=>'CAMPUES',
            'telefono'=>'0997656543',
            'direccion'=>'San Roque',
            'estado'   =>1,
        ]);
         
        
    }
}
