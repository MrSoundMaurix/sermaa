<?php

namespace Database\Seeders;

use App\Models\Ubicacion;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

use League\Csv\Statement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Esta línea es necesaria para que en una Mac se detecten 
        // correctamente los caracteres de nueva línea
        if (!ini_get("auto_detect_line_endings")) {
            ini_set("auto_detect_line_endings", '1');
        }

        /*  $csv = fopen(public_path('csv/doc2.csv'), 'r');
        $reader = Reader::createFromPath('/path/to/file.csv', 'r'); */
        $csv = Reader::createFromPath(public_path('csv/provincias.csv'), 'r');
        // indicamos que el delimitador es el punto y coma
        $csv->setDelimiter(';');
        // Indicamos el índice de la fila de nombres de columnas

        $records = $csv->getRecords();

        foreach ($records as $r) {
            $registro = new Ubicacion();
            $registro->provincia = utf8_encode($r[0]);
            $registro->canton = utf8_encode($r[1]);
            $registro->parroquia = utf8_encode($r[2]);
            $registro->codigo = utf8_encode($r[3]);
            $registro->save();
        }
    }
}
