<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


// app/Models/Candidate.php
class Candidate extends Model
{
    use HasFactory;

     protected $fillable = [
    'name',
    'visi',
    'misi',
    'photo',
    'password', // pastikan ini ada
];


    public function votes() {
        return $this->hasMany(Vote::class);
    }
}

