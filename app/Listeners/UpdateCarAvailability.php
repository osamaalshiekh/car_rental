<?php

namespace App\Listeners;

use App\Events\ReservationCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateCarAvailability
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ReservationCompleted $event): void
    {
        $reservation = $event->reservation;
        $car = $reservation->car;
        $car->availability = true;
        $car->save();

        $reservation->status = 'completed';
        $reservation->save();
    }
}
