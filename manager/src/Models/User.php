<?php

namespace Manager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Manager\Notifications\ResetPasswordNotification;

/**
 * @property string $username
 */
class User extends \Illuminate\Foundation\Auth\User
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $rememberTokenName = 'access_token';

    /**
     * @var string[]
     */
    protected $hidden = [
        'password',
        'cachepwd',
        'verified_key',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'username',
        'password',
        'cachepwd',
        'verified_key',
        'refresh_token',
        'access_token',
        'valid_to',
    ];

    /**
     * Send a password reset notification to the user.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        $url = 'https://example.com/reset-password?token=' . $token;

        $this->notify(new ResetPasswordNotification($url));
    }
}
