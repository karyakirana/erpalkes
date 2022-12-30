<?php namespace App\Models;

trait UsersModelTrait
{
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
