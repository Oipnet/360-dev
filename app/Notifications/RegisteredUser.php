<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisteredUser extends Notification
{

    use Queueable;

    /**
     * RegisteredUser constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's dlivery channel
     *
     * @param mixed     $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification
     *
     * @param mixed     $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->success()
            ->subject('Inscription sur ' . env('APP_NAME'))
            ->line('Votre compte à bien été créé, merci de confirmer votre adresse mail en cliquant sur le bouton suivant')
            ->action('Confirmer mon adresse mail', route('auth.confirm', [$notifiable->id, urlencode($notifiable->verify_token)]))
            ->line('Merci de votre inscrption');
    }

    /**
     * Get the array representation of the notification
     *
     * @param mixed     $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }
}
