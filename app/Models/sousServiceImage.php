<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SousService;


class sousServiceImage extends Model
{
    use HasFactory;
    protected $table = 'image_sousservice';
    protected $fillable = [
        'sous_service_id',
        'images',
    ];

    public function sousService(){
        return $this->belongsTo(SousService::class);
    }
}
