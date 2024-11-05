<?php

namespace App\Notifications;

use App\Models\Archivo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EvaluarActividad extends Notification
{
    use Queueable;
    public $id_archivo;
    public $nombre_actividad;
    public $clave_grupo;

    /**
     * Create a new notification instance.
     */
    public function __construct(Archivo $archivo)
    {
        $this->id_archivo = $archivo->id;
        $this->nombre_actividad = $archivo->actividad->nombre; 
        $this->clave_grupo = $archivo->grupo->clave;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    // Almacena las notificaciones en la BD
    public function toDatabase($notifiable)
    {
        return [
            'id_archivo' => $this->id_archivo,
            'nombre_actividad' => $this->nombre_actividad,
            'clave_grupo' => $this->clave_grupo
        ];
    }
}
