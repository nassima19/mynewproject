<?php

namespace App\Models;

use App\Models\produit;
use App\Models\fournisseur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fournisseur_produit extends Model
{
    use HasFactory;
   /*  public function produit(): BelongsTo
    {
        return $this->belongsTo(produit::class);
    }
        * Get the order that owns the OrderLines
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    
    public function fournisseur(): BelongsTo
    {
        return $this->belongsTo(fournisseur::class);
    } */
}
