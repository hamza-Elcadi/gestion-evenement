<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Img_event extends Model
{
    protected $primaryKey = 'id_image';
    use HasFactory;
    public function events(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
