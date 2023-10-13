<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'title',
        'datetime',
        'place',
        'description',
        'user_id'
    ];
    
    public function user()
    {
    return $this->belongsTo(User::class);
    }
    
    public function userCanEdit(User $user)
    {
        return $this->user_id === $user->id;
    }

}