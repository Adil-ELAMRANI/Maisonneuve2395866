<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 'title_fr', 'title_en', 'content_fr', 'content_en'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
