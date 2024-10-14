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
        'due_date',
        'status'
    ];
    public function archiveIfOverdue()
    {
        if ($this->status !== 'Archive' && now()->greaterThan($this->due_date)) {
            $this->status = 'Archive';
            $this->save();
        }
    }
}
