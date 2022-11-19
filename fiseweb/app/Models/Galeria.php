<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'comentario',
        'status'
    ];
    public function user(){
        return $this->belongsTo(Users::class);
    }
}
