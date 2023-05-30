<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Event extends Model
{
    protected $primaryKey = 'id_event';
    use HasFactory;
    public function categories(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function partners(): belongsToMany
    {
        return $this->belongsToMany(Partner::class);
    }
    public function img_events(): hasMany
    {
        return $this->hasMany(Img_event::class);
    }
}
