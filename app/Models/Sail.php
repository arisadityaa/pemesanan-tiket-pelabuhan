<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sail extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'employe_id'];

    public function boking(){
        return $this->belongsTo(Boking::class);
    }

    public function employe(){
        return $this->belongsTo(Employe::class);
    }
}
