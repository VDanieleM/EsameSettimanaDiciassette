<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progetto extends Model
{
    use HasFactory;

    public function attivitas()
    {
        return $this->hasMany(Attivita::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
