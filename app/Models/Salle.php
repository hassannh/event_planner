<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ImageSalle;

class Salle extends Model
{
    use HasFactory;
    protected $table = 'salle';
    protected $fillable = [
        'SalleName',
        'price',
        'capacite',
        'description',
        'images',
        
    ];

    // public function ImageSalle()
    // {
    //     return $this->hasOne(ImageSalle::class);
    // }

//     public function ImageSalle()
// {
//     return $this->hasOne(ImageSalle::class, 'salle_id');
// }

// Salle.php

public function imageSalle()
{
    return $this->hasOne(ImageSalle::class);
}


}




