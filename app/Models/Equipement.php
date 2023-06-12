<?php

namespace App\Models;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    use HasFactory;

    protected $table = '_equipements';
    protected $fillable = [
        'nameEquipement',
        'slug',
        'image',
        
    ];

    public function articles(){
        return $this->hasMany(Article::class,'equipement_id','id');
    }
}

