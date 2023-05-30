<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
class Category extends Model
{
    protected $primaryKey = 'id_category';
    use HasFactory;
    public function events(): hasMany
    {
        return $this->hasMany(Event::class);
    }
}
