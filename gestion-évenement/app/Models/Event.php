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
    protected $fillable = [
        'title_event',
        'description_event',
        'date_start',
        'duration',
        'location',
        'nbr_place',
        'status'
    ];

    use HasFactory;
    public function categories(): belongsTo
    {
        return $this->belongsTo(Category::class,'id_category');
    }

    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class,'eventUser', 'id_user','id_event');
    }

    public function partners(): belongsToMany
    {
        return $this->belongsToMany(Partner::class,'eventPartners', 'id_event', 'id_partner');
    }
    public function ImageEvents(): hasMany
    {
        return $this->hasMany(ImageEvent::class,'id_event');
    }
    public function organizers(): belongsTo
    {
        return $this->belongsTo(Organizer::class,'id_organizer');
    }
}
