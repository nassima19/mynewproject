<?php

namespace App\Imports;

use App\Models\produit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProduitImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new produit([
            //
            "libele" => $row['libele'], 
            "code_barre" => $row['code_barre'],
            "methode_paiement" => $row['methode_paiement'],
            "description" => $row['description'],
            "categorie_id" => 7, // User Type User
            "user_id" => 11,
      
        ]); 
     
    }
}
