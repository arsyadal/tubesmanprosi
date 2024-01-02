<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BootcampAudience extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'bootcamp_id'];

    public function bootcamps(){
        return $this->belongsTo(Bootcamp::class, 'bootcamp_id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
