<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
    public function people()
    {
        return $this->belongsToMany(Person::class);
    }
    public $timestamps = false;
    protected $guarded = [];
}
