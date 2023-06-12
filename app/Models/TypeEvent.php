<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evenement;

class TypeEvent extends Model
{
    use HasFactory;

    protected $table = '_type_event';
    protected $fillable = [
       
        'TypeName',
        
    ];

    public function evenement(){
        return $this->hasMany(Evenement::class,'typeEvent_id','id');
    }

}
