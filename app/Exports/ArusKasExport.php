<?php

namespace App\Exports;

use App\Models\ArusKas;
use Maatwebsite\Excel\Concerns\FromCollection;

class ArusKasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ArusKas::all();
    }
}
