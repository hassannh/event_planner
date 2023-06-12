<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeEvent;

class Evenement extends Model
{
    use HasFactory;
    protected $table = 'evenement';
    protected $fillable = [
        'typeEvent_id',
        'salle_id',
        'user_id',
        'eventName',
        'guests',
        'ville',
        'datestart',
        'dateEnd',
        
    ];
    

    public function typeEvent(){
        return $this->belongsTo(TypeEvent::class,'typeEvent_id','id');
    }
    public function salle()
    {
    return $this->belongsTo(Salle::class, 'salle_id');
    }
  
}
