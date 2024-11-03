<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author_id',
        'executor_id',
        'project_id',
        'due_date',
        'status'
    ];
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_task');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function executor()
    {
        return $this->belongsTo(User::class, 'executor_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tags_tasks');
    }
    public function archiveIfOverdue()
    {
        if ($this->status !== 'Archive' && now()->greaterThan($this->due_date)) {
            $this->status = 'Archive';
            $this->save();
        }
    }
}
