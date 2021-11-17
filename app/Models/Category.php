<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'parent',
        'showAtHome'
    ];

    public function parent() {
        return $this->belongsToOne(static::class, 'parent');
    }

    public function children() {
        return $this->hasMany(static::class, 'parent');
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
