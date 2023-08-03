<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Societe;
use App\Models\Activite;

class Relation_Societe_Activitie extends Model
{
    use HasFactory;

    protected $table = "societe_activites";

    protected $fillable = [
        'id_societe',
        'id_activite',
    ];

    public function activitie()
    {
        return $this->belongsToMany(Activite::class, 'id_activite', 'id');
    }

    public function societe()
    {
        return $this->belongsToMany(Societe::class, 'id_societe', 'id');
    }
}
