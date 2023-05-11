<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'fullname',
        'phone',
        'ticket_id',
        'detail'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
