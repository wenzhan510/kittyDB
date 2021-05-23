<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $casts = [
    //     'format' => 'json',
    // ];

    /**
     * Get all the contents associated with the sheet.
     */
    public function contents()
    {
        return $this->hasMany(Content::class)->orderBy('order_by');
    }

    public function columns()
    {
        return $this->hasMany(Column::class)->orderBy('order_by');
    }
}
