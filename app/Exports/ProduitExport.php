<?php

namespace App\Exports;

use App\Models\User;
use App\Models\produit;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProduitExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return produit::all();
    }
}
