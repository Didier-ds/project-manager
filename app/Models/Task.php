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
        'user_id',
        'project_id',
        'status_code',
    ];

    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        # code...
        return $this->belongsTo(Project::class);
    }
}
