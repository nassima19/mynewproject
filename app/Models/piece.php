<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class piece extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
    protected $fillable = [
        'paiement_date',
        'numero',
        'note',
        'bank_account',
        ];
      
            public function charge()
            {
                return $this->belongsTo(charge::class);
            }
        
}
