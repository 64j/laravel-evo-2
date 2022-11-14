<?php

declare(strict_types=1);

namespace Manager\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Manager\Models\UserAttribute;

class ResetPasswordNotification extends Notification
{
    /**
     * @param $notifiable
     *
     * @return string[]
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * @param $notifiable
     *
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        $url = url('/manager/reset-password?token=' . $notifiable->refresh_token);
        $email = UserAttribute::query()->find($notifiable->getKey())->value('email');

        return (new MailMessage())
            ->greeting('Hello!')
            ->replyTo($email)
            ->line('One of your invoices has been paid!')
            ->action('View Invoice', $url)
            ->line('Thank you for using our application!');
    }

    /**
     * @param $notifiable
     *
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [];
    }
}
