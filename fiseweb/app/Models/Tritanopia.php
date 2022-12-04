<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tritanopia extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'checked'
    ];
    public function user(){
        return $this->belongsTo(Perguntas::class);
    }

}
