<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
