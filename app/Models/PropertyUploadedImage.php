<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyUploadedImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the properties that owns the PropertyUploadedImage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
