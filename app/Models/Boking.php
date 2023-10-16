<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boking extends Model
{
    use HasFactory;
    protected $fillable = ['ticket_id','member_id', 'total_price', 'count', 'status'];

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function sail(){
        return $this->hasOne(Sail::class);
    }

}
