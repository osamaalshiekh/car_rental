<?php

namespace App\Console\Commands;

use App\Events\ReservationCompleted;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckReservations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservations:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if any reservations are due to complete';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $reservations = Reservation::where('retDate', '<=', Carbon::today())
            ->where('status', 'active')
            ->get();

        foreach ($reservations as $reservation) {
            event(new ReservationCompleted($reservation));
        }
    }
}
