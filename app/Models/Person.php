<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    public function sports()
    {
        return $this->belongsToMany(Sport::class);
    }
    protected $guarded = [];
}
