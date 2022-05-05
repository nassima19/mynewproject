<?php

namespace App\Models;

use App\Models\produit;
use App\Models\fournisseur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class categorie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
   protected $fillable = [
    'libele',
    'description',
    "user_id",
    ];
    public function produits()
    {
        return $this->hasMany(produit::class);
    }
    public function fournisseur()
   {
    return $this->hasMany(fournisseur::class); 
   }
}
