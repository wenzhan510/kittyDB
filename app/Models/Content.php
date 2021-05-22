<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $casts = [
        'data' => 'json',
    ];

    /**
     * Get the sheet associated with the content.
     */
    public function sheet()
    {
        return $this->belongsTo(Sheet::class);
    }

}
