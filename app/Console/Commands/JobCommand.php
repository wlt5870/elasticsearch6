<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class JobCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:JobCommand{parameter}';

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
        //
        $user = $this->ask('用户名');
        $genale = $this->ask('性别');
        $input = $this->confirm('继续?');
        $this->info('ok');
    }
}
