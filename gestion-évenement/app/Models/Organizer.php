<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Organizer extends Model
{
    protected $primaryKey = 'id_organizer';
    use HasFactory;
    public function events(): hasMany
    {
        return $this->hasMany(Event::class, 'id_event');
    }
    public function ribs(): belongsTo
    {
        return $this->belongsTo(Rib::class, 'id_rib');
    }
}
