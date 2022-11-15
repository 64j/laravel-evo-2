<?php

namespace Manager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
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
        //Notification::send($this, new ResetPasswordNotification());
    }

    /**
     * @param $driver
     * @param $notification
     *
     * @return string[]
     */
    public function routeNotificationForMail($driver, $notification = null): array
    {
        /** @var UserAttribute $attributes */
        $attributes = UserAttribute::query()
            ->firstWhere('internalKey', $this->getKey());

        return [$attributes->email => $this->username];
    }
}
