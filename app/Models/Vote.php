<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    /**
     * Kolom yang bisa diisi secara massal
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'candidate_id',
    ];

    /**
     * Relasi ke User (siapa yang memilih)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Candidate (kandidat yang dipilih)
     */
   public function candidate()
{
    return $this->belongsTo(Candidate::class, 'candidate_id');
}
}
