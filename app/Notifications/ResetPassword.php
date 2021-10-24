<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPassword extends Notification
{
   use Queueable;

   public $token;

   /**
    * Create a new notification instance.
    *
    * @return void
    */
   public function __construct($token)
   {
      $this->token = $token;
   }

   /**
    * Get the notification's delivery channels.
    *
    * @param  mixed  $notifiable
    * @return array
    */
   public function via($notifiable)
   {
      return ['mail'];
   }

   /**
    * Get the mail representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return \Illuminate\Notifications\Messages\MailMessage
    */
   public function toMail($notifiable)
   {
      return (new MailMessage)
         ->line('You are receiving this email because we received a password reset request for your account.')
         ->action('Reset Password', url(config('app.url') . '/password/reset/' . $this->token) . '?email=' . urlencode($notifiable->email))
         ->line('If you did not request a password reset, no further action is required.');
   }
}
