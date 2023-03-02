<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonPhone extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone',
        'person_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
