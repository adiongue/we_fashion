<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * A category can have one or several categories.
     * This function makes this association
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
