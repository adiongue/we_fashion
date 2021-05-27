<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'sizes', 'visible',
        'state', 'reference', 'category_id'
    ];

    /**
     * Check the value of category id before inserting in database
     * @param $value
     */
    public function setCategoryIdAttribute($value)
    {
        if($value == 0){
            $this->attributes['category_id'] = null;
        }else{
            $this->attributes['category_id'] = $value;
        }
    }

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
