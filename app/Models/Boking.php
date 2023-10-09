<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boking extends Model
{
    use HasFactory;
    protected $fillabe = ['ticket_id','member_id', 'total_price', 'count', 'status'];

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }

}
