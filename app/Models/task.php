<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = ['title','id_user','concluded', 'abandoned'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function subtasks()
    {
        return $this->hasMany(subtask::class,'id_task','id');
    }
}
