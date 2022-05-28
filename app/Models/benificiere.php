<?php

namespace App\Models;

use App\Models\charge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class benificiere extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
   protected $fillable = [
       'nom',
       'curriel',
       'genre',
       'langue',
       'date_naissance',
       'ville',
       'pays',
       'number_employe' ,
       'user_id'
    ];
    public function getRouteKeyName()
    {
      return 'id';
    }
    public function charge()
    {
       return $this->belongsToMany(charge::class);
    }
}
