<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'email',
        'birth_date',
        'nationality',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function phone()
    {
        return $this->hasMany(PersonPhone::class);
    }
}
