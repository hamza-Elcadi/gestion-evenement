<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
class Category extends Model
{
    protected $primaryKey = 'id_category';
    protected $fillable = ['name_category'];
    public function events(): hasMany
    {
        return $this->hasMany(Event::class,'id_category');
    }
}
