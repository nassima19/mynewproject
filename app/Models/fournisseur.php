<?php

namespace App\Models;

use App\Models\produit;
use App\Models\service;
use App\Models\categorie; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class fournisseur extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
    protected $fillable = [
        'nom',
        'domaine_activite',
        'genre',
        'adresse',
        'titre',
        'ville',
        'pays',
        'code_postal',
        'curriel',
        'telephone',
        'site_internet',
        'note' ,
        'user_id',
        'categorie_id',
     ];

     public function service()
     {
         return $this->hasMany(service::class);
     }
     public function categorie()
    {
        return $this->belongsTo(categorie::class);
    }
    public function produit()
    {
       return $this->belongsToMany(produit::class, 'fournisseur_produit_table', 'produit_id', 'fournisseur_id');
    }
}
