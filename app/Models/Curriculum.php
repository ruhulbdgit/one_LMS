<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;
    public function homeworks() {
        return $this->hasMany(Homework::class);
    }
    public function attendence() {
        return $this->hasMany(Attendence::class);
    }
}
