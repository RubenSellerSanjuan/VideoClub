<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $table = 'series';

    protected $fillable = [
        'id',
        'title',
        'image',
        'description',
        'release_year',
        'seasons',
        'episodes',
        'price',
        'rent_price',
        'quantity',
        'type',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'series_genre', 'series_id', 'genre_id');
    }
}
