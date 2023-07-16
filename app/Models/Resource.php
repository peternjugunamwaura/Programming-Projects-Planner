<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    public $fillable = ['description','technology_id','link'];

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }
}
