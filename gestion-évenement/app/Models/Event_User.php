<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_User extends Model
{
    protected $foreignKey = 'id_event';
    protected $relatedKey = 'id_user';
    use HasFactory;
}
