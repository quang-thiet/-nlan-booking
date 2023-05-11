<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'description',
        'content',
        'category_id'
    ];

    protected static function booted()
    {
        static::creating(function(Ticket $ticket) {
            $ticket->slug = str()->slug($ticket->name);
        });
    }

    public function times()
    {
        return $this->belongsToMany(TimeSlot::class, 'ticket_time', 'ticket_id', 'time_id');
    }

    public function types()
    {
        return $this->belongsToMany(TypeTicket::class, 'ticket_type', 'ticket_id', 'type_id')
                    ->withPivot('price');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
