<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    protected $primaryKey = ['id_role', 'id_user'];
    use HasFactory;

}
