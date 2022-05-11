<?php

namespace App\Models;

use App\Models\fournisseur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class service extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'methode_paiement',
        'user_id',
        'fournisseur_id'
        ];
        public function fournisseur()
        {
          return $this->belongsTo(fournisseur::class);
            
        }
}
