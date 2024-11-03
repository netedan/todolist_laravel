<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class User extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory, Authenticatable;

    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'email',
        'password'
    ];

    public function authoredTask()
    {
        return $this->hasMany(Task::class, 'author_id');
    }
    public function assignedTask()
    {
        return $this->hasMany(Task::class, 'executor_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'author_id');
    }
}
