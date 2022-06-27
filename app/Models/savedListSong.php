<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class savedListSong extends Model
{
    use HasFactory;

    protected $fillable = [
        'saved_list_id',
        'song_id',
    ];

    public function savedList()
    {
        return $this->belongsTo(SavedList::class);
    }
}
