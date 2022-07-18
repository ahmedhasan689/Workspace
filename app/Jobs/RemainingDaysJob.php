<?php

namespace App\Jobs;

use App\Models\Tainant;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RemainingDaysJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $tainants = Tainant::all();

        foreach ($tainants as $tainant){
            $from = Carbon::createFromFormat('Y-m-d H:s:i', now());
            $to = Carbon::createFromFormat('Y-m-d H:s:i', $tainant->end_day);
            $diff_in_days = $from->diffInDays($to);

            $tainant->update([
                'remaining_days' => $diff_in_days,
            ]);

        }
    }
}
