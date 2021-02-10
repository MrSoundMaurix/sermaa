<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComandosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cacheconfig()
    {   
        /* php artisan cache:clear */
        \Artisan::call('cache:clear');
        \Artisan::call('config:clear');   
        dd('cache clear y config successfully');
    }
    
    public function migrate()
    {
        \Artisan::call('migrate');
        dd('all migration run successfully');
    }

    public function seed()
    {
     //   \Artisan::call('db:seed', array('--class' => "AdminSeeder"));
     \Artisan::call('db:seed');
        dd('Seeder run successfully');
    }
    public function migratefresh() 
    {
        \Artisan::call('migrate:fresh');
        dd('all migration fresh run successfully');
    }

    
    
}
