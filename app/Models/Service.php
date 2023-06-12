<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SousService;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';
    protected $fillable = [
        'serviceName',
        'image',
        
    ];

    public function SousService(){
        return $this->hasMany(SousService::class);
    }
}
