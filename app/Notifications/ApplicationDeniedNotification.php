<?php

namespace App\Notifications;

// use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Job;

class ApplicationDeniedNotification extends Notification
{
    // use Queueable;

    protected $job;

    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('We regret to inform you that your application for the job "' . $this->job->title . '" has been denied.')
                    ->action('View Application', url('/applications/' . $this->job->id))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'job_id' => $this->job->id,
            'message' => 'Your application for the job "' . $this->job->title . '" has been denied.',
        ];
    }
}
