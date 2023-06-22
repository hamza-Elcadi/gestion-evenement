<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
class Rib extends Model
{
    protected $primaryKey = 'id_rib';
    protected $fillable = [
        'name_rib',
    ];
    use HasFactory;
    public function organizers(): hasMany
    {
        return $this->hasMany(Organizer::class, 'id_rib');
    }
}
