<?php

namespace App\Imports;

use App\Models\fournisseur;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FournisseurImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new fournisseur([
            //
            "nom" => $row['nom'], 
            "titre" => $row['titre'], 
            "domaine_activite" => $row['domaine_activite'],
            "adresse" => $row['adresse'],
            "genre" => $row['genre'],
            "telephone" => $row['telephone'],
            "categorie_id" => 2, // User Type User
            "user_id" => 11,
            "curriel" => $row['curriel'],
            "code_postal" => $row['code_postal'],
            "ville" => $row['ville'],
            "pays" => $row['pays'],
            "note" => $row['note'],
            "sit_internet" => $row['sit_internet'],
        ]);   
    }
}
