<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bootcamp extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function audience(){
        return $this->hasMany(BootcampAudience::class, 'bootcamp_id');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($bootcamp) {
            $bootcamp->audience()->each(function($audience){
                $audience->delete();
            });
        });
    }
}
