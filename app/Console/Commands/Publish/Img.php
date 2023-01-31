<?php

namespace App\Console\Commands\Publish;

use Illuminate\Console\Command;

class Img extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publish:img';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy public/img/* to public/storage';

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
        $this->info('Start '.$this->description);

        $this->call('storage:link');
        \File::copyDirectory(public_path('img'), public_path('storage'));

        $this->info('Successfully '.$this->description);
    }
}
