<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'status',
        'user_id',
    ];

    // A tarefa pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
