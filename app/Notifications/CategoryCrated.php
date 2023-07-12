<?php

namespace App\Notifications;

use App\Models\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CategoryCrated extends Notification
{
    use Queueable;

    protected $category;

    /**
     * Create a new notification instance.
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Hello :' . $notifiable->name . "Category Created Is: " . $this->category->name)
                    ->greeting('hi, ' . $notifiable->name)
                    ->line('A new Category Created By' . $notifiable->name)
                    ->action('view Category', url('/Categories'))
                    ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable) {
        return [
            'body' => "test {$notifiable->name}",
            'url' => "/dashboard",
        ];
    }

    public function toBroadcast($notifiable) {
        return new BroadcastMessage([
            'body' => "test {$notifiable->name}",
            'url' => "/dashboard",
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
