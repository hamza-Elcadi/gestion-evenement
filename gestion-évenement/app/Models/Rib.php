<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
class Rib extends Model
{
    protected $primaryKey = 'id_role';
    use HasFactory;
    public function organizers(): belongsTo
    {
        return $this->belongsTo(Organizer::class);
    }
}
