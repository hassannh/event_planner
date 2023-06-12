<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    public $table = 'factures';
    protected $fillable = [
        'user_id',
        'service_id',
        'article_id',
        'personnel_id',
    ];
}
