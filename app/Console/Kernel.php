<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $fechacamal=DB::table('fechas')->where('categoria',1)->orderby('id','desc')->first(); 
       $fechamercado= DB::table('fechas')->where('categoria',2)->orderby('id','desc')->first();
      //  logger();
        $schedule->call(function () use ($fechacamal) {
            DB::table('users')->where('current_team_id',8)->where('estado',0)
            ->update(['estado_matricula'=>false]); 
        })->yearlyOn('01','04','16:35');
 
        $schedule->call(function () use ($fechamercado) {
            DB::table('puestos_mercado')->where('estado_puesto','A')
            ->update(['matriculado'=>'N']); 
        })->yearlyOn('01','04','16:35');
        //yearlyOn($fechamercado->mes,$fechamercado->dia,$fechamercado->hora);
       
       
                
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
