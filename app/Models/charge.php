<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        ];
        public function piece()
        {
            return $this->hasOne(Piece::class)->withDefault();
        }
}
