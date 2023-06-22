<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
class Partner extends Model
{
    protected $primaryKey = 'id_partner';
    use HasFactory;
    public function events(): belongsToMany
    {
        return $this->belongsToMany(Event::class,'eventPartners', 'id_event', 'id_partner');
    }
}
