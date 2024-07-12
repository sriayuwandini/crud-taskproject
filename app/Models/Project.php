<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['task_id', 'name','image', 'deadline',];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
