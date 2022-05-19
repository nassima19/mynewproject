<?php

namespace App\Models;

use App\Models\piece;
use App\Models\produit;
use App\Models\fournisseur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class charge extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
    protected $fillable = [
        'qte',
        'taxes',
        'date',
        'statu',
        'description',
        'remarque',
        'prix',
        'produit_id',
        'user_id',
        'total',
        'fournisseur_id',
        'piece_id',

        ];
        public function piece()
        {
            return $this->belongsTo(piece::class);
        }
        public function produit()
        {
            return $this->belongsTo(produit::class);
        }
        /**
         * Get the order that owns the OrderLines
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function fournisseur()
        {
            return $this->belongsTo(fournisseur::class);
        }
}
