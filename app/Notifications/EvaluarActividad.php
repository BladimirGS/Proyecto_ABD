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
    protected Archivo $archivo;

    /**
     * Create a new notification instance.
     */
    public function __construct(Archivo $archivo)
    {
        $this->archivo = $archivo->load('actividad', 'grupoUser.grupo.materia');
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

    public function toDatabase($notifiable)
    {
        return [

            'archivo' => [
                'id' => $this->archivo->id,
                'estado' => $this->archivo->estado ?? 'Pendiente',
            ],

            'grupoUser' => [
                'id' => $this->archivo->grupoUser->id ?? null,
            ],

            'grupo' => [
                'id' => $this->archivo->grupoUser->grupo->id ?? null,
                'clave' => $this->archivo->grupoUser->grupo->clave ?? '(Grupo desconocida)',
            ],

            'materia' => [
                'id' => $this->archivo->grupoUser->grupo->materia->id ?? null,
                'nombre' => $this->archivo->grupoUser->grupo->materia->nombre ?? '(Materia desconocida)',
            ],

            'actividad' => [
                'id' => $this->archivo->actividad->id ?? null,
                'nombre' => $this->archivo->actividad->nombre ?? '(Actividad desconocida)',
            ],

            'fecha' => now()->toDateTimeString(),
        ];
    }
}
