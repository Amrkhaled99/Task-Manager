<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatistic extends Model
{
    // Set the table name
    protected $table = 'statistics';

    use HasFactory;

    // Define which fields can be filled
    protected $fillable = ['user_id', 'task_count'];

    // Relationship: TaskStatistic belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
