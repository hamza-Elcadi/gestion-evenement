<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Organizer extends Model
{
    protected $primaryKey = 'id_organizer';
    use HasFactory;
    public function events(): hasMany
    {
        return $this->hasMany(Event::class);
    }
    public function ribs(): hasMany
    {
        return $this->hasMany(Rib::class);
    }
}
