<?php

namespace App\Notifications;

use App\Models\Actividad;
use App\Models\Archivo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EvaluarActividad extends Notification
{
    use Queueable;
    public $id_archivo;
    public $id_actividad;
    public $id_grupo;
    public $nombre_actividad;
    public $clave_grupo;

    /**
     * Create a new notification instance.
     */
    public function __construct(Archivo $archivo)
    {
        $this->id_archivo = $archivo->id;
        $this->id_actividad = $archivo->actividad_id;
        $this->id_grupo = $archivo->grupo_id;
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
            'id_actividad' => $this->id_actividad,
            'id_grupo' => $this->id_grupo,
            'nombre_actividad' => $this->nombre_actividad,
            'clave_grupo' => $this->clave_grupo
        ];
    }
}
