<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Import nécessaire pour utiliser Str::random


class Visite extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateHeureDebut',
        'dateHeureFin',
        'raison_visite_id',
        'type_visite_id',
        'statut_id',
        'personnel_id',
        'visiteur_id',
        'details',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($visite) {
            // Générer le UID avec le format 'VI+date+mois+jour+heure+min+sec'
            $now = now(); // `now()` est une fonction helper de Laravel qui retourne une instance de Carbon pour "maintenant"
            $uid = 'VI' . $now->format('YmdHis'); // Format exemple : VI20230308123547

            // Vérifiez si le UID existe déjà et régénérez-le si nécessaire
            while (Visite::where('uid', $uid)->exists()) {
                $now = now()->addSecond();
                $uid = 'VI' . $now->format('YmdHis');
            }

            $visite->uid = $uid;
        });
    }

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }

    public function typeVisite()
    {
        return $this->belongsTo(TypeVisite::class);
    }

    public function raisonVisite()
    {
        return $this->belongsTo(RaisonVisite::class);
    }

    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }

    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class);
    }
}
