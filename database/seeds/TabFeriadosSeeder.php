<?php

use Illuminate\Database\Seeder;
use App\tab_feriados;

class TabFeriadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new tab_feriados();
        $p->fecha = date('Y-m-d', strtotime('2021-11-22'));
        $p->feriado = 'Feriado Puente';
        $p->save();
    }
}
