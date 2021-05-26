<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    /**
     * A product has one category. 
     * This function makes this association
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * A product has on picture, this function makes this association
     * @return BelongsTo
     */
    public function picture() {
        return $this->hasOne(Picture::class);
    }
}
