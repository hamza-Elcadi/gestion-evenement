<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    protected $foreignKey = 'id_role';
    protected $relatedKey = 'id_user';
    use HasFactory;

}
