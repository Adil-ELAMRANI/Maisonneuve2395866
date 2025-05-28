<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'birth_date',
        'city_id',
    ];

    // Définition de la relation vers la ville
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
