<?php

namespace App\Console\Commands;

use App\Helpers\YalidineHttpHelper;
use Illuminate\Console\Command;

class SyncYalidineOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'yalidine:sync';

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
     * @return int
     */
    public function handle()
    {
        $this->info('Yalidine sync started!');

        $this->info(YalidineHttpHelper::updateParcelsInDb());
        $this->info('Yalidine sync was successful!');
        return 0;
    }
}
