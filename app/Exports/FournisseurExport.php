<?php

namespace App\Exports;
use App\Models\fournisseur;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class FournisseurExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return fournisseur::all();
    }
}
