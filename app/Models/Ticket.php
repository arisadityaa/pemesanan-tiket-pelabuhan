<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['location_id', 'name', 'stock', 'price', 'description', 'sail_time'];

    public function location(){
        return $this->belongsTo(Location::class);
    }
}
