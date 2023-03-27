<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $fillable = ['name','proficiency'];
    public function resources()
    {
        return $this->hasMany(Resource::class);
    }
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}

