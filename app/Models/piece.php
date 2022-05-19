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
        'type_piece',
        'paiement_date',
        'numero',
        'note',
        'bank_account',
        'user_id',
        ];
      
            public function charges()
            {
                return $this->hasMany(charge::class);
            }
        
}
