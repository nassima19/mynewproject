<?php

namespace App\Exports;

use App\Models\User;
use App\Models\charge;
use Maatwebsite\Excel\Concerns\FromCollection;

class ChargeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return charge::all();
    }
}
