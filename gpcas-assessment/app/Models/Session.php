<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Session extends Model

{
    use HasFactory;


    protected $table = 'event_sessions';
    protected $fillable = ['title','event_id'];

    public function event() {
        return $this->belongsTo(Event::class);
    }

    // public function speakers() {
    //     return $this->belongsToMany(Speaker::class);
    // }

    public function speakers() {
        return $this->belongsToMany(Speaker::class, 'session_speaker');
    }
}
