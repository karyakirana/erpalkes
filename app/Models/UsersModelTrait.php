<?php namespace App\Models;

trait UsersModelTrait
{
    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
