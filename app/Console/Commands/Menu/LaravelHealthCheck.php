<?php

namespace App\Console\Commands\Menu;

use Illuminate\Console\Command;

class LaravelHealthCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'menu:laravel-health-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add menu for laravel-health-check';

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
        \DB::table('menus')->insert([
            'parent_id' => null,
            'name' => 'Health Check',
            'type' => 'menu',
            'classification' => 'System',
            'icon' => 'bi-shield-plus',
            'route' => 'health-check',
            'classification_order' => 4,
            'classification_inner_order' => 2,
        ]);
        $this->info('Successfully '.$this->description);
    }
}
