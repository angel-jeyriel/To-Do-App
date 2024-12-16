<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $with = ['user:id,name'];

    protected $fillable = [
        'user_id',
        'name',
        'completed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
