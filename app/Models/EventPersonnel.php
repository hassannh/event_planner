<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPersonnel extends Model
{
    use HasFactory;
    public $table = 'event_personnel';
    protected $fillable = [
        'event_id',
        'personnel_id',
        'nbrHomme',
        'nbrFemme'
    ];
}
