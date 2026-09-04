<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('is_active', true);
    }

    public function allChildren()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('allChildren');
    }

    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }
}
