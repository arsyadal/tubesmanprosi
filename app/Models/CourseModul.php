<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModul extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function modulQuestions(){
        return $this->hasMany(ModulQuestion::class, 'modul_id');
    }
}
