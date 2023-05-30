<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_Partner extends Model
{
    protected $foreignKey = 'id_event';
    protected $relatedKey = 'id_partner';
    use HasFactory;
}
