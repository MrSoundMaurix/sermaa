<?php

namespace App\Exports;

use Maatwebsite\Excel\Files\LocalTemporaryFile;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Writer;
use Maatwebsite\Excel\Excel;
use App\Exports\ExtendWorksheets;
use App\Models\Antemorten;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\User;
use App\Models\IngresoCamal;

class ExcelExport implements WithEvents
{
    use Exportable;

    private $template_file =  null;
    public $fecha;

    public function __construct($fecha)
    {
        $this->fecha = $fecha;
    }

    /** 
     * @param string $template_file 
     * @return $this 
     */
    public function setTemplate(string $template_file)
    {
        if (file_exists($template_file)) {
            $this->template_file =  $template_file;
        }
        return $this;
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            BeforeExport::class => function (BeforeExport $event) {
                if (is_null($this->template_file)) {
                    return;
                }
                $event->writer->reopen(new LocalTemporaryFile($this->template_file), Excel::XLS);
                return;
            },

            BeforeWriting::class => function (BeforeWriting $event) {
                $event->writer->removeSheetByIndex(1);

                $esh = new ExtendWorksheets($event->writer->getSheetByIndex(0)->getDelegate());
                $esh->setValue('B7', 'IMBABURA');
                $esh->setValue('F7', 'ANTONIO ANTE');
                $esh->setValue('L7', 'ATUNTAQUI');
                $esh->setValue('S7', 'SERMAA EP');
                $esh->setValue('AA7', 'PAOLA GUERRERO');

                $antemortenB = Antemorten::whereDate('fecha', '=', $this->fecha)
                    ->where('especie', '=', 'Bovino')
                    ->get();
                $antemortenP = Antemorten::whereDate('fecha', '=', $this->fecha)
                    ->where('especie', '=', 'Porcino')
                    ->get();

                $row = 13;
                $suma_machos = 0;
                $suma_hembras = 0;

                foreach ($antemortenB as $a) {
                    $fecha = explode(" ", $a->fecha);
                    $esh->setValue('A' . $row, $fecha[0]);

                    $esh->setValue('B' . $row, $fecha[1]);
                    $esh->setValue('C' . $row, $a->especie);
                    $esh->setValue('D' . $row, $a->lugar_procedencia);
                    $esh->setValue('F' . $row, $a->csmi);
                    $esh->setValue('G' . $row, $a->nro_lote);
                    $esh->setValue('H' . $row, $a->etapa_productiva);
                    $esh->setValue('I' . $row, $a->nro_machos);
                    $esh->setValue('K' . $row, $a->nro_hembras);
                    $esh->setValue('M' . $row, $a->total_animales);
                    $esh->setValue('N' . $row, $a->nro_animales_muertos);
                    $esh->setValue('O' . $row, $a->causa_probable);
                    $esh->setValue('P' . $row, $a->decomiso);
                    $esh->setValue('Q' . $row, $a->aprovechamiento);
                    $esh->setValue('R' . $row, $a->nro_sindrome_nervioso);
                    $esh->setValue('S' . $row, $a->nro_sindrome_digestivo);
                    $esh->setValue('T' . $row, $a->nro_sindrome_respiratorio);
                    $esh->setValue('U' . $row, $a->nro_sindrome_vesicular);
                    $esh->setValue('V' . $row, $a->tipo_secrecion);
                    $esh->setValue('W' . $row, $a->nro_cojera);
                    $esh->setValue('X' . $row, $a->nro_ambulatorios);
                    $esh->setValue('Y' . $row, $a->nro_matanza_normal);
                    $esh->setValue('Z' . $row, $a->nro_matanza_especial);
                    $esh->setValue('AA' . $row, $a->nro_matanza_emergencia);
                    $esh->setValue('AB' . $row, $a->nro_aplazamiento_matanza);
                    $esh->setValue('AC' . $row, $a->observaciones);
                    $suma_machos = $suma_machos + $a->nro_machos;
                    $suma_hembras = $suma_hembras + $a->nro_hembras;


                    $row++;
                }

                $esh->setValue('H' . $row, "TOTAL");
                $esh->setValue('I' . $row, $suma_machos);
                $esh->setValue('K' . $row, $suma_hembras);
                $esh->setValue('M' . $row, $suma_machos + $suma_hembras);

                $row++;

                $suma_machos = 0;
                $suma_hembras = 0;

                foreach ($antemortenP as $a) {
                    $fecha = explode(" ", $a->fecha);
                    $esh->setValue('A' . $row, $fecha[0]);

                    $esh->setValue('B' . $row, $fecha[1]);
                    $esh->setValue('C' . $row, $a->especie);
                    $esh->setValue('D' . $row, $a->lugar_procedencia);
                    $esh->setValue('F' . $row, $a->csmi);
                    $esh->setValue('G' . $row, $a->nro_lote);
                    $esh->setValue('H' . $row, $a->etapa_productiva);
                    $esh->setValue('I' . $row, $a->nro_machos);
                    $esh->setValue('K' . $row, $a->nro_hembras);
                    $esh->setValue('M' . $row, $a->total_animales);
                    $esh->setValue('N' . $row, $a->nro_animales_muertos);
                    $esh->setValue('O' . $row, $a->causa_probable);
                    $esh->setValue('P' . $row, $a->decomiso);
                    $esh->setValue('Q' . $row, $a->aprovechamiento);
                    $esh->setValue('R' . $row, $a->nro_sindrome_nervioso);
                    $esh->setValue('S' . $row, $a->nro_sindrome_digestivo);
                    $esh->setValue('T' . $row, $a->nro_sindrome_respiratorio);
                    $esh->setValue('U' . $row, $a->nro_sindrome_vesicular);
                    $esh->setValue('V' . $row, $a->tipo_secrecion);
                    $esh->setValue('W' . $row, $a->nro_cojera);
                    $esh->setValue('X' . $row, $a->nro_ambulatorios);
                    $esh->setValue('Y' . $row, $a->nro_matanza_normal);
                    $esh->setValue('Z' . $row, $a->nro_matanza_especial);
                    $esh->setValue('AA' . $row, $a->nro_matanza_emergencia);
                    $esh->setValue('AB' . $row, $a->nro_aplazamiento_matanza);
                    $esh->setValue('AC' . $row, $a->observaciones);
                    $suma_machos = $suma_machos + $a->nro_machos;
                    $suma_hembras = $suma_hembras + $a->nro_hembras;
                    $row++;
                }

                $esh->setValue('H' . $row, "TOTAL");
                $esh->setValue('I' . $row, $suma_machos);
                $esh->setValue('K' . $row, $suma_hembras);
                $esh->setValue('M' . $row, $suma_machos + $suma_hembras);

                return;
            },
        ];
    }
}
