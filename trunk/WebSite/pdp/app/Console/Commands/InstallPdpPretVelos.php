<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class InstallPdpPretVelos extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pdp-pret-de-velos:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs pdp pret de velo project';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $numer_of_steps = 4;
        $bar = $this->output->createProgressBar($numer_of_steps);

        $this->info('Pdp pret de velo installation is running...');
        $bar->advance();
        Artisan::call('migrate');
        $bar->advance();
        $this->call('panel:install');
        $bar->advance();
        Artisan::call('db:seed');
        $this->info('Pdp pret de velo installation is complete');

        $bar->finish();
    }

}
