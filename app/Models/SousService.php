<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sousServiceImage;
use App\Models\Service;


class SousService extends Model
{
    use HasFactory;
    protected $table = 'sous_service';
    protected $fillable = [
        'service_id',
        'typeName',
        'price',
        'description',
    ];
    public function service(){
        return $this->belongsTo(Service::class,'service_id','id');
    }
    public function sousServiceImages(){
        return $this->hasMany(SousServiceImage::class);
    }
}
