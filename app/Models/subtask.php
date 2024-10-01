<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subtask extends Model
{
    use HasFactory;
    protected $table = 'subtasks';
    protected $fillable = ['note', 'id_task', 'concluded'];

    public function task(){
        return $this->belongsTo(task::class,'id_task');
    }
}
