<?php

namespace App\Listeners;

use App\Events\TestEvent;
use App\Jobs\Insert;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class TestEventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TestEvent  $event
     * @return void
     */
    public function handle(TestEvent $event)
    {
        //
        ini_set('memory_limit', '2048M');
        for($i=0;$i<20;++$i){
            DB::select(DB::raw("insert into atricls (name,age) select name,age from atricls"));
        }
    }
}
