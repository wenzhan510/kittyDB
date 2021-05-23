<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;

    protected $guarded = [];

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

    public function allowed_link_contents()
    {
        if($this->rules && array_key_exists('sheet_limit', $this->rules)){
            $sheet = Sheet::where('name', $this->rules['sheet_limit'])->first();
            if($sheet){
                return Content::where('sheet_id', $sheet->id)->get();
            }
        }
        return Content::all();
    }

}
