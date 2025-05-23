<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'priority', 'filetype', 'filelink',
        'status', 'department', 'requester_id', 'last_reply', 'last_replier',
    ];
    //also can be done by 
    //protected $protected=[];protected $guarded = [];
    

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}