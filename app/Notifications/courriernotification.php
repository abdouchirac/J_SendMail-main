<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\courrier;
use App\Models\user;
use App\Http\Livewire\CourrierList;



class courriernotification extends Notification
{
    use Queueable;
    public $state = [];



    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($state)
    {
        //
        $this->state = $state;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = URL::signedRoute('state-list', ['id' => $this->state]);

        return (new MailMessage)
                    ->line($this->enrollmentData['body'])
                    ->action($this->enrollmentData['enrollmenText'],$this->enrollmentData ['url'])
                    ->line($this->enrollmentData ['thankyou']);
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
            'state'=>$this->state
        ];
    }

}
