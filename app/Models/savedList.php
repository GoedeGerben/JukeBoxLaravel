<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class savedList extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'user_id',
        'duration',
    ];

    public function savedListSong()
    {
        return $this->hasMany(SavedListSong::class);
    }
}
