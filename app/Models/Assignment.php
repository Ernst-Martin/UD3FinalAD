<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'subject_id',
        'title',
        'description',
        'max_score',
        'due_date',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}