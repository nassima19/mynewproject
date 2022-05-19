<?php

namespace App\Models;

use App\Models\categorie;
use App\Models\fournisseur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
    protected $fillable = [
        'libele',
        'code_barre',
        'description',
        'methode_paiement',
        'user_id',
        'categorie_id',
        'image'
        ];
        public function categorie()
        {
          return $this->belongsTo(categorie::class);
            
        }
        public function fournisseur()
        {
           return $this->belongsToMany(fournisseur::class, 'fournisseur_produit_table', 'produit_id', 'fournisseur_id');
        }
        
}
