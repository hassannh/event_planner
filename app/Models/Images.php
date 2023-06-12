<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = [
        'article_id',
        'images',
    ];


    public function articles()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
    
    
}

