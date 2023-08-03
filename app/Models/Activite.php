<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;

    protected $table = "activite";

    protected $fillable = [
        'intitule',
        'id_societe',
    ];

    public function societe(){
        return $this->belongsTo(Societe::class, 'id_societe');
    }
}
