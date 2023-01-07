<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculumn extends Model
{
    use HasFactory;
    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }

    public function attendences()
    {
        return $this->hasMany(Attendence::class);
    }
}
