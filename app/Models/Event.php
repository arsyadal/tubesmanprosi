<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function audience(){
        return $this->hasMany(EventAudience::class, 'event_id');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($event) {
            $event->audience()->each(function($audience){
                $audience->delete();
            });
        });
    }
}
