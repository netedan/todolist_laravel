<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'author_id',
        'executor_id',
        'project_id'
    ];
        public function tags()
        {
            return $this->belongsToMany(Tag::class, 'tags_tasks');
        }
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
