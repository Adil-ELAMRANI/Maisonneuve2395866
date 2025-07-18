<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id', 'title_fr', 'title_en', 'filename'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
