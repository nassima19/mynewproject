<?php

namespace App\Exports;

use App\Models\User;
use App\Models\benificiere;
use Maatwebsite\Excel\Concerns\FromCollection;

class BenificiereExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return benificiere::all();
    }
}
