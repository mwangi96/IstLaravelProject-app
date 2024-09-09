<?php

namespace App\Notifications;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\ApplicationsForJobs;

class JobAppliedNotification extends Notification 
{
    // use Queueable;

    protected $application;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ApplicationsForJobs $application)
    {
        $this->application = $application;
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
                    ->line('A new application has been submitted for the job: ' . $this->application->job->title)
                    ->line('Applicant: ' . $this->application->user->name)
                    ->action('View Application', url('/applications/' . $this->application->id))
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
            'job_id' => $this->application->job->id,
            'job_title' => $this->application->job->title,
            'applicant_id' => $this->application->user->id,
            'applicant_name' => $this->application->user->name,
            'user_role' => $notifiable->roles->first()->name, // Assuming you're using a role-based system
            'message' => 'A new application has been submitted for the job: ' . $this->application->job->title,
        ];
    }

}
