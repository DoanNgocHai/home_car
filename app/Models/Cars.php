<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Html\Colors;

class Cars extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'slug',
        'price',
        'brand_id',
        'figure_id',
        'gear_id',
        'color_id',
        'user_id',
        'year',
        'odo',
        'description',
        'thumbnail',
        'images',
        'status'
    ];

    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id', 'id');
    }

    public function figure()
    {
        return $this->belongsTo(Figures::class, 'figure_id', 'id');
    }

    public function gear()
    {
        return $this->belongsTo(Gears::class, 'gear_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(Colors::class, 'color_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
