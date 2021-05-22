<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;

    protected $casts = [
        'rules' => 'json',
    ];

    /**
     * Get the sheet associated with the content.
     */
    public function sheet()
    {
        return $this->belongsTo(Sheet::class);
    }

}
