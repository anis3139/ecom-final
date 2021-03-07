<?php

namespace App\Notifications;

use App\Models\ContactModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactReplyNotification extends Notification implements ShouldQueue
{
    use Queueable;
    
    public $contact;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ContactModel $contact)
    {
      
         $this->contact=$contact;
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
                     ->line('Mr. '. $this->contact->name)
                    ->line('Welcome To Our Ecommerce System')
                    ->line('We recive your massage')
                    ->line('Click The Following Link to Shoping ...')
                   ->action('Click Here', route('client.shop'))
                    ->line('Thanks For Choose us');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
