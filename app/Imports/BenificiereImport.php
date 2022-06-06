<?php

namespace App\Imports;

use App\Models\benificiere;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BenificiereImport implements ToModel ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new benificiere([
            //
            "curriel" => $row['curriel'],
            "genre" => $row['genre'],
            "ville" => $row['ville'],
            "pays" => $row['pays'],
            "number_employe" =>  $row['number_employe'],
            "nom" => $row['nom'], 
            "user_id" => 11,
            "date_naissance" =>  $row['date_naissance'], 
            "langue" =>  $row['langue'], 

        ]);
    }
}
