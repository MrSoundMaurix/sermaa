<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UbicacionSeeder::class);
        $this->call(CostoFaenamientoSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TipoPago_MercadoSeeder::class);
        $this->call(FechasSeeder::class);
      //  $this->call(SectoresSeeder::class);
       // $this->call(Usuarios_MercadoSeeder::class);
      //  $this->call(PuestosMercadoSeeder::class);
       // $this->call(tablasSeeder::class);
    }
}
