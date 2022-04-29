<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'manager_id',
    ];

    public function manager()
    {
        # code...
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function tasks()
    {
        # code...
        return $this->hasMany(Task::class);
    }

    public function users()
    {
        # code...
        return $this->belongsToMany(User::class);
    }
}
