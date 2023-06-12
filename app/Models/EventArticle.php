<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventArticle extends Model
{
    use HasFactory;
    
    public $table = '_event_article';
    protected $fillable = [
        'event_id',
        'article_id',
        'quantite'
    ];
}
