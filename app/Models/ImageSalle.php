<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageSalle extends Model
{
    use HasFactory;
    protected $table = 'image_salle';
    protected $fillable = [
        'salle_id',
        'images',
    ];

    public function Salle()
    {
        return $this->belongsTo(Salle::class,'salle_id');
    }
}

