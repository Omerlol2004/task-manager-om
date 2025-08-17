<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','completed','due_date','user_id'];
    protected $casts = ['completed' => 'boolean', 'due_date' => 'date'];

    // Helper method to get status text
    public function getStatusAttribute() {
        return $this->completed ? 'done' : 'pending';
    }

    public function user() { 
        return $this->belongsTo(User::class); 
    }
}
