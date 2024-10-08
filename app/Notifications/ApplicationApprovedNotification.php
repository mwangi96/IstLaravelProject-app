<?php

namespace App\Notifications;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Job;

class ApplicationApprovedNotification extends Notification
{
    // use Queueable;

    protected $job;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($job)
    {
        $this->job = $job;


    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->subject('Your Job Application is Approved')
                    ->line('Congratulations! Your application for the job "' . $this->job->title . '" has been approved.')
                    ->action('View Job', url('/jobs/' . $this->job->id))
                    ->line('Thank you for using our application!');
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
            'job_id' => $this->job->id,
            'job_title' => $this->job->title,
            'message' => 'Your application for the job "' . $this->job->title . '" has been approved.',
        ];
    }
}
