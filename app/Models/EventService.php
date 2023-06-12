<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventService extends Model
{
    use HasFactory;
    public $table = 'event_service';
    protected $fillable = [
        'event_id',
        'sousService_id',
    ];
}
