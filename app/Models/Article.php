<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Images;
use App\Models\Equipement;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $fillable = [
        'equipement_id',
        'name',
        'price',
        'description',
        
    ];
    public function equipement(){
        return $this->belongsTo(Equipement::class,'equipement_id','id');
    }
   


    public function images()
{
    return $this->hasMany(Images::class, 'article_id');
}

    

}
