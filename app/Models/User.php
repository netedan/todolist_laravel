<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'patronymic'
    ];

    public function authoredTask()
    {
        return $this->hasMany(Task::class, 'author_id');
    }
    public function assignedTask()
    {
        return $this->hasMany(Task::class, 'executor_id');
    }
}
