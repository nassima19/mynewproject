<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     ];
}
