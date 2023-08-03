<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    use HasFactory;

    protected $table = "Societe";

    protected $fillable = [
        'name',
        'nombre_employe',
        'statut',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function contact()
    {
        return $this->hasMany(Contact::class, 'id_societe');
    }

    function activite()
    {
        return $this->belongsToMany(Activite::class, 'societe_activite', 'id_societe', 'id_activite');
    }

}
