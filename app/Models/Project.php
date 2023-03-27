<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name','technology_id','start_date','end_date','billing','effort','status'];
    public function technology()
    {
        return $this->belongsTo(technology::class);
    }
    public function tasks()
    {
        return $this::hasMany(Task::class);
    }
}
