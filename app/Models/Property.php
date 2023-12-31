<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the property_image associated with the Property
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function property_image()
    {
        return $this->hasMany(PropertyImage::class, 'property_id');
    }

    /**
     * Get the property_image associated with the Property
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function property_uploaded_images()
    {
        return $this->hasMany(PropertyUploadedImage::class, 'property_id');
    }
}
