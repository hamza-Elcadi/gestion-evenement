<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
class Role extends Model
{
    protected $primaryKey = 'id_role';
    use HasFactory;
    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}
