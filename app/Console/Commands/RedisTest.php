<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use DB;
class RedisTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        //for($i=0;$i<100;++$i){
        //  DB::select(DB::raw("insert into atricls (name,age) select name,age from atricls"));
        //}

        //Redis::subscribe(['test-channel'], function($message) {
        //    echo $message;
        //});
        echo 'ok';
    }
}
