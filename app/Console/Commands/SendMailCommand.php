<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\LendController;

class SendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send_mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail';

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
        $var = new LendController();
        $var->send_mail();
        //LendController::send_mail();
    }
}
