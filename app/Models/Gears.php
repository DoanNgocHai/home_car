<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gears extends Model
{
    use HasFactory;

    protected $table = 'gears';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'thumbnail'
    ];
}
