<?php

declare(strict_types=1);

namespace App\Domain\Users\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use App\Domain\Tweets\Entities\Tweet;
use Illuminate\Database\Eloquent\Model;

final class User extends Model
{
    use Notifiable, Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Users have many tweets
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }
}
