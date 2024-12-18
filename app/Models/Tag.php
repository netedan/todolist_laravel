<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'tags_tasks');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'tags_projects');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'tag_project');
    }
}
