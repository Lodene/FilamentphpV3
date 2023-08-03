<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = "contact";

    protected $fillable = [
        'nom',
        'prenom',
        'statut',
        'id_societe',
    ];

    public function societe(){
        return $this->belongsTo(Societe::class, 'id_societe');
    }
}
