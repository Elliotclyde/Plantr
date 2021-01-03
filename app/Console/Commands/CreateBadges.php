<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Classes\Badges;

class CreateBadges extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'badges:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates the badges for all plants in the system';

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
     * @return int
     */
    public function handle()
    {
        (new Badges)();
        return 0;
    }
}
