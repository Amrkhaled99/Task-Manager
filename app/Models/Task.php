<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{


    // Set the table name
    protected $table = 'tasks';

    use HasFactory;

    // Define which attributes can be filled
    protected $fillable = [
        'title', 'description', 'assigned_by_id', 'assigned_to_id', 'due_date'
    ];

    // Relationship: Task is assigned to a user
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }

    // Relationship: Task is assigned by a user
    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by_id');
    }

}
