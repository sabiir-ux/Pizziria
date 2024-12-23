<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    // Définir la relation inverse avec l'utilisateur (un utilisateur peut avoir plusieurs commandes)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
