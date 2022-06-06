<?php

namespace App\Imports;

use App\Models\charge;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ChargeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new charge([
            //
            "fournisseur_id" => $row['fournisseur_id'],
            "produit_id" => $row['produit_id'],
            "qte" => $row['qte'],
            "taxes" => $row['taxes'],
            "date" => $row['date'],
            "statu" => $row['statu'],
            "prix" => $row['prix'],
            "total" => $row['total'],
            "description" => $row['description'],
            "piece_id" => $row['piece_id'],
            "user_id" =>11,
        ]);
    }
}
